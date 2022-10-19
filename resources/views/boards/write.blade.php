@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                

                <div class="card-header">{{ __('게시글 등록') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('/api/boards') }}" >
                        @csrf
                        <div class="mb-3 row">
                            <label for="boardTilte" class="col-sm-2 col-form-label">{{ __('게시판 제목') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="boardTitle" id="boardTilte" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="boardContnet" class="col-sm-2 col-form-label">{{ __('게시판 내용') }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  name="boardContnet" id="boardContnet" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="boardLink" class="col-sm-2 col-form-label">{{ __('게시판 링크') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="boardLink" id="boardLink" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="file" class="col-sm-2 col-form-label">{{ __('업로드할 파일') }}</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <button type="submit" class="mx-auto btn btn-primary col-lg-10 col-md-10 col-sm-10 col-xm-10">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
