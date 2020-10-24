@extends('layouts.app')

@section('content')

<div class="container categorycont">

        <div class="row">
        {{--//category section--}}
            <div class="box col-md-3">
            <div class="list-group">
            <a class="categorytitle">Tags</a>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Select Tag:</option>
                    <option value="{{route('thread.index')}}"><span class="badge">14</span>All Threads</option>
                    <option value="" class="list-group-item"><span class="badge">2</span>PHP</option>
                    <option value="" class="list-group-item"><span class="badge">1</span>Python</option>
                </select>
                </div>
                </div><br>

            <div class="form">
        <div class=" well">
            <form class="form-vertical" action="{{route('thread.update', $thread->id)}}" method="post" role="form"
                  id="create-thread-form">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..."
                           value="{{$thread->subject}}">
                </div>

                <div class="box">
                <label for="subject">Tags</label>
                <select placeholder="Input..." value="{{old('type')}}">
                        <option value="1">one</option>
                        <option value="1">one</option>
                        <option value="1">one</option>
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="subject">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input...">"{{$thread->thread}}"</textarea>
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