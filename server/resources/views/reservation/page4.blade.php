@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
      <h2 class="text-2xl leading-tight">
        予約状況
      </h2>
      <form class="w-full max-w-lg" action="{{url('/flight22007/page4')}}">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="year">
              年
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="year" type="number" name="year" placeholder="2022" value="{{ $params['year'] ?? null }}">
          </div>
          <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="month">
              月
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="month" type="number" name="month" placeholder="10" value="{{ $params['month'] ?? null }}">
          </div>
          <div class="w-full md:w-1/3 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="day">
              日
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="day" type="number" name="day" placeholder="24" value="{{ $params['day'] ?? null }}">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="departure_place">
              出発地
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="departure_place" type="text" name="departure_place" placeholder="那覇"
              value="{{ $params['departure_place'] ?? null }}">
          </div>
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="arrival_place">
              到着地
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="arrival_place" type="text" name="arrival_place" placeholder="南大東"
              value="{{ $params['arrival_place'] ?? null }}">
          </div>
          <div class="flex items-center justify-between w-full px-3">
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">
              検索
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal table-fixed">
          <thead>
            <tr>
              <th scope="col"
                class="w-1/7 whitespace-no-wrap px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                便名
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                出発時刻
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                ビジネスクラス
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                エコノミークラス
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                日付
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                出発地
              </th>
              <th scope="col"
                class="w-1/7 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                到着地
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
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->year }}年{{ $reservation->month }}月{{ $reservation->day }}日
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->departure_place }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $reservation->flight->arrival_place }}
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