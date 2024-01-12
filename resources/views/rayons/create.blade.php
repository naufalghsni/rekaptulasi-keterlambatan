@extends('layouts.main')

@section('container')

<form method="post" action="{{ route('rayons.store') }}">
    @csrf
    <div class="mb-6">
      <label for="rayon" class="block text-gray-700 text-sm font-bold mb-2">Rayon:</label>
      <input type="text" id="rayon" name="rayon" class="w-full border rounded-md p-2" value="{{ old('rayon') }}" required autofocus>

      @error('rayon')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    
    <div class="mb-6">
        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Pembimbing Siswa:</label>
        <select id="user_id" name="user_id" class="w-full border rounded-md p-2">
            <option selected disabled>Pilih PS</option>
            @foreach ($psUsers as $psUser)
                <option value="{{ $psUser->id }}" {{ old('user_id') == $psUser->id ? 'selected' : '' }}>{{ $psUser->name }}</option>
            @endforeach
        </select>
    
        @error('user_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create</button>
@endsection