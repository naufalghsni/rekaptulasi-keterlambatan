@extends('layouts.main')

@section('container')

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div> --}}

  @if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

<div class="inline-flex rounded-md shadow-sm" role="group">
  <a href="{{ route('ps.lates.home') }}"><button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
    Keseluruhan Data
  </button>
  </a>
  <a href="{{ route('ps.lates.rekap') }}"><button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
    Rekapitulasi
  </button>
  </a>
  <!-- <a href="{{ route('lates.export-excel') }}"><button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
    Excel
  </button> -->
  </a>
</div>
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
                  Jumlah Keterlambatan
              </th>
              <th scope="col" class="px-6 py-3">
                  Detail
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($rekapitulasi as $rekap)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
              </th>
              <td class="px-6 py-4">
                {{ $rekap->student->nis }}
              </td>
              <td class="px-6 py-4">
                {{ $rekap->student->name }}
              </td>
              <td class="px-6 py-4">
                {{ $rekap->total_keterlambatan }}
              </td>
              <td class="px-6 py-4">
                <a href="{{ route('ps.lates.detail', $rekap->student->id) }}"><button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 da">Detail</button></a>
              </td>
              <td class="px-6 py-4">
                @if ($rekap->total_keterlambatan >= 3)
                    <a href="{{ route('ps.lates.generatePDF', $rekap->student->id) }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cetak Keterlambatan</button></a>
                @endif
              </td>
              
              @endforeach
          </tr>
      </tbody>
  </table>

  @endsection