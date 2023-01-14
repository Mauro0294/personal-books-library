<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit a book</title>
</head>
<body>
    @extends('components.layouts.app')
    
    @section('content')
        <div class='bg-white p-8 rounded'>
            <div class='flex justify-center'>
                <h2 class='mx-auto mb-4 font-bold text-lg'>Edit book</h2>
            </div>
            <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST">
                @csrf
                <label for="title" class='font-bold'>Title</label>
                @if ($errors->has('title'))
                    <input type="text" name="title" value="{{ old('title') }}" class='block bg-[#FFEDD5] border border-red-600 rounded my-2 p-1 w-[300px]'>
                    <p class='text-red-600 text-sm font-bold'>Book must have a name</p>
                @else
                    <input type="text" name="title" value="{{ $book->title }}" class='block bg-[#FFEDD5] rounded my-2 p-1 w-[300px]'>
                @endif
                <label for="author" class='font-bold'>Author</label>
                @if ($errors->has('author'))
                    <input type="text" name="author" value="{{ old('author') }}" class='block bg-[#FFEDD5] border border-red-600 rounded mt-2 p-1 w-[300px]'>
                    <p class='text-red-600 text-sm font-bold'>Book must have an author</p>
                @else
                    <input type="text" name="author" value="{{ $book->author }}" class='block bg-[#FFEDD5] rounded mt-2 p-1 w-[300px]'>
                @endif
                <label for="author" class='font-bold'>Read at</label>
                <input type="date" name="read_at" value="{{ $book->read_at }}" class='block bg-[#FFEDD5] rounded mt-2 p-1 w-[300px]'>
                <div class='flex justify-between font-bold text-sm'>
                    <input type="submit" name='action' value="Delete" class='bg-[#941616] mt-4 py-2 px-4 rounded text-white'>
                    <input type="submit" name='action' value="Save" class='bg-[#A16207] mt-4 py-2 px-4 rounded text-white'>
                </div>
            </form>
        </div>
    @endsection
</body>
</html>
