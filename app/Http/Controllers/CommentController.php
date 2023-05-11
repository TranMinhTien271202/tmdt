<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = comment::create([
            'comment' => $request->cmt,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
        ]);
        $comment = comment::where('product_id', $request->product_id,)->pluck('id')->toArray();
        $array = array_slice($comment, count($comment) - 8, 8);
        $comment = comment::whereIn('id', $array)->get();
        $lastComment = end($array);
        $latecomment = comment::with('user')->where('id', $lastComment)->first();
        return response()->json(['status' => 1, 'success' => "bình luận thành công", 'comment' => $latecomment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
