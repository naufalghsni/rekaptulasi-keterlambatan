@extends('layouts.main')

@section('container')
    <div class="flex justify-center">
        <h1 class="text-2xl font-bold">Selamat Datang {{ Auth::user()->name }} !</h1>
    </div>

    <div class="mt-4 container mx-auto">

        <div class="flex flex-wrap justify-start">
            <!-- Card 1: Jumlah Peserta Didik -->
            <div class="w-1/2 xl:w-2/3 p-4"> <!-- Lebar card pertama diperbesar menjadi 2/3 lebar container -->
                <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                    <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <p class="text-lg font-bold">Peserta Didik</p>
                        <p class="text-gray-600">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Jumlah Administrator -->
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                    <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 2" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <p class="text-lg font-bold">Administrator</p>
                        <p class="text-gray-600">{{ $totalAdmins }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Jumlah Pemimbing Siswa -->
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                    <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 3" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <p class="text-lg font-bold">Pemimbing Siswa</p>
                        <p class="text-gray-600">{{ $totalPembimbingSiswa }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 4: Jumlah Rombel -->
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                    <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 4" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <p class="text-lg font-bold">Jumlah Rombel</p>
                        <p class="text-gray-600">{{ $totalRombels }}</p>
                    </div>
                </div>
            </div>

            <!-- Card 5: Jumlah Rayon -->
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                    <div class="bg-slate-100 rounded-lg p-4 flex items-center">
                        <img src="/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="Image 5" class="w-12 h-12 object-cover rounded-full mr-4">
                        <div>
                            <p class="text-lg font-bold">Jumlah Rayon</p>
                            <p class="text-gray-600">{{ $totalRayons }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
