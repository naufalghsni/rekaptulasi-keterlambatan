<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Rayon;
use Illuminate\Http\Request;
use App\Models\Student;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\LateExport;
use Maatwebsite\Excel\Facades\Excel;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::with('student')->get();
        return view('lates.index', compact('lates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('lates.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'date_time_late' => 'required',
        'information' => 'required',
        'bukti' => 'required|image|file',
    ]);

    // Create a Carbon instance with the desired timezone

    Late::create([
        'student_id' => $request->student_id,
        'date_time_late' => $request->date_time_late,
        'information' => $request->information,
        'bukti' => $request->file('bukti')->store('bukti-images'),
    ]);

    return redirect()->route('lates.home')->with('success', 'Siswa berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(late $lates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::all();
        $late = Late::find($id);
        // or $late = late::where('id',$id)->first()

        return view('lates.edit', compact('late', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|file',
    ]);

        Late::where('id', $id)->update([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->file('bukti')->store('bukti-images'),
        ]);

        return redirect()->route('lates.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Late::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }

    public function rekap()
    {
        // Mengambil data keterlambatan dengan menghitung jumlah keterlambatan untuk setiap siswa
    $rekapitulasi = Late::select('student_id', \DB::raw('count(*) as total_keterlambatan'))
    ->groupBy('student_id')
    ->with('student') // Mengambil informasi siswa terkait
    ->get();

return view('lates.rekap', compact('rekapitulasi'));
    }


    public function detail($id)
{
    $keterlambatanSiswa = Late::where('student_id', $id)
        ->with('student')
        ->orderBy('created_at', 'desc')
        ->get();

    $total_keterlambatan = $keterlambatanSiswa->count();
    $student = $keterlambatanSiswa->first()->student;

    return view('lates.detail', compact('keterlambatanSiswa', 'total_keterlambatan', 'student'));
}

public function generatePDF($id)
{
    $keterlambatanSiswa = Late::where('student_id', $id)
        ->with('student')
        ->orderBy('created_at', 'desc')
        ->get();

    $total_keterlambatan = $keterlambatanSiswa->count();
    $student = $keterlambatanSiswa->first()->student;

    $pdf = PDF::loadView('lates.pdf', compact('keterlambatanSiswa', 'total_keterlambatan', 'student'));

    return $pdf->download('keterlambatan_report.pdf');
}

public function exportExcel()
{
    $file_name = 'data_keterlambatan'.'.xlsx';
    return Excel::download(new LateExport, $file_name);
}

public function indexPs()
{
    // Assuming you have a logged-in user who is the "pembimbing siswa" (PS)
    $pembimbingSiswa = auth()->user();

    // Fetch students with the same rayon as the pembimbing siswa
    $lates = Late::whereHas('student', function ($query) use ($pembimbingSiswa) {
        $query->where('rayon_id', $pembimbingSiswa->id);
    })
    ->with(['student' => function ($query) {
        $query->with(['rombel', 'rayon']);
    }])
    ->get();

    return view('ps.lates', compact('lates'));
}

public function rekapPs()
{
    // Assuming you have a logged-in user who is the "pembimbing siswa" (PS)
    $pembimbingSiswa = auth()->user();

    // Mengambil data keterlambatan dengan menghitung jumlah keterlambatan untuk setiap siswa
    $rekapitulasi = Late::select('student_id', \DB::raw('count(*) as total_keterlambatan'))
        ->whereHas('student', function ($query) use ($pembimbingSiswa) {
            $query->where('rayon_id', $pembimbingSiswa->id);
        })
        ->groupBy('student_id')
        ->with(['student' => function ($query) {
            $query->with(['rombel', 'rayon']);
        }])
        ->get();

    return view('ps.rekap', compact('rekapitulasi'));
}

public function detailPs($id)
{
    $keterlambatanSiswa = Late::where('student_id', $id)
        ->with('student')
        ->orderBy('created_at', 'desc')
        ->get();

    $total_keterlambatan = $keterlambatanSiswa->count();
    $student = $keterlambatanSiswa->first()->student;

    return view('ps.detail', compact('keterlambatanSiswa', 'total_keterlambatan', 'student'));
}

public function generatePDFPS($id)
{
    $keterlambatanSiswa = Late::where('student_id', $id)
        ->with('student')
        ->orderBy('created_at', 'desc')
        ->get();

    $total_keterlambatan = $keterlambatanSiswa->count();
    $student = $keterlambatanSiswa->first()->student;

    $pdf = PDF::loadView('lates.pdf', compact('keterlambatanSiswa', 'total_keterlambatan', 'student'));

    return $pdf->download('keterlambatan_report.pdf');
}


}
