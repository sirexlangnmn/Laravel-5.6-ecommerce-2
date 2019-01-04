<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;
use Session;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment_replies = CommentReply::all(); 

        return view('backend_views.modules.comment_replies.index', compact('comment_replies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment_replies = CommentReply::where([ 'comment_id' => $id ])->get();

        return view('backend_views.modules.comment_replies.index', compact('comment_replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('PUT') && !empty($id) && !empty($request))
        {
            // update the data in the database
            CommentReply::whereId($id)
            ->update([ 'status' => $request->status ]);


            $getStatus = CommentReply::findOrfail($id);

            if($getStatus->status == 1){
                $status = 'Enabled';
            }
            else{
                $status = 'Disabled';
            }

            // session flash
            Session::flash('flash_message_success', ''. $status .' successfully.');

            // redirect
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id))
        {
            // Delete the product record in database
            CommentReply::destroy($id);

            // session flash
            Session::flash('flash_message_success', 'Reply deleted successfully.');

            // redirect
            return redirect()->back();
        }
    }

    
}
