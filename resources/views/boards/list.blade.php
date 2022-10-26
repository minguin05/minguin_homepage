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
                <div class="card-header">{{ __('minguins') }}</div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">제목</th>
                                <th scope="col">작성자</th>
                                <th scope="col">작성일</th>
                                <th scope="col">조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $idx = ($boards->currentPage()-1)*$paginate + 1;
                            @endphp
                            @forelse ($boards as $board)
                                <tr>
                                    <th scope="row" class="align-middle">{{$idx++;}}</th>
                                    <td class="align-middle">
                                        <a href="/boards/{{$board->id}}">{{$board->board_title}} </a></td>
                                    <td class="align-middle">{{$board->user_nickname}}</td>
                                    <td class="align-middle">{{$board->created_at}}</td>
                                    <td class="align-middle">{{$board->board_hit}}</td>

                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="4">{{__('값이 없습니다.')}}</th>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                    <div class="row">
                        <div class="col-10">
                            {{ $boards->links() }}
                        </div>
                        <div class="col-2">
                            <a class="btn btn-primary" href="{{ url('/board-form')}}">게시판 등록</a>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection