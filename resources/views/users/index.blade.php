<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Admin Users</h1>

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

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">First Name</th>
                    <th class="py-2">Last Name</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $id => $admin)
                    <tr>
                        <td class="py-2">{{ $admin['first_name'] }}</td>
                        <td class="py-2">{{ $admin['last_name'] }}</td>
                        <td class="py-2">{{ $admin['email'] }}</td>
                        <td class="py-2">
                            <form action="{{ route('users.update', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md">Update</button>
                            </form>
                            <form action="{{ route('users.destroy', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">
                                    @if(isset($admin['disabled']) && $admin['disabled'])
                                        Enable
                                    @else
                                        Disable
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
