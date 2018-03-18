@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Threads</div>
                <div class="card-body">
                    @foreach($threads as $thread)
                    <h2>
                        <a href="{{ $thread->path() }}">
                            {{$thread->title}}
                        </a>
                    </h2>
                    <h4>Created {{ $thread->created_at->diffForHumans() }}</h4>
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