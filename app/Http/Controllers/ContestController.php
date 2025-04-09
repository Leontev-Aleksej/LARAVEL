<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $work = $user->work;

        if ($work) {
            return view('contest', ['work' => $work]);
        }

        $categories = Category::all();
        return view('contest', ['categories' => $categories]);
    }

    public function store(WorkRequest $request)
    {
        $user = Auth::user();

        if ($user->work) {
            return redirect()->route('contest')->with('error', 'Вы уже отправили работу.');
        }

        $path = $request->file('image')->store('uploads', 'public');

        Work::create([
            'title' => $request->title,
            'path_img' => $path,
            'user_id' => $user->id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('contest')->with('success', 'Работа отправлена!');
    }
}
