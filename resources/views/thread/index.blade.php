@extends('layouts.app')

@section('content')

    <h2 class="threadtitle"> Threads </h2>

   

    <div class="container categorycont">

    <div class="row">
    
            <form class="example" type="get" action="{{url('/search')}}">
                <input type="text" name="query" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            
        <div class="col-md-9 createthread">
                    <div class="row">      
                        <div class="col-md-offset-6 col-md-2">
                            <a class="btn btn-primary" href="{{route('thread.create')}}">Create Thread</a></div>
                    </div>
                </div>

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

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  
}

/* Style the submit button */
form.example button {
  background: white;
  color: white;
  border: white;
}

form.example button:hover {
  background: white;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

</style>