@extends('layouts.app')

@section('content')

<div class="container categorycont">

    <div class="row">
            <div class="row content-heading">
                
                
            </div>
        </div>
        <div class="row">
            {{--//category section--}}
            <div class="col-md-3">
                <ul class="list-group">
                    <a class="categorytitle">Categories</a>
                    <a href="{{route('thread.index')}}" class="list-group-item">
                        <span class="badge">14</span>
                        All Threads
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge">2</span>
                        PHP
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge">1</span>
                        Python
                    </a>
                </ul>
            </div>
                <div class="col-md-9">
                <h4>{{$thread->subject}}</h4>
            <hr>

            <div class="thread-details">
                {{$thread->thread}}
            </div>

            <br>

@if(auth()->user()->id == $thread->user_id)

            <div class="actions">
                <a href="{{route('thread.edit', $thread->id)}}" class="btn btn-info btn-xs">Edit</a>

                <form action="{{route('thread.destroy', $thread->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>
            </div>
@endif
        </div>
    </div>
</div>


    

@endsection

<style>

.threadtitle {
    margin-left: 20px;
}

.categorytitle {
    font-size: 20px;
    color: black;
    text-align: center;
}

.list-group-item {
    color: black;
}

.categorycont {
    margin-top: 100px;
}

</style>