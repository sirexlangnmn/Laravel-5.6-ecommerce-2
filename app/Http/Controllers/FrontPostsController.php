<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Post;
use App\Comment;
use App\CommentReply;

class FrontPostsController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && !empty($request)) {
            $request->session()->put('search', $request
                    ->has('search') ? $request->get('search') : ($request->session()
                    ->has('search') ? $request->session()->get('search') : ''));

            $posts = Post::where('post_title', 'LIKE', '%'.$request->session()->get('search').'%')
                       ->orWhere('post_body', 'LIKE', '%'.$request->session()->get('search').'%')
                      ->paginate(10);

            return view('frontend_views.modules.posts._index', compact('posts'));
        }

        $posts = Post::where('post_status', 1)->paginate(10);

        return view('frontend_views.modules.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $row = Post::findBySlugOrFail($slug);
        $comments = Comment::where(['status' => 1, 'post_id' => $row->id])->get();

        return view('frontend_views.modules.posts.show', compact('row', 'comments'));
    }

    public function storeComment(Request $request)  // storeComment
    {
        /*dd($request->All());*/

        // validate the input data
        $request->validate([
            'post_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        // get user logged in
        $getUserRow = Auth::user();

        $data = [
            'user_id' => $getUserRow->id,
            'post_id' => $request->post_id,
            'body' => $request->body,
        ];

        // store data
        Comment::create($data);

        // session
        Session::flash('flash_message_success', 'Your message has been submitted and is waiting for moderation.');

        // redirect
        return redirect()->back();
    }

    public function storeReply(Request $request)
    {
        /*dd($request->All());*/

        // validate the input data
        $request->validate([
            'comment_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        // get user logged in
        $getUserRow = Auth::user();

        $data = [
            'user_id' => $getUserRow->id,
            'comment_id' => $request->comment_id,
            'body' => $request->body,
        ];

        // store data
        CommentReply::create($data);

        // session
        Session::flash('flash_message_success', 'Your message has been submitted and is waiting for moderation.');

        // redirect
        return redirect()->back();
    }

    public function storeReplyToReply(Request $request)
    {
        /*dd($request->All());*/

        // validate the input data
        $request->validate([
            'comment_id' => 'required|integer',
            'reply_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        // get user logged in
        $getUserRow = Auth::user();

        $data = [
            'user_id' => $getUserRow->id,
            'comment_id' => $request->comment_id,
            'body' => $request->body,
            'parent_id' => $request->reply_id,
        ];

        // store data
        CommentReply::create($data);

        // session
        Session::flash('flash_message_success', 'Your message has been submitted and is waiting for moderation.');

        // redirect
        return redirect()->back();
    }
}
