<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Category;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('categories')) {
            $category=Category::find($request->categories);
            $threads=$category->threads;
        }else {
        $threads= Thread::paginate(15);
        }
        return view('thread.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('thread.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'subject'       => 'required|min:5',
            'category_id'   => 'required|integer',
            'thread'        => 'required|min:10',
            //'g-recaptcha-response' => 'required|captcha'
        ]);

        //store
        $thread = auth()->user()->threads()->create($request->all());

        $thread->categories()->attach($request->categories);

        //redirect
        return redirect()->back()->with('message', 'Threat Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('thread.single', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //if(auth()->user()->id !== $thread->user_id){
        //    abort(401,"unauthorized");
        //}
        
        $this->authorize('update', $thread);
        //validate
        $this->validate($request, [
            'subject' => 'required|min:5',
            'category_id'    => 'required',
            'thread'  => 'required|min:10',
        ]);

        //update
        $thread->update($request->all());

        return redirect()->route('thread.show', $thread->id)->with('message', 'Threat Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //if(auth()->user()->id !== $thread->user_id){
        //    abort(401,"unauthorized");
        //}
        $this->authorize('update', $thread);

        $thread->delete();

        return redirect()->route('thread.index')->with('message', 'Threat Deleted');
    }

    public function productsCreate() {
        $categories = Categories::get();
        return View::make('thread.create', [
            'categories' => $categories
        ]);
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $threads = Thread::where('subject','LIKE', '%'.$search_text.'%')->get();
        $threads = Thread::where('thread','LIKE', '%'.$search_text.'%')->get();

        return view('thread.index', compact('threads'));


    }
}
