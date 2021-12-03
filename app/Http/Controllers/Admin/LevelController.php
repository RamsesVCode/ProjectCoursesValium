<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index',compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:40',
        ]);
        $level = Level::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.levels.index')
            ->with('success','Nivel creadao exitosamente');
    }
    public function show(Level $level)
    {
        //
    }

    public function edit(Level $level)
    {
        return view('admin.levels.edit',compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|min:5|max:40',
        ]);
        $level->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.levels.index')
            ->with('success','Nivel actualizado exitosamente');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->back()->with('success','Nivel eliminado exitosamente');
    }
}
