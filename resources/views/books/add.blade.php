<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add a book</title>
</head>
<body>
    @extends('components.layouts.app')
    
    @section('content')
        <div class='bg-white p-8 rounded'>
            <div class='flex justify-center'>
                <h2 class='mx-auto mb-4 font-bold text-lg'>Add book</h2>
            </div>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <label for="title" class='font-bold'>Title</label>
                @if ($errors->any())
                    <input type="text" name="title" value="{{ old('title') }}" class='block bg-[#FFEDD5] border border-red-600 rounded my-2 p-1 w-[300px]'>
                    <p class='text-red-600 text-sm font-bold'>This book is already in your library</p>
                @else
                    <input type="text" name="title" class='block bg-[#FFEDD5] rounded my-2 p-1 w-[300px]'>
                @endif
                <label for="author" class='font-bold'>Author</label>
                <input type="text" name="author" value="{{ old('author') }}" class='block bg-[#FFEDD5] rounded mt-2 p-1 w-[300px]'>
                <input type="submit" value="Add book" class='w-full bg-[#A16207] mt-4 p-2 rounded text-white'>
            </form>
        </div>
    @endsection
</body>
</html>
