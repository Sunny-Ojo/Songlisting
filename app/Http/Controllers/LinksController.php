<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Song;
use DB;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    //
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
    public function storeContacts(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20|string',
            'email' => 'required|email|bail',
            'subject' => 'required|string|bail',
            'message' => 'required|max:255|string',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->subject = $request->subject;
        $contact->save();
        return redirect('/')->with('success', 'Message was sent successfully');
    }
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);
        $q = $request->search;
        $findMusic = Song::where('name', $q)->paginate(10);
        $otherSongs = DB::select('select * from songs ', ['limit 3']);

        if ($findMusic == true) {
            if (count($findMusic) > 0) {
                return view('search')->with(['success' => 'We found some results for you', 'song' => $findMusic, 'query' => $q, 'otherSongs' => $otherSongs]);

            } else {
                return redirect()->back()->with('error', 'no result found, please confirm the name of the song and try again');

            }
        } else {
            return redirect()->back()->with('error', 'no result found, please confirm the name of the song and try again');
        }
    }

}