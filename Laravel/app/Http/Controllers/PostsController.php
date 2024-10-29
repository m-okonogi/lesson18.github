<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $query = DB::table('posts');

        if ($request->filled('search')) {

            $search = $request->input('search');

            $query->where('contents', 'like', '%' . $search . '%')
                ->orWhere('user_name', 'like', '%' . $search . '%');
        }

        $lists = $query->get();

        $count = $lists->count();

        return view('posts.index', compact('lists', 'count'));
    }

    public function createForm()
    {
        return view('posts.createForm');
    }

    public function create(Request $request)
    {
        $request->validate(['newContents' => 'string|max:100']);

        $contents = $request->input('newContents');

        DB::table('posts')->insert([
            'contents' => $contents,
            'user_name' => Auth::user()->name
        ]);

        return redirect('/index');
    }

    public function updateForm($id)
    {

        $contents = DB::table('posts')
            ->where('id', $id)
            ->first();

        return view('posts.updateForm', compact('contents'));
    }

    public function update(Request $request)
    {

        $request->validate(['upContents' => 'string|max:100']);

        $id = $request->input('id');

        $up_contents = $request->input('upContents');

        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['contents' => $up_contents]
            );
        return redirect('/index');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/index');
    }
}
