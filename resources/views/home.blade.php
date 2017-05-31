@extends('layouts.app')

@section('content')

  <div class="container thread-container">
    <div class="row">
      <div class="col-sm-3 thread-list">
        <ul class="list-group">
          @foreach($threads as $thread)
            <li class="list-group-item">
              <a href="{{ route('thread.view', $thread->id) }}">
                <b>{{ $thread->subject }}</b><br>
                {{ str_limit($thread->lastMessage->content, 30) }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-sm-8 col-sm-offset-1 message-list">
        @if(isset($activeThread))
          @foreach ($activeThread->messages as $message)
            @if ($message->user_id === Auth::user()->id)
              <div class="media">
                <div class="media-body text-right">
                  <div class="message myself">{{ $message->content }}</div>
                </div>
                <div class="media-right media-bottom">
                  <a href="#">
                    <img class="media-object img-circle" src="{{ \Thomaswelton\LaravelGravatar\Facades\Gravatar::src($message->user->email, 50) }}" alt="{{ $message->user->name }}">
                  </a>
                </div>
              </div>
              @else
              <div class="media">
                <div class="media-left media-bottom">
                  <a href="#">
                    <img class="media-object img-circle" src="{{ \Thomaswelton\LaravelGravatar\Facades\Gravatar::src($message->user->email, 50) }}" alt="{{ $message->user->name }}">
                  </a>
                </div>
                <div class="media-body">
                  <div class="message other">
                    {{ $message->content }}
                  </div>
                </div>
              </div>
              @endif
          @endforeach
        @else
          <p class="text-center">Please select a Thread from the left</p>
        @endif

      </div>
    </div>
  </div>
@endsection
