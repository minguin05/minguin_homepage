@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('minguins') }}</div>

                <div class="card-body">
                    <a href="{{ url('/board-form')}}">게시판 등록</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection