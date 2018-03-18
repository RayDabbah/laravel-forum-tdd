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
                <h2>{{$thread->title}} Created {{ $thread->created_at->diffForHumans() }}</h2>
                    <h5>{{$thread->user->name}}</h5>
                    <br>
                    <p>{{$thread->body}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
      @if(Auth::user())
    <form method="POST" action="/threads/{{$thread->id}}/reply" class="col-md-8">
        {{csrf_field()}}
        <input type="text" name="body" class="form-control" placeholder="Reply to this thread!">
      </form>
    @endif
    </div>
    <div class="row justify-content-center">
        @foreach($replies as $reply)
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                {{  $reply->user()->first()->name }}&nbsp&nbsp&nbsp&nbsp Replied {{  $reply->created_at->diffForHumans()}}</div>
                <div class="card-body">
                    {{ $reply->body }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection