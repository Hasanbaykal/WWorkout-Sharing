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
                    <label for="subject">Type</label>
                    <input type="text" class="form-control" name="type" id="" placeholder="Input..."
                           value="{{old('type')}}">
                </div>

                <div class="form-group">
                    <label for="subject">Thread</label>
                    <textarea class="form-control threadtextbox" name="thread" id="" placeholder="Input...">{{old('thread')}}</textarea>
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

</style>