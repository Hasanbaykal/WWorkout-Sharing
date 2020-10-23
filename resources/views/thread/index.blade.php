@extends('layouts.app')

@section('content')

    <h2 class="threadtitle"> Threads </h2>

   

    <div class="container categorycont">

    <div class="row">
            <div class="row content-heading">
                
                
            </div>
        </div>
        <div class="row">
        <div class="col-md-9 createthread">
                    <div class="row">      
                        <div class="col-md-offset-6 col-md-2">
                            <a class="btn btn-primary" href="{{route('thread.create')}}">Create Thread</a></div>
                    </div>
                </div>
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
                    <div class="content-wrap well">
                        <div class="list-group threadcont">
                            @forelse($threads as $thread)

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><a href="{{route('thread.show',$thread->id)}}"> {{$thread->subject}}</a></h3>
                                </div>
                                <div class="panel-body">
                                    <p>{{\Illuminate\Support\Str::limit($thread->thread,100)}}
                                        <br>
                                    Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> {{$thread->created_at->diffForHumans()}}
                                    </p>
                                    <br><br>
                                </div>
                            </div>

                            @empty
                            <h5>No Threads</h5>
                            @endforelse
                        </div>
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

.createthread {
    margin-top: 1%;
    margin-left: 87%;
}



</style>