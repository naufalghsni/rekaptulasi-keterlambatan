@extends('layouts.main')

@section('container')
    <div class="flex justify-center">
        <h1 class="text-2xl font-bold">Selamat Datang {{ Auth::user()->name }} !</h1>
    </div>

    <div class="mt-4 container mx-auto">

        <div class="bg-slate-100 rounded-lg p-4 flex items-center">
            <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
            <div>
                <p class="text-lg font-bold">Peserta Didik Rayon Anda</p>
                <p class="text-gray-600">{{ $totalStudentsInRayon }}</p>
            </div>
        </div>

        <div class="bg-slate-100 rounded-lg p-4 flex items-center">
            <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
            <div>
                <p class="text-lg font-bold">Keterlambatan Rayon Anda Hari ini</p>
                <p class="text-gray-600">{{ $totalDelaysInRayon }}</p>
            </div>
        </div>

            <!-- Card 2: Jumlah Administrator -->
            {{-- <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                    <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 2" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <p class="text-lg font-bold">Administrator</p>
                        <p class="text-gray-600">{{ $totalAdmins }}</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
