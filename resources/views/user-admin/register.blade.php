<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Admin Registration</h1>

        @if(session('status'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-500 text-white p-2 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                <select id="sex" name="sex" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title/Position</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Register</button>
        </form>
    </div>
</body>
</html>
