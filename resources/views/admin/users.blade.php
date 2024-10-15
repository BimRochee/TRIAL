<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">User Level</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $userId => $user)
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    {{-- <td class="border px-4 py-2">
                        <form action="{{ route('users.update', $userId) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1">Update</button>
                        </form>
                        <form action="{{ route('users.delete', $userId) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1">Delete</button>
                        </form>
                        @if($user['active'])
                            <form action="{{ route('users.deactivate', $userId) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-2 py-1">Deactivate</button>
                            </form>
                        @else
                            <form action="{{ route('users.activate', $userId) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-2 py-1">Activate</button>
                            </form>
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>