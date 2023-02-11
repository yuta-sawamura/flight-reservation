@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
      <h2 class="text-2xl leading-tight">
        予約状況
      </h2>
    </div>
    <div>
      <h3>日付：{{ $reservations[0]->year }}年{{ $reservations[0]->month }}月{{ $reservations[0]->day }}日</h3>
      <h3>出発地：{{ $reservations[0]->flight->departure_place }}</h3>
      <h3>到着地：{{ $reservations[0]->flight->arrival_place }}</h3>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal table-fixed">
          <thead>
            <tr>
              <th scope="col"
                class="w-1/4 whitespace-no-wrap px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                便名
              </th>
              <th scope="col"
                class="w-1/4 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                出発時刻
              </th>
              <th scope="col"
                class="w-1/4 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                ビジネスクラス
              </th>
              <th scope="col"
                class="w-1/4 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                エコノミークラス
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->flight_name }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->time }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->getCapBusiness() }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->getCapEconomy() }}
                </p>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mx-auto max-w-2xl py-32">
        <p class="mt-6 text-lg leading-8">○△×の表示ルール</p>
        <p class="leading-8 text-gray-600">ビジネスクラス： ○：残り2席以上、△：残り１席、×：満席</p>
        <p class="leading-8 text-gray-600">エコノミークラス： ○：残り5席以上、△：残り１～4席、×：満席</p>
      </div>
    </div>
  </div>
</div>
@endsection