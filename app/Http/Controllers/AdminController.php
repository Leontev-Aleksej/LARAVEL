<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $works = Work::with(['user', 'category'])->get();
        return view('admin.index', compact('works'));
    }

    public function updateScore(Request $request, Work $work)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100',
        ]);

        $work->update(['score' => $request->score]);

        return redirect()->route('admin.index')->with('success', 'Оценка выставлена');
    }

}
