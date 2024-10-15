<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles



    <style>
        @import url('https://fonts.cdnfonts.com/css/akira-expanded');

        body {}

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

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 50px;
            border: 1px solid #888;
            width: 90%;
            /* Increased width */
            max-width: 900px;
            /* Increased max-width */
            max-height: 800px;
            /* Adjusted max-height */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0;
        }

        .modal-header i {
            color: #E98E15;
            font-size: 24px;
            margin-right: 10px;
        }

        .modal-header h2 {
            color: #E98E15;
            ;
            flex-grow: 1;
            margin-right: 10px;
            font-weight: 700;
            font-size: 18px;
        }

        .modal-header p {
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            color: #878787;
        }

        .modal p {
            margin: 0px 0px 20px 30px;
            font-weight: 400;
            font-size: 12px;
            color: #878787;
        }

        .modal label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .modal input,
        .modal select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .modal .form-group {
            display: flex;
            justify-content: space-between;
            /* Added space between columns */
            align-items: left;
            width: 100%;
        }

        .modal .form-group div {
            flex-basis: calc(50% - 20px);
            /* Each column takes half the width minus some space for margins */
            margin-right: 10px;
            /* Right margin for even spacing */
        }

        .modal .next-step {
            background-color: #E98E15;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 2px;
            cursor: pointer;
            width: 25%;
            height: 35px;
            font-size: 14px;
            margin-left: auto;
        }

        .select2-container .select2-selection--multiple {
            width: 100% height: auto;
            min-height: 38px;
            font-size: 14px;
            border-radius: 2px;
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))
        }

        .custom-select2-dropdown {
            width: 100% !important;
            /* Ensures the dropdown matches the select element width */
        }



        .batch-card {
            height: 500px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 1px 1px 53px -45px rgba(0, 0, 0, 0.36);
            -webkit-box-shadow: 1px 1px 53px -45px rgba(0, 0, 0, 0.36);
            -moz-box-shadow: 1px 1px 53px -45px rgba(0, 0, 0, 0.36);
            display: flex;
            flex-direction: column;
            /* Ensure column layout */
            justify-content: space-between;
            /* Space out the table and pagination */
            padding: 30px 50px;
        }

        .batch-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .batch-card table thead th {
            text-align: left;
            padding: 10px 0;
            font-weight: 700 !important;
            color: var(--dark-text);
        }

        .batch-card table tbody td {
            padding: 10px 0;
            color: var(--light-text);
        }

        .batch-card,
        .filter-panel {
            margin: 2rem;
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

    <div style="width: 264px; height:100vh; left: 0; border: 1px solid #ccc; position: fixed; top: 0; z-index: 100;">
        <h1
            style="font-size: 26px; font-family: 'Akira Expanded', sans-serif; font-weight: bold; text-align: center; margin: 30px 0 40px 0;">
            TRACO</h1>

        {{-- --------------SIDEBAR-------------- --}}
        @include('include.admin-sidebar')
    </div>

    {{-- BATCH CONTENT --}}

    <div class="content bg-gray-100 h-screen w-auto m-0 p-2">
        <nav class="text-gray-500 text-sm mb-4" aria-label="Breadcrumb" style="margin-left: 1rem;">
            <ol class="list-reset flex">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Pages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-orange-500">Batch</li>
            </ol>
        </nav>


        <div style="display: flex; justify-content: space-between; align-items: center;">
            <label style="font-weight: bold; font-size: 24px; margin-left: 2rem;">
                Batch <span style="color: #959595; font-size: 13px;">
            </label>
        </div>

        <div class="batch-card">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Date Created</th>
                        <th>Batch No.</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($batches as $batch)
                        <tr>
                            <td>{{ $batch->get('date_created')->format('F d, Y') }}</td>
                            <td>{{ $batch->get('batch_id') }}</td>
                            <td>{{ $batch->get('weight') ?? 'Unknown' }} kg</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>
