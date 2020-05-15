@extends('layouts.app')

@section('content')
    <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">title
        <input type="text" name="tag">tag
        <input type="file" name="image">上传图片
        <button type="submit">确认</button>
    </form>
    @endsection

@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif
