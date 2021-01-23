<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Komentar;

class ForumController extends Controller
{
    public function index(){
        // dd('forum');
        $forum = Forum::orderBy('created_at','desc')->paginate(10);
        return view('forum.index',compact(['forum']));
    }

    public function create(Request $request){
        // dd($request->all());
        $request->request->add(['user_id' => auth()->user()->id]);
        // dd($request->all());
        $forum = Forum::create($request->all());
        return redirect()->back()->with('sukses', 'Forum berhasil ditambahkan');
    }

    public function view(Forum $forum){
        // dd($forum);
        return view('forum.view',compact(['forum']));
    }

    public function postkomentar(Request $request){
        // dd($request->all());
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('success','Komentar berhasil ditambahkan');
    }
}
