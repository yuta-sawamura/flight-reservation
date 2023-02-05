@extends('layouts.app')
@section('content')
@if (session('message'))
@include('components.alert', ['message' => e(session('message'))])
@endif

<div class="container mx-auto px-4 sm:px-8">
  <div class="py-8">
    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
      <h2 class="text-2xl leading-tight">
        搭乗者一覧
      </h2>
      <form
        class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
        <div class="relative">
          <input type="text" placeholder="搭乗者名" name="keyword" value="{{ $keyword ?? null }}"
            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" />
        </div>
        <button
          class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-gray-500 rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-200"
          type="submit">
          検索
        </button>
      </form>
    </div>
    <div>
      <h3>日付：</h3>
      <h3>便名：</h3>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal table-fixed">
          <thead>
            <tr>
              <th scope="col"
                class="w-1/3 whitespace-no-wrap px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                座席クラス
              </th>
              <th scope="col"
                class="w-1/3 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                顧客番号
              </th>
              <th scope="col"
                class="w-1/3 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                氏名
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  hoge
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  fuga
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  hoge
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  fuga
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="" class="text-indigo-600 hover:text-indigo-900">
                  履歴
                </a>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="" class="text-indigo-600 hover:text-indigo-900">
                  編集
                </a>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <form name="deleteform" action="book" method="post">
                  @csrf
                  @method('delete')
                  <button
                    class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-red-200"
                    type="submit" onClick="delete_alert(event);return false;">
                    削除
                  </button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection