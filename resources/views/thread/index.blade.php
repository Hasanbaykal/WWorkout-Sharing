@extends('layouts.app')

@section('content')

    <h2> Threads </h2>

    <div class="list-group">
        @forelse($threads as $thread)

            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">{{$thread->subject}}</h4>
                <p class="list-group-item-text">{{\Illuminate\Support\Str::limit($thread->thread,100)}}</p>
            </a>

    @empty
        <h5>No Thread</h5>

    @endforelse
    </div>

@endsection