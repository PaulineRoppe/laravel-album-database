<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return response()->json($albums);
    }

    public function store(Request $request)
    {
        $request->validate([
            'albumCover' => 'required',
            'artistName' => 'required',
            'albumName' => 'required',
            'genre' => 'required',
            'productionYear' => 'required',
            'label' => 'required',
            'songsList' => 'required',
            'note' => 'required'
        ]);

        $album = Album::create($request->all());

        return response()->json([
            'message' => 'Great success! New album created',
            'album' => $album
        ]);
    }

    public function show(album $album)
    {
        return $album;
    }

    public function update(Request $request, album $album)
    {
        $request->validate([
          'albumCover' => 'nullable',
          'artistName' => 'nullable',
          'albumName' => 'nullable',
          'genre' => 'nullable',
          'productionYear' => 'nullable',
          'label' => 'nullable',
          'songsList' => 'nullable',
          'note' => 'nullable'
        ]);

        $album->update($request->all());

        return response()->json([
            'message' => 'Great success! album updated',
            'album' => $album
        ]);
    }

    public function destroy(album $album)
    {
        $album->delete();

        return response()->json([
            'message' => 'Successfully deleted album!'
        ]);
    }
}
