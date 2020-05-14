@extends('layouts.app')

@section('content')
    这里是测试
    @endsection

@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif
