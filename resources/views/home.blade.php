@extends('layouts.app')

@section('content')
    <dashboard 
        smart-label="{{ trans('album.smart') }}"
        general-label="{{ trans('album.general') }}">
    </dashboard>
@endsection
