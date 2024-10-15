<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.cdnfonts.com/css/akira-expanded');

        body {}

        li:hover a {
            color: #E98E15 !important;
        }

        .active-link {
            color: #E98E15 !important;
        }

        .content {
            margin-left: 263px;
            /* Adjust based on sidebar width */
            padding-top: 103px;
            /* Adjust based on header height */
        }

        .hidden {
            display: none;
        }

        .page-header {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .page-header .link-name {
            font-weight: bold;
            color: #E98E15;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid transparent;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f8f9fa;
        }

        .content #semi-header h3 {
            font-size: 14px;
            font weight: bold;
            display: inline-block;
        }

        .nav-link:hover+.sub-menu,
        .sub-menu:hover {
            display: block;
        }
    </style>
</head>

<body
    style="margin: 0; padding: 0; box-sizing: border-box; text-decoration: none; border: none; outline: none; scroll-behavior: smooth; font-family: 'Poppins', sans-serif;">
    <header
        style="width: 100%; height: 83px; display: flex; align-items: center; justify-content: flex-end; gap: 16px; border: 1px solid #ccc; position: fixed; top: 0; z-index: 50; background-color: #fff;">
        <i class='bx bxs-bell' style="font-size:25px; color: #A6A6A6;"></i>
        <i class='bx bxs-grid' style="font-size: 25px; color: #A6A6A6;"></i>
        <img src="/icons/profile-pic.png" alt="Profile" style="height: 42px; width: 42px; margin-right:4%;">
    </header>

    <div
        style="width: 264px; height:100vh; left: 0; border: 1px solid #ccc; position: fixed; top: 0; z-index: 100; font-family: Helvetica, sans-serif;">
        <h1
            style="font-size: 26px; font-family: 'Akira Expanded', sans-serif; font-weight: bold; text-align: center; margin: 30px 0 40px 0;">
            TRACO</h1>

        {{-- --------------SIDEBAR-------------- --}}
        @include('include.superadmin-sidebar')
    </div>

    {{-- REQUESTS TABLE --}}

    <div class="content bg-gray-100 h-screen m-0">
        <nav class="text-gray-500 text-sm mb-4 ml-6" aria-label="Breadcrumb">
            <ol class="list-reset flex">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Pages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-500">Requests</li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold mb-4 ml-6">Manage Admin Requests</h1>
        <div class="w-auto flex-grow bg-white p-5 m-6 rounded-lg shadow-lg">

            @if (session('status'))
                <div class="bg-green-500 text-white p-2 mb-4 rounded-md">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 mb-4 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!empty($requests))
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-sm border rounded-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">First Name</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">Last Name</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">Address</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">Date Registered</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">Status</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $id => $request)
                                <tr class="border-t border-gray-300">
                                    <td class="py-2 px-4 text-center">{{ $request['first_name'] }}</td>
                                    <td class="py-2 px-4 text-center">{{ $request['last_name'] }}</td>
                                    <td class="py-2 px-4 text-center">{{ $request['address'] ?? '' }}</td>
                                    <td class="py-2 px-4 text-center">{{ $request['date_registered'] ?? '' }}</td>
                                    <td class="py-2 px-4 text-center text-orange-400">{{ $request['status'] }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <form action="{{ route('admin.requests.approve', $id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 text-white px-2 py-1 rounded-md">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.requests.deny', $id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 text-white px-2 py-1 rounded-md">Deny</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No pending requests.</p>
            @endif
        </div>
    </div>

    </div>
</body>

</html>
