<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UploadController extends Controller {
    
    protected $request, $uploadedPhotos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->request = $request;
        $this->uploadedPhotos = new Collection;
    }

    public function index()
    {
        $user = $this->request->user();

        $photos = $this->request->file('photos');
        $album = $user->albums()->findOrFail($this->request->get('album_id'));

        $uploadBasePath = 'photos/a/' . $album->id;

        (new Collection($photos))->each(function($photo) use ($uploadBasePath) {
            $uploadPath = $photo->storePublicly($uploadBasePath);

            $uploadedPhoto = new Photo([
                'title' => $photo->getClientOriginalName(),
                'description' => '',
            ]);

            $uploadedPhoto->file_name = $photo->getClientOriginalName();
            $uploadedPhoto->disk = 'local';
            $uploadedPhoto->size = $photo->getClientSize();

            $this->uploadedPhotos->push($uploadedPhoto);
        });

        $album->photos()->saveMany($this->uploadedPhotos);
    }
}
