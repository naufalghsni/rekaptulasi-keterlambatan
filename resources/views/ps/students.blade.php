@extends('layouts.main')

@section('container')

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div> --}}

  @if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  No
              </th>
              <th scope="col" class="px-6 py-3">
                  Nis
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama
              </th>
              <th scope="col" class="px-6 py-3">
                 Rombel
              </th>
              <th scope="col" class="px-6 py-3">
                 Rayon
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
              </th>
              <td class="px-6 py-4">
                {{ $student->nis }}
              </td>
              <td class="px-6 py-4">
                {{ $student->name }}
              </td>
              <td class="px-6 py-4">
                {{ $student->rombel->rombel }}
              </td>
              <td class="px-6 py-4">
                {{ $student->rayon->rayon }}
              </td>
              @endforeach
          </tr>
      </tbody>
  </table>

  @endsection