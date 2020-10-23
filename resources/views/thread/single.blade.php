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


<br><br><br>


            <div class="comment-list">
                @foreach($thread->comments as $comment)

                    <h4>{{$comment->body}}</h4>
                    <lead>{{$comment->user->name}}</lead>

                    <div class="actions">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Edit Comment
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                            
                            <div class="modal-body">
                                <h4>Edit Comment</h4>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{$comment->body}}">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                            </form>
                        </div>
                        </div>
                        </div>
                        </div>

                        <form action="{{route('comment.destroy', $comment->id)}}" method="POST" class="inline-it">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input class="btn btn-xs btn-danger" type="submit" value="Delete Comment">
                        </form>
                    </div>

                @endforeach
            </div>
            <br><br>
            <div class="comment-form">

                <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
                    {{csrf_field()}}
                    <h4>Create Comment</h4>

                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="" placeholder="Input...">
                </div>

                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>
                
            </div>

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