@extends('layouts.app')

@section('content')
    <div class="container">
        {{--抬头广告--}}
        <div class="row"></div>

        <div class="row">
            @foreach($images as $image)
            <div class="col-sm-4 margin-b20">
                <div class="card">
                    <img src="{{$image->relative_path}}" alt="" width="300px" class="margin-b20 mx-auto">
                    <div class="card-title mx-auto shadow-sm">{{$image->title}}</div>
                    <div class="card-body mx-auto">
                        <a href="{{route('images.download',$image->id)}}" class="btn btn-outline-primary">下载</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{$images->links()}}
{{--            {!! $images->render() !!}--}}
        </div>
    </div>

    <div class="container">
        <a href="{{route('test')}}">测试链接</a>
    </div>
@endsection

@if (config('app.debug'))
    @include('sudosu::user-selector')
@endif
