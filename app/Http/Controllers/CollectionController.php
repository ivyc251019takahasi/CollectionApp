<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request)
{
    $query = Collection::query();

    if ($request->filled('keyword')) {
        $keyword = $request->keyword;

        $query->where(function ($q) use ($keyword) {
            $q->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('genre', 'like', '%' . $keyword . '%')
              ->orWhere('notes', 'like', '%' . $keyword . '%');
        });
    }

    $collections = $query
    ->where('user_id', auth()->id())
    ->latest()
    ->get();

    return view('collections.index', compact('collections'));
}
    public function create()
    {
        return view('collections.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'notes' => ['nullable', 'string'],
            ]);
            if ($request->hasFile('photo')) {
                $validated['photo'] = $request->file('photo')->store('photos', 'public');
            }
            $validated['user_id'] = auth()->id();
            Collection::create($validated);
            return redirect()->route('collections.index');
    }
    public function edit(Collection $collection)
    {
        abort_unless($collection->user_id === auth()->id(), 403);

        return view('collections.edit', compact('collection'));
    }

public function update(Request $request, Collection $collection)
{
    abort_unless($collection->user_id === auth()->id(), 403);

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'genre' => ['required', 'string', 'max:255'],
        'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'notes' => ['nullable', 'string'],
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $collection->update($validated);

    return redirect()->route('collections.index');
}

public function destroy(Collection $collection)
{
    abort_unless($collection->user_id === auth()->id(), 403);
    
    $collection->delete();

    return redirect()->route('collections.index');
}
}