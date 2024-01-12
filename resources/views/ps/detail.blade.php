@extends('layouts.main')

@section('container')
    <div class="mt-4">
        <h2 class="text-2xl font-bold mb-4">{{ $keterlambatanSiswa->first()->student->name }} - Detail Keterlambatan</h2>

        <div class="bg-gray-200 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Informasi Siswa</h3>
            <p>Nama Siswa: {{ $keterlambatanSiswa->first()->student->name }}</p>
            <p>NIS: {{ $keterlambatanSiswa->first()->student->nis }}</p>
            <p>Rayon: {{ $keterlambatanSiswa->first()->student->rayon->rayon }}</p>
            <p>Rombel: {{ $keterlambatanSiswa->first()->student->rombel->rombel }}</p>
        </div>

        @foreach ($keterlambatanSiswa as $index => $keterlambatan)
            <div class="bg-white p-4 mb-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Keterlambatan ke -{{ $index + 1 }}</h3>
                <p>Tanggal Terlambat: {{ $keterlambatan->created_at->formatLocalized('%d %B %Y') }}</p>
                <p>Informasi Terlambat: {{ $keterlambatan->information }}</p>
                <img src="{{ asset('storage/' . $keterlambatan->bukti) }}" alt="Bukti Terlambat" class="mt-2 max-w-full w-64 h-auto">
            </div>
        @endforeach

        <!-- Informasi Siswa di Bagian Atas -->
    </div>
@endsection
