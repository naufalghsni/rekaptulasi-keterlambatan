<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use App\Models\User;
use App\Models\Late;
use Carbon\Carbon;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalStudents = Student::count();
        $totalRombels= Rombel::count();
        $totalRayons = Rayon::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalPembimbingSiswa = User::where('role', 'ps')->count();
        return view('index', compact('totalStudents', 'totalRombels', 'totalRayons', 'totalAdmins', 'totalPembimbingSiswa'));
    }


public function indexPS()
{
    $pembimbingSiswa = auth()->user();

    // Get the current date
    $today = Carbon::today();

    // Count delays for the specific rayon and today
    $totalDelaysInRayon = Late::whereHas('student.rayon', function ($query) use ($pembimbingSiswa) {
        $query->where('rayon_id', $pembimbingSiswa->id);
    })
    ->whereDate('date_time_late', $today)
    ->count();

    $totalStudentsInRayon = Student::whereHas('rayon', function ($query) use ($pembimbingSiswa) {
        $query->where('rayon_id', $pembimbingSiswa->id);
    })
    ->count();

    return view('ps.index', compact('totalStudentsInRayon', 'totalDelaysInRayon'));
}



}