@extends('layouts.app')

@section('content')

<div class="container categorycont">

        <div class="row">
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

            <div class="form">
        <div class=" well">
            <form class="form-vertical" action="{{route('thread.store')}}" method="post" role="form"
                  id="create-thread-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..."
                           value="{{old('subject')}}">
                </div>

                <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id">
                        <option value="">Select:</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="subject">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input...">{{old('thread')}}</textarea>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
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

.createthread {
    margin-top: 1%;
    margin-left: 87%;
}

.well {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left: 20%;
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