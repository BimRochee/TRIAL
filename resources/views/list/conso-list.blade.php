<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidators List</title>

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
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

        #consoTable,
        #consoTable th,
        #consoTable td {
            border: none !important;
            background: transparent !important;
        }

        /* Remove the default DataTables stripe effect */
        .dataTables_wrapper .dataTables_paginate .paginate_button,
        .dataTables_wrapper .dataTables_info {
            background: transparent;
            border: none;
        }

        /* Optional: Adjust row hover background color */
        #consoTable tbody tr:hover {
            background-color: #f3f3f3; /* Light gray when hovering over rows */
        }

        .dataTables_filter label {
            display: flex;
            font-size: 14px;
            color: #434343;
        }
        
        /* Make the search input look like a line instead of a box */
        .dataTables_filter input {
            border: none !important; 
            border-bottom: 1px solid #959595 !important; 
            border-radius: 0px  !important;
            background: transparent; 
            padding: 5px 10px !important; 
            margin-left: 10px !important;
            width: 300px; 
            transition: border-color 0.3s !important; 
            color: #434343 !important;
        }

        /* Change the border color when focused */
        .dataTables_filter input:focus {
            outline: none; /* Remove default focus outline */
            border-bottom: 2px solid #E98E15; /* Custom color for focused state */
        }

        /* Center the search bar or adjust its position if needed */
        .dataTables_filter {
            text-align: left; /* Align the search bar to the left */
            margin-bottom: 15px; /* Adjust spacing around the search input */
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
        @include('include.admin-sidebar')
    </div>

    {{-- CONSO TABLE --}}

    <div class="content bg-gray-100 h-screen w-auto m-0 p-2">
        <nav class="text-gray-500 text-sm pl-5" aria-label="Breadcrumb">
            <ol class="list-reset flex">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Pages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-500">List</li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-500">Consolidators</li>
            </ol>
        </nav>

        <div class="flex justify-between items-center pl-5">
            <label class="text-bold text-[24px]" style="font-weight: bold; font-size: 24px;">
                List of Consolidators 
                <span class="text-gray-mediumGray text-sm">(</span>
                <span class="text-defaultOrange text-sm">{{ count($consolidators) }}</span>
                <span class="text-gray-mediumGray text-sm">)</span>
                <span class="text-gray-mediumGray text-sm">entries</span>
            </label>
            {{-- <div class="buy-sell-buttons" style="display: flex; gap: 10px; border: none;">
                <button class="filter-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-slider-alt'></i> Filter
                </button>
                <button class="sort-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-sort'></i> Sort
                </button>
                <script>
                        document.querySelectorAll('.filter-button, .sort-button').forEach(button => {
                            button.addEventListener('mousedown', function() {
                                this.classList.add('active-button');
                            });
            
                            button.addEventListener('mouseup', function() {
                                setTimeout(() => {
                                    this.classList.remove('active-button');
                                }, 200); // Change color for 200ms
                            });
            
                            button.addEventListener('mouseleave', function() {
                                this.classList.remove('active-button');
                            });
                        });
                </script>
            </div> --}}
        </div>

        <div class="w-auto flex-grow bg-white p-5 m-6 rounded-lg shadow-lg">

            <div class="overflow-x-auto">
                <table id="consoTable" class="display table-auto border-collapse border-none">
                    <thead class="text-gray-mediumGray text-sm">
                        <tr class="border-none">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Date Created</th>
                            <th>&nbsp;</th> <!-- Action column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consolidators as $id => $conso)
                            <tr>
                                <td>{{ $conso['name'] ?? 'N/A' }}</td>
                                <td>{{ $conso['city'] ?? 'N/A' }}, {{ $conso['province'] ?? 'N/A' }}</td>
                                <td>{{ $conso['contact'] ?? 'N/A' }}</td>
                                <td>
                                    @if(isset($conso['created_at']))
                                        {{ \Carbon\Carbon::parse($conso['created_at'])->format('F j, Y') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <div class="relative inline-block text-left dropdown">
                                        <button id="dropdownButton-{{ $id }}" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown('{{ $id }}', event)">
                                            <span class="sr-only">Open options menu</span>
                                            <i class='bx bx-dots-horizontal-rounded'></i>
                                        </button>
                
                                        <!-- Dropdown menu -->
                                        <div id="dropdownMenu-{{ $id }}" class="hidden absolute right-0 z-10 w-56 mt-2 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" id="viewProfile" data-id="{{ $id }}">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#consoTable').DataTable({
                 "paging": false,        
                 "searching": true,     
                 "ordering": true,      
                 "lengthChange": false, 
                 "pageLength": 10,       
                 "info": false,         
                 "stripeClasses": [], 
                "columnDefs": [
                    { "orderable": false, "targets": 4 }  // Disable ordering on the actions column (index 5)
                ]
            });
        });
        
        //-------ACTION DROPDOWN-------//

        // Toggle the dropdown
        function toggleDropdown(id) {
            var menu = document.getElementById('dropdownMenu-' + id);

            // Hide all other open dropdowns
            closeAllDropdowns();

            // Toggle the visibility of the current dropdown
            menu.classList.toggle('hidden');
        }

        // Close all dropdowns
        function closeAllDropdowns() {
            var dropdowns = document.querySelectorAll("[id^='dropdownMenu-']");
            dropdowns.forEach(function(menu) {
                menu.classList.add('hidden');
            });
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            var isClickInside = event.target.closest('.dropdown');
            if (!isClickInside) {
                closeAllDropdowns();
            }
        });
    </script>
</body>
</html>
