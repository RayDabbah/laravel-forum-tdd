@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Threads</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif 
                    @foreach($threads as $thread)
                <h2>
                    <a href="/threads/{{ $thread->id }}">
                    {{$thread->title}}
                </a>
            </h2>
                    <h5>{{$thread->user()->first()->name}}</h5>
                    <br>
                    <p>{{$thread->body}}</p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection