<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add book borrowers</title>
</head>
<body class='bg-[#FAECD1]'>
    @extends('components.layouts.app')
    @section('content')
        <div class='bg-white p-8 rounded'>
            <div class='flex justify-center'>
                <h2 class='mx-auto mb-4 font-bold text-lg'>Add book borrowers</h2>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <form method='POST' action='{{ route('borrowers.create') }}'>
                @csrf
                @for ($x = 0; $x < 5; $x++)
                    <tr>
                        <td>
                            <input type='text' name='borrowers[{{ $x }}][name]' class='border rounded px-1' value="{{ old('borrowers.'.$x.'.name') }}">
                            @if ($errors->has("borrowers.{$x}.email") || $errors->has("borrowers.{$x}.phone")) 
                                <p class='relative mb-4 invisible'>Error</p>
                            @endif
                        </td>
                        <td>
                            <input type='text' name='borrowers[{{ $x }}][email]' class='border rounded px-1' value="{{ old('borrowers.'.$x.'.email') }}">
                            @if ($errors->has("borrowers.{$x}.email"))
                                <p class='relative mb-4 text-red-600 text-sm font-bold'>Missing or invalid email</p>
                            @endif
                        </td>
                        <td>
                            <input type='text' name='borrowers[{{ $x }}][phone]' class='border rounded px-1' value="{{ old('borrowers.'.$x.'.phone') }}">
                            @if ($errors->has("borrowers.{$x}.phone"))
                                <p class='relative mb-4 text-red-600 text-sm font-bold'>Missing phone number</p>
                            @endif
                        </td>
                    </tr>
                @endfor
                <td colspan='3' align='center'>
                    <input type='submit' value='Save' class='bg-blue-500 text-white rounded px-4 py-2 mt-4'>
                </td>
                </form>
            </table>
        </div>
    @endsection
</body>
</html>
