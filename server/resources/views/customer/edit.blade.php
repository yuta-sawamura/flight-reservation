@extends('layouts.app')
@section('content')
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">図書 編集</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <form action="/book/{{ $book->id }}" method="post" class="flex flex-wrap -m-2">
        @csrf
        @method('PUT')
        <div class="p-2 w-full">
          <label for="name" class="leading-7 text-sm text-gray-600">書籍</label>
          <input type="text" id="name" name="name" value="{{ $book->name }}" maxlength="100" required
            class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="p-2 w-full">
          <label for="author" class="leading-7 text-sm text-gray-600">著者</label>
          <input type="text" id="author" name="author" value="{{ $book->author }}" maxlength="50" required
            class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="p-2 w-full">
          <label for="ndc" class="leading-7 text-sm text-gray-600">NDC番号</label>
          <input type="text" id="ndc" name="ndc" value="{{ $book->ndc }}" maxlength="100" required
            class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="p-2 w-full">
          <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
          <input type="number" id="price" name="price" value="{{ $book->price }}" required
            class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="p-2 w-full">
          <button
            class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">編集</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection