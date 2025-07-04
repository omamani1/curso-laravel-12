<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tags = Tag::where('user_id', $user->id)->get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name',
        ], [
            'name.required' => 'La etiquieta es requerido',
            'name.unique' => 'Tiene que ser unico'
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Etiqueta creada.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Etiqueta actualizada.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Etiqueta eliminada.');
    }
}
