<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        //Deeper validation - You can only comment after creating 2 threads
        if (auth()->id() != $thread->user_id && auth()->user()->threads()->count() < 2) {
            throw ValidationException::withMessages(['thread_limit' => 'You have to at-least create two threads before commenting.']);
        }

        $comment=new Comment();
        $comment->body=$request->body;
        $comment->user_id=auth()->user()->id;

        $thread->comments()->save($comment);

        return redirect()->back()->with('message', 'Comment Posted');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());

        return redirect()->back()->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $comment->delete();

        return redirect()->back()->with('message', 'Deleted');
    }
}
