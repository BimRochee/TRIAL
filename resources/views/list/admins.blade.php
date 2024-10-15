@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://fonts.cdnfonts.com/css/akira-expanded" rel="stylesheet">
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

        .card {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
        }

        .content {
            margin-left: 284px;
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

        .dashboard-card {
            width: 260px;
            height: 153px;
            border-radius: 8px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            border: 0.5px solid #DBDBDB;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card:first-child {
            background-color: #E98E15;
            border: none;
        }

        .dashboard-card2 {
            width: 555px;
            height: 198px;
            border-radius: 4px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .large-card {
            width: 1088px;
            height: 72vh;
            border-radius: 8px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #959595;
        }

        .large-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .large-card th, .large-card td {
            text-align: center; 
            padding: 10px;
        }

        .large-card thead {
            color: black; 
        }
        
        .transactions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transactions-header h5 {
            margin: 0;
        }

        .buy-sell-buttons {
            display: flex;
            align-items: center;
            border: 1px solid #959595;
        }

        .buy-sell-buttons button {
            width: 102px;
            height: 34px;
            color: #959595;
            cursor: pointer;
            font-weight: bold;
            font-family: Helvetica, sans-serif;
            border: none;
            background-color: #fff;
        }

        .buy-sell-buttons button:active {
            background: #E98E15;
            color: #fff;
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
        
        .nav-link:hover + .sub-menu, .sub-menu:hover {
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

        <!-- Main Content -->
        <div class="content flex-grow">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold mb-6">List of Admins</h1>
                <div class="table-container bg-white shadow rounded-md p-4">
                    <table class="min-w-full bg-white text-sm">
                        <thead>
                            <tr>
                                <th class="py-2">Name</th>
                                <th class="py-2">Email</th>
                                {{-- <th class="py-2">Contact No.</th> --}}
                                {{-- <th class="py-2">Date Created</th> --}}
                                <th class="py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="py-2">{{ $admin['first_name'] }} {{ $admin['last_name'] }}</td>
                                    <td class="py-2">{{ $admin['email'] }}</td>
                                    {{-- <td class="py-2">{{ $admin['contact_no'] }}</td> --}}
                                    {{-- <td class="py-2">{{ $admin->created_at->format('Y/m/d') }}</td> --}}
                                    <td class="py-2">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded">...</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{-- {{ $admins->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
