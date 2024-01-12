<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('rombel', 'rayon')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('students.create', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
            // Tambahkan validasi sesuai kebutuhan lainnya
        ]);

        Student::create($request->all());

        return redirect()->route('students.home')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $student = Student::find($id);
        // or $student = student::where('id',$id)->first()

        return view('students.edit', compact('student', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
    ]);

        Student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('students.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }

    public function indexPs()
{
    // Assuming you have a logged-in user who is the "pembimbing siswa" (PS)
    $pembimbingSiswa = auth()->user();

    // Fetch students with the same rayon as the pembimbing siswa
    $students = Student::whereHas('rayon', function ($query) use ($pembimbingSiswa) {
        $query->where('user_id', $pembimbingSiswa->id);
    })
    ->with('rombel', 'rayon') // Eager load relationships
    ->get();

    return view('ps.students', compact('students'));
}

}

    // Metode lainnya tidak perlu diubah
