<?php

namespace App\Http\Controllers;

use App\Song;
use DB;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::orderBy('created_at', 'desc')->paginate(10);
        $otherSongs = DB::select('select * from songs ', ['limit 3']);
        return view('songs.index')->with(['song' => $otherSongs, 'songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
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
        $this->validate($request, [
            'title' => 'required|string|max:40',
            'genre' => 'required',
            'about' => 'required|min:20',
            'about_author' => 'required|min:20|string',
            'author' => 'required|string',
            'song' => 'required',
            'cover_image' => 'required|image',
            'year_released' => 'required|',
            'music_label' => 'required|',
            'event' => 'required|',
        ]);
        $img = $request->file('cover_image');
        $imgFullname = $img->getClientOriginalName();
        $imgExt = $img->getClientOriginalExtension();
        $imgnameonly = pathinfo($imgFullname, PATHINFO_FILENAME);
        $imgToDb = $imgnameonly . '_' . time() . '.' . $imgExt;
        $path = $img->storeAs('public/cover_images', $imgToDb);
        $uploadedSong = $request->file('song');
        $songExt = $uploadedSong->getClientOriginalExtension();
        if ($songExt != 'mp3') {
            return redirect()->back()->with('error', 'Format of the song is not allowed');

        }

        $songName = $uploadedSong->getClientOriginalName();
        $songNameOnly = pathinfo($songName, PATHINFO_FILENAME);
        $songToDb = $songNameOnly . '_' . time() . '.' . $songExt;
        $path = $uploadedSong->storeAs('public/songs', $songToDb);

        $song = new Song();
        $song->name = $request->title;
        $song->song = $songToDb;
        $song->genre = $request->genre;
        $song->author = $request->author;
        $song->about = $request->about;
        $song->about_artist = $request->about_author;
        $song->cover_image = $imgToDb;
        $song->year_released = $request->year_released;
        $song->music_label = $request->music_label;
        $song->event = $request->event;
        $song->uploaded_by = auth()->user()->name;

        $song->save();
        return redirect('/')->with('success', 'Song was uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $otherSongs = DB::select('select * from songs ', ['limit 4']);

        $songs = Song::find($id);
        return view('songs.show')->with(['songs' => $songs, 'otherSongs' => $otherSongs]);

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
        //
    }
}