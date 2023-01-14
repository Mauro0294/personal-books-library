<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='bg-[#F5F5F4]'>
    <div class='w-full flex flex-col items-center mt-8'>
        <h1 class='font-bold text-2xl mb-4'>Personal library</h1>
        @include('flash-message')
        <div class='my-4'>
            @yield('content')
        </div>
    </div>
</body>