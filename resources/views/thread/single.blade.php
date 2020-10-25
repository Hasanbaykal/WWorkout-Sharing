@extends('layouts.app')

@section('content')

<div class="container categorycont">

    <div class="row">
            <div class="row content-heading">
                
                
            </div>
        </div>
        <div class="row">
        {{--//category section--}}
            <div class="box col-md-3">
            <div class="list-group">
            <a class="categorytitle">Categories</a>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select:</option>
                    <option value="{{route('thread.index')}}">All Threads</option>
                @foreach($categories as $category)
                    <option value="{{route('thread.index',['categories'=>$category->id])}}">{{$category->name}}</option>
                @endforeach
                </select>
                </div>
                </div><br>

            <div class="col-md-9">
                <h4>{{$thread->subject}}</h4>
                <hr><div>

                <div class="thread-details">
                    {{$thread->thread}}
                </div>

            <br>

@can('update',$thread)

            <div class="actions">
                <a href="{{route('thread.edit', $thread->id)}}" class="btn btn-info btn-xs">Edit</a>

                <form action="{{route('thread.destroy', $thread->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>
            </div>
@endcan


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
                                <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                            
                            <div class="modal-body">
                            

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

.box select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  width: 160px;
  border: none;
  font-size: 16px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.box::before {
  content: "\f13a";
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  width: 20%;
  height: 100%;
  text-align: center;
  font-size: 28px;
  line-height: 45px;
  color: rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.1);
  pointer-events: none;
}

.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}

</style>