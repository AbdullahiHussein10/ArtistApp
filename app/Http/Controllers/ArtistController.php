<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::orderBy('likes', 'desc')->get();
        return response()->json([
            'artists' => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'band_name' => 'required|unique:artists',
            'genre' => 'required',
            'location' => 'required',
        ]);

        Artist::create([
            'band_name' => $request->band_name,
            'genre' => $request->genre,
            'location' => $request->location,
        ]);

        return response()->json([
            'message' => 'Artist Created Successfully',
            'code' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return response()->json([
            'message' => 'Artist retrieved successfully',
            'status' => 200,
            'artist' => $artist
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return response()->json([
            'message' => 'Artist Deleted Succesfully',
            'code' => 204
        ]);
    }

    public function like($id)
    {
        $artist = Artist::findOrFail($id);
        $value = $artist->likes;
        $artist->likes = $value+1;
        $artist->save();

        return response()->json([
            'message' => 'artist Liked',
            'status' => 201
        ]);

    }

    public function dislike($id)
    {
        $artist = Artist::findorFail($id);
        $value = $artist->dislikes;
        $artist->dislikes = $value + 1;
        $artist->save();

        return response()->json([
            'message' => 'Artist disliked',
            'status' => 200
        ]);

    }
}