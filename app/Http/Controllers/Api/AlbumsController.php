<?php

namespace App\Http\Controllers\Api;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller {

	protected $request, $user;

	public function index(Request $request)
	{
		$user = $request->user();
		
		return $user->albums;
	}

	public function load(Request $request)
	{
		$user = $request->user();
		$album = $user->albums()->with('photos')->findOrFail($request->get('id'));

		return $album;
	}

	public function create(Request $request)
	{
		$this->validate($request, Album::$validationRules);

		$user = $request->user();
		$inputs = $request->only(['title']);
		
		$album = new Album($inputs);
		$album->smart = false;

		return $user->albums()->save($album);
	}

	public function delete(Request $request)
	{
		$user = $request->user();
		$album = $user->albums()->findOrFail($request->get('id'));

		$album->delete();

		return $album;
	}

	public function update(Request $request)
	{
		$this->validate($request, Album::$validationRules);
		
		$user = $request->user();
		$album = $user->albums()->findOrFail($request->get('id'));

		$album->title = $request->get('title');
		$album->save();

		return $album;
	}
}