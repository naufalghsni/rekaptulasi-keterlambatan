@extends('layouts.main')

@section('container')

<form method="post" action="{{ route('lates.update', $late['id']) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="mb-4">
        <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Siswa:</label>
        <select name="student_id" id="student_id" class="w-full border rounded-md p-2">
          <option selected disabled>Pilih Siswa</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>

     <div class="mb-6">
      <label for="date_time_late" class="block text-gray-700 text-sm font-bold mb-2">Waktu:</label>
      <input type="datetime-local" id="date_time_late" name="date_time_late" class="w-full border rounded-md p-2" value="{{ old('date_time_late', $late->date_time_late) }}" required autofocus>

      @error('date_time_late')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

     <div class="mb-6">
      <label for="information" class="block text-gray-700 text-sm font-bold mb-2">Informasi:</label>
      <input type="text" id="information" name="information" class="w-full border rounded-md p-2" value="{{ old('information', $late->information) }}" required autofocus>

      @error('information')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

     <div class="mb-6">
      <label for="bukti" class="block text-gray-700 text-sm font-bold mb-2">Bukti:</label>
      <input type="file" id="bukti" name="bukti" class="w-full border rounded-md p-2" value="{{ old('bukti', $late->bukti) }}" required autofocus>

      @error('bukti')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
@endsection