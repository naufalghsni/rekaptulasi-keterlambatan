@extends('layouts.main')

@section('container')

<form method="post" action="{{ route('rombels.update', $rombel['id']) }}">
    @method('patch')
    @csrf
    <div class="mb-6">
      <label for="rombel" class="block text-gray-700 text-sm font-bold mb-2">Rombel:</label>
      <input type="text" id="rombel" name="rombel" class="w-full border rounded-md p-2" value="{{ old('rombel', $rombel->rombel) }}" required autofocus>

      @error('rombel')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
@endsection