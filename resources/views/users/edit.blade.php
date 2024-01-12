@extends('layouts.main')

@section('container')

<form method="post" action="{{ route('users.update', $user['id']) }}">
    @method('patch')
    @csrf
    <div class="mb-6">
      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
      <input type="text" id="name" name="name" class="w-full border rounded-md p-2" value="{{ old('name', $user->name) }}" required autofocus>

      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-6">
      <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
      <input type="email" id="email" name="email" class="w-full border rounded-md p-2" value="{{ old('email', $user->email) }}" required>

      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-6">
      <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
      <input type="password" id="password" name="password" class="w-full border rounded-md p-2" value="{{ old('password') }}" required>

      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    
    <div class="mb-6">
  <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
  <select id="role" name="role" class="w-full border rounded-md p-2">
    <option selected disabled>Pilih Role</option>
    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="ps" {{ old('role') == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
  </select>
    </div>
    <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
@endsection