@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex flex-row mb-3">
                    <div class="p-2 align-self-center flex-grow-1">
                        {{ __('게시글 조회') }}
                    </div>
                    @auth
                        @if($board->pluck('user_id')->all()[0] === auth()->user()->user_id)
                            <div class="p-2 align-self-center">
                                <button class="btn btn-primary align-self-center" style="width:fit-content">{{__('수정')}}</button>
                            </div>
                        @endif
                    @endauth
                </div>
                <div class="card-body">
                    @foreach ($board as $boardInfo)
                        <div class="mb-3 row">
                            <label for="boardTilte" class="col-sm-2 col-form-label">{{ __('게시판 제목') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" readonly name="boardTitle" id="boardTilte" value="{{$boardInfo->board_title}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="boardContnet" class="col-sm-2 col-form-label">{{ __('게시판 내용') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" readonly name="boardTitle" id="boardTilte" value="{{$boardInfo->board_content}}">
                                
                            </div>
                        </div>
                        

                    @endforeach
                    @isset($link)
                        @foreach($link as $linkInfo)
                            <div class="mb-3 row">
                                <label for="boardLink" class="col-sm-2 col-form-label">{{ __('게시판 링크') }}</label>
                                <div class="col-sm-10 d-flex align-items-center">
                                    <a href="{{$linkInfo->file_path}}" class="flex-grow-1" target="_blank">{{$linkInfo->file_title}}</a>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                    @isset($file)
                        @foreach($file as $fileInfo)
                            <div class="mb-3 row ">
                                <label for="file" class="col-sm-2 col-form-label align-self-center ">{{ __('등록된 파일') }}</label>
                                <div class="col-sm-10 d-flex flex-row">
                                    <div class="align-self-center flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext"  name="file" id="file"  value="{{$fileInfo->file_title}}">
                                    </div>
                                    <div class="align-self-center">
                                        <a href="/api/file/{{$fileInfo->id}}" class="btn btn-outline-primary form-control">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
