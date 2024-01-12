<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombels.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required|min:3',
        ]);

        Rombel::create([
            'rombel' => $request->rombel,
        ]);

        // dd($request->role);


        return redirect()->route('rombels.home')->with('success', 'Berhasil menambahkan Users!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombel = Rombel::find($id);
        // or $rombel = rombel::where('id',$id)->first()

        return view('rombels.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required|min:3',
    ]);

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombels.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rombel::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }
}
