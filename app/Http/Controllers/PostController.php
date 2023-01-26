<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $attachmentName = [];
        if ($request->hasFile('media')) {
            $attachments = $request->file('media');
            foreach ($attachments as $attachment) {
               // $attachmentName[] = 'PostMedia-' . time() . '.' . $attachment->getClientOriginalExtension();
                //$attachmentName[$i] = $attachment->storeAs('Posts/Media', $attachmentName[$i], 'public');
                $attachmentName[] = Storage::disk('public')->put('Posts/Media', $attachment);
            }
        }

        $post = Post::create([
            'message' => $request->message,
            'user_id' => $request->user()->id,
            'media' => json_encode($attachmentName),
        ]);

        $redirectTo = $request->query('route', route('dashboard'));
        $param = null;

        if ($redirectTo === 'group-detail') {
            $param = $request->query('gId');
            
            if($param){
                PostMembership::create([
                    'post_id' => $post->id,
                    'group_id' => $param,
                ]);

                return redirect()->route($redirectTo, $param)->with('success', 'Post deleted successfully.');
            }
        }

        return redirect(route($redirectTo));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
