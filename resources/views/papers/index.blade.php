@extends('layouts.default')
@section('title', '论文列表')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>论文列表</h1>
        <ul class="papers">
            @foreach ($papers as $paper)
                @include('papers._paper')
            @endforeach
        </ul>

        <!-- 渲染分页 -->
        {!! $papers->render() !!}
    </div>
@stop