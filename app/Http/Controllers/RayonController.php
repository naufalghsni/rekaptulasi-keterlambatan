<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->get();
        return view('rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psUsers = User::where('role', 'ps')->get();
        return view('rayons.create', compact('psUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required|min:3',
            //disini validasi ps yang sudah di relasi di user
            'user_id' => 'required|exists:users,id',
        ]);


        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayons.home')->with('success', 'Rayon has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $psUsers = User::where('role', 'ps')->get();
        $rayon = Rayon::find($id);
        // or $rayon = rayon::where('id',$id)->first()

        return view('rayons.edit', compact('rayon', 'psUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required|min:3',
            'user_id' => 'required'
    ]);

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayons.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rayon::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }
}
