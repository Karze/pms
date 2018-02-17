@extends('layouts.default')
@section('title', '论文')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>论文</h5>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <form method="POST" action="{{ route('papers.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">论文名称：</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="lang">论文语种：</label>
                        <input type="text" name="lang" class="form-control" value="{{ old('lang') }}">
                    </div>

                    <div class="form-group">
                        <label for="type">论文类型：</label>
                        <input type="type" name="type" class="form-control" value="{{ old('type') }}">
                    </div>

                    <DIV CLASS="form-group">
                        <label for="file">论文上传：</label>
                        <input type="file" id="file" name="file" />
                    </DIV>

                    <button type="submit" class="btn btn-primary">新增</button>
                </form>
                @include('shared._messages')
            </div>
        </div>
    </div>
@stop