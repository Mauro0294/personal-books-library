<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    <title>Books index</title>
</head>
@extends('components.layouts.app')
<body class='bg-[#FAECD1]'>
    @section('content')
    <div class='flex justify-center w-full'>
        <h1 class='mb-6 font-bold text-lg'>All books</h1>
    </div>
    <ul>
        @foreach ($books as $book)
        <div class='bg-white p-2 block rounded mb-4'>
            <li>
                <a class='hover:text-blue-700 transition' href="{{ route('books.edit', ['id' => $book->id]) }}"><h2 class='text-lg font-bold'>{{ $book->title }}</h2></a>
                <div class='flex justify-between'>
                    <p>{{ $book->author }}</p>
                    <div class='flex ml-12'>
                        @if ($book->read_at)
                            <label>Finished</label>
                            <input type='checkbox' value='{{ $book->id }}' class='ml-2 toggle-read' checked>
                        @else
                            <label>On the shelf</label>
                            <input type='checkbox' value='{{ $book->id }}' class='ml-2 toggle-read'>
                        @endif
                    </div>
                </div>
            </li>
        </div>
        @endforeach
    </ul>
    @endsection
    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
    @stack('scripts')
</body>
</html>