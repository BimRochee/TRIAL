@if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
    @livewireStyles
    @livewireStyles

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

        .content #semi-header h3 {
            font-size: 14px;
            font weight: bold;
            display: inline-block;
        }

        .nav-link:hover+.sub-menu,
        .sub-menu:hover {
            display: block;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--multiple {
            width: 100% !important;
            height: auto;
            min-height: 38px;
            font-size: 14px;
            border-radius: 2px;
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))

        }

        .custom-select2-dropdown {
            width: 100% !important; /* Ensures the dropdown matches the select element width */
        }

        /*DROPDOWN*/
        .dropdown-menu {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
        }

        .dropdown-menu.show {
            display: block !important;
            opacity: 1;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .hidden {
            display: none;
        }

        .fixed {
            position: fixed;
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        /* Remove borders from the table, header, and cells */
        #farmersTable,
        #farmersTable th,
        #farmersTable td {
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
        #farmersTable tbody tr:hover {
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
        style="width: 100%; height: 83px; display: flex; align-items: center; justify-content: flex-end; gap: 16px; border: 1px solid #ccc; position: fixed; top: 0; z-index: 40; background-color: #fff;">
        <i class='bx bxs-bell' style="font-size:25px; color: #A6A6A6;"></i>
        <i class='bx bxs-grid' style="font-size: 25px; color: #A6A6A6;"></i>
        <img src="/icons/profile-pic.png" alt="Profile" style="height: 42px; width: 42px; margin-right:4%;">
    </header>

    <div
        style="width: 264px; height:100vh; left: 0; border: 1px solid #ccc; position: fixed; top: 0; z-index: 40; font-family: Helvetica, sans-serif;">
        <h1
            style="font-size: 26px; font-family: 'Akira Expanded', sans-serif; font-weight: bold; text-align: center; margin: 30px 0 40px 0;">
            TRACO</h1>

        {{-- --------------SIDEBAR-------------- --}}
        @include('include.admin-sidebar')
    </div>

    {{-- FARMERS LIST --}}

    <div class="content bg-gray-100 h-auto w-auto m-0 p-2">
        {{-- BREADCRUMB --}}
        <nav class="text-gray-500 text-sm pl-5" aria-label="Breadcrumb">
            <ol class="list-reset flex">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Pages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-500">List</li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-500">Farmers</li>
            </ol>
        </nav>

        {{-- HEADER --}}
        <div class="flex justify-between items-center pl-5 pr-5">
            <label style="font-weight: bold; font-size: 24px;">
                List of Farmers 
                <span class="text-gray-mediumGray text-sm">(</span>
                <span class="text-defaultOrange text-sm">{{ $paginator->total() }}</span>
                <span class="text-gray-mediumGray text-sm">)</span>
                <span class="text-gray-mediumGray text-sm">entries</span>
            </label>
            <div class="buy-sell-buttons" style="display: flex; gap: 10px; border: none;">
                {{-- <button class="filter-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-slider-alt'></i> Filter
                </button>
                <button class="sort-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-sort'></i> Sort
                </button> --}}
                <button onclick="openAddModal()" class="w-[88px] py-2 px-4 rounded cursor-pointer bg-defaultOrange text-white flex items-center justify-center">
                    <span class="bg-white rounded-full text-defaultOrange font-bold h-[16px] w-[16px] flex items-center justify-center">
                        <i class='bx bx-plus'></i>
                    </span>
                    <span class="font-semibold text-md pl-5">Add</span>
                </button>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="w-auto flex-grow bg-white p-5 m-6 rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table id="farmersTable" class="display table-auto border-collapse border-none">
                        <thead class="text-gray-mediumGray text-sm">
                            <tr class="border-none">
                                <th>Name</th>
                                <th>Address</th>
                                <th>Total Land Area</th>
                                <th>Contact No.</th>
                                <th>Date Registered</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-lightGray text-sm">
                            @foreach($paginator as $id => $farmer)
                                <tr>
                                    <td>{{ $farmer['name'] ?? 'N/A' }}</td>
                                    <td>{{ $farmer['city'] }}, {{ $farmer['province'] }}</td>
                                    <td>{{ $farmer['ttl_landArea'] ?? 'N/A' }}</td>
                                    <td>{{ $farmer['contact'] ?? 'N/A' }}</td>
                                    <td>
                                        @if(isset($farmer['created_at']))
                                            {{ \Carbon\Carbon::parse($farmer['created_at'])->format('F j, Y') }}
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
            <p class="text-sm mt-4">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
            </p>
            {{ $paginator->links() }}
        </div>

        <!--Profile Modal-->
        <div id="viewProfileModal" class="fixed inset-0 z-50 p-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-1/3 max-h-[80vh] overflow-y-auto">
                <!-- Orange header -->
                <div class="h-24 bg-defaultOrange rounded-t-lg p-0 inset-0 w-full relative flex items-center justify-center">
                    <!-- Profile Image (Centered Circle) -->
                    <div class="absolute -bottom-12 w-24 h-24 bg-white rounded-full border-4 border-white overflow-hidden">
                        <img src="https://via.placeholder.com/150" alt="Profile" class="w-full h-full object-cover rounded-full">
                    </div>
                </div>
        
                <!-- Profile Name and Address -->
                <div class="mt-16 text-center">
                    <h2 class="text-2xl font-semibold text-gray-darkGray" id="profileName"></h2>
                    <p class="text-sm text-gray-lightGray" id="profileAddress"></p>
                </div>
         
                <!-- Consolidator Profile -->
                <div id="consolidatorSection" class="flex hidden flex-col items-center my-4">
                    <div class="w-12 h-12 bg-white rounded-full border-2 border-gray-300 overflow-hidden">
                        <img src="https://via.placeholder.com/100" alt="Consolidator" class="w-full h-full object-cover rounded-full">
                    </div>
                    <p class="text-sm text-gray-darkGray font-semibold" id="consolidatorName"></p>
                    <p class="text-xs text-gray-400">Consolidator</p>
                </div>
        
                <!-- Profile Information -->
                <div class="p-6">
                    <h3 class="text-lg text-defaultOrange font-bold my-3">Profile Information</h3>
                    <div class="flex justify-between my-2">
                        <p class="text-sm my-3">
                            <strong class="text-gray-lightGray font-medium">Phone No.</strong><br>
                            <span class="text-gray-darkGray" id="profilePhone"></span>
                        </p>
                        <p class="text-sm my-3">
                            <strong class="text-gray-lightGray font-medium">Account Created</strong><br>
                            <span class="text-gray-darkGray" id="acctCreated"></span>
                        </p>
                    </div>
                    <p class="text-sm my-3">
                        <strong class="text-gray-lightGray font-medium">Last Active</strong><br>
                        <span class="text-gray-darkGray" id=""></span>
                    </p>
                </div>
        
                <!-- Farm Information -->
                <div class="p-6">
                    <h3 class="text-lg text-defaultOrange font-bold my-3">Farm Information</h3>
                    <div class="flex justify-between my-2">
                        <p class="text-sm my-3">
                            <strong class="text-gray-lightGray font-medium">Farm Address</strong><br>
                            <span id="farmAddress"></span>
                        </p>
                        <p class="text-sm my-3">
                            <strong class="text-gray-lightGray font-medium">Farm Type</strong><br>
                            <span class="text-gray-darkGray" id="farmType"></span>
                        </p>
                    </div>
                    <div class="flex justify-between my-2">
                        <p class="text-sm my-3">
                            <stron class="text-gray-lightGray font-medium">Farm Hectare</strong><br>
                            <span class="text-gray-darkGray" id="farmHectare"></span>
                        </p>
                        <p class="text-sm my-3">
                            <strong class="text-gray-lightGray font-medium">Cacao Hectare</strong><br>
                            <span class="text-gray-darkGray" id="cacaoHectare"></span>
                        </p>
                    </div>
                </div>
        
                <!--Buttons -->
                <div class="flex justify-between mt-4 p-6">
                    <a href="#" class="block px-4 py-2 text-sm text-defaultOrange"  onclick="openFullProfileModal('{{ $id }}')">View Profile</a>
                    <button onclick="closeProfileModal()" class="px-4 py-2 bg-defaultOrange text-white rounded">Transact</button>
                </div>
            </div>
        </div>

       <div id="fullProfileModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-75 overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-3/4 max-h-[80vh] overflow-y-auto">
                <!-- Header with Back Button and Edit -->
                <div class="flex justify-between items-center p-4 border-b border-gray-200">
                    <button onclick="closeFullProfileModal()" class="text-defaultOrange">
                        ← Farmer Profile
                    </button>
                    <a href="#" class="text-defaultOrange font-semibold" id="editProfile">Edit</a>
                </div>
        
                <!-- Profile Content -->
                <div class="p-6">
                    <!-- Profile Picture and Change Photo Option -->
                    <div class="flex items-center">
                        <div class="relative">
                            <img src="https://via.placeholder.com/150" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover">
                            <p class="absolute bottom-0 left-0 text-defaultOrange text-sm mt-2 cursor-pointer">Change Photo</p>
                            <p class="text-xs text-gray-500">At least under 15 MB.</p>
                        </div>
                    </div>
        
                    <!-- Personal Information Section -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700">Personal information</h3>
                        <p class="text-gray-500 mb-4">Update address, contact details, and civil status.</p>
        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">First name</p>
                                <p class="font-semibold" id="profileFirstName"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Last name</p>
                                <p class="font-semibold" id="profileLastName"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Address</p>
                                <p class="font-semibold" id="profileAddress"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Contact number</p>
                                <p class="font-semibold" id="profilePhone"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Birthdate</p>
                                <p class="font-semibold" id="profileBirthdate"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Civil Status</p>
                                <p class="font-semibold text-defaultOrange" id="profileCivilStatus"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600"></p>
                                <p class="font-semibold" id="profileValidID"></p>
                                <img src="https://via.placeholder.com/100x60" alt="Valid ID" class="mt-2">
                            </div>
                        </div>
                    </div>
        
                    <!-- Farm Information Section -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700">Farm information</h3>
                        <p class="text-gray-500 mb-4">Update your profile, contact details, and preferences to personalize experience.</p>
        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">Farm Address</p>
                                <p class="font-semibold" id="farmAddress"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Farm Type</p>
                                <p class="font-semibold" id="farmType"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Farm Hectare</p>
                                <p class="font-semibold" id="farmHectare"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Cacao Hectare</p>
                                <p class="font-semibold" id="cacaoHectare"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Variety</p>
                                <p class="font-semibold" id="cacaoVariety"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Clone</p>
                                <p class="font-semibold text-defaultOrange" id="cacaoClone">[unknown]</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Type of Beans</p>
                                <p class="font-semibold" id="typeOfBeans"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Farming Technology</p>
                                <p class="font-semibold" id="farmingTechnology"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Post-harvest technologies</p>
                                <p class="font-semibold" id="postHarvestTech"></p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Save Changes Button -->
                    <div class="flex justify-end mt-6">
                        <button onclick="saveProfileChanges()" class="bg-defaultOrange hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ADD FARMER --}}
        <div id="addFarmerModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg shadow-lg w-1/2 p-6 max-h-[80vh] overflow-y-auto">
                <form id="farmerForm" action="{{ route('add-farmer') }}" method="POST">
                    @csrf
                    <!-- Step 1: Basic Information -->
                    <div id="step1" class="step">
                        <!-- Title and Subtitle -->
                        <h2 class="text-2xl font-bold text-orange-600">Create farmer account</h2>
                        <p class="text-gray-600 mb-6">Manually register the account of the farmer.</p>

                        <!-- Grid for form layout -->
                        <div class="grid grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="firstName" name="fname" placeholder="First name" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="lastName" name="lname" placeholder="Last name" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- Upload Valid ID -->
                            {{-- <div>
                                <label for="uploadID" class="block text-sm font-medium text-gray-700">
                                    Upload Valid ID <span class="text-red-500">*</span>
                                </label>
                                <input type="file" id="uploadID" name="validID" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div> --}}

                            <!-- Province -->
                            <div>
                                <label for="province" class="block text-sm font-medium text-gray-700">
                                    Province <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="province" name="province" placeholder="Select province" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- City/Municipality -->
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">
                                    City and Municipalities <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="city" name="city" placeholder="Select city" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- Barangay -->
                            <div>
                                <label for="barangay" class="block text-sm font-medium text-gray-700">
                                    Barangay <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="barangay" name="brgy" placeholder="Select barangay" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- Others (Street, Purok, Blk) -->
                            <div>
                                <label for="others" class="block text-sm font-medium text-gray-700">
                                    Others (Street, Purok, Blk) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="others" name="others" placeholder="Street, Purok, Blk" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phoneNumber" class="block text-sm font-medium text-gray-700">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="phoneNumber" name="phone_num" placeholder="Phone number" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                            </div>
                        </div>

                        <!-- Next Step Button -->
                        <div class="flex justify-end mt-6">
                            <button type="button" onclick="nextStep(2)" class="bg-defaultOrange hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded">
                                Next Step →
                            </button>
                        </div>
                    </div>
            
                    <!-- Step 2: Farm Information -->
                    <div id="step2" class="step hidden grid grid-cols-2 gap-6">
                        {{-- Farm Type (cacao_op) --}}
                        <div>
                            <label for="farmType">Farm Type:</label>
                            <select id="cacaoOp" name="cacao_op" class="mb-2 p-2 border border-gray-300 rounded w-full">
                            <option value="">Type of Cacao Operation</option>
                            <option value="Private Owned">Private Owned</option>
                            <option value="Government Owned">Government Owned</option>
                        </select>
                        </div>
                        
                        {{-- blank --}}
                        <div class="mb-2 p-2 border-none w-full"></div>
                        {{-- Farm hectare (ttl_landArea) --}}
                        <div>
                            <label for="farmHectare">Total Farm Hectare</label>
                            <input type="number" id="farmHectare" name="farm_ha" placeholder="Total Farm Hectare" class="mb-2 p-2 border border-gray-300 rounded w-full">
                        </div>
                        
                        <div>
                            <label for="cacaoHectare">Total Cacao Hectare</label>
                            <input type="number" id="cacaoHectare" name="cacao_ha" placeholder="Total Cacao Hectare" class="mb-2 p-2 border border-gray-300 rounded w-full">
                        </div>
                        
                        <div>
                            <label for="beansSold">Beans Sold</label>
                            <select multiple id="beansSold" name="beans_sold[]" class="select2-multiple select2-container mb-2 p-2 border border-gray-300 rounded w-full">
                                <option value="Wet Beans">Wet Beans</option>
                                <option value="Dry Unfermented Beans">Dry Unfermented Beans</option>
                                <option value="Dry Fermented Beans">Dry Fermented Beans</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="cacaoVar">Cacao Varieties</label>
                            <select multiple id="cacaoVar" name="cacao_var[]" class="select2-multiple select2-container mb-2 p-2 border border-gray-300 rounded w-full">
                                <option value="UF18">UF18</option>
                                <option value="BR25">BR25</option>
                                <option value="W10">W10</option>
                                <option value="BRAZIL">BRAZILs</option>
                                <option value="PBC123">PBC123</option>
                                <option value="K1">K1</option>
                                <option value="MIRACLES">MIRACLES</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="techniques">What cacao-related technique and technology does the farmer practice?</label>                        
                            <select multiple id="techniques" name="techniques[]" class="select2-multiple select2-container mb-2 p-2 border border-gray-300 rounded w-full">
                                <option value="Farm Diversification">Farm Diversification</option>
                                <option value="Plant Renewal">Plant Renewal</option>
                                <option value="Integrated Pest Management">Integrated Pest Management</option>
                                <option value="Disease Management">Disease Management</option>
                                <option value="Pruning">Pruning</option>
                                <option value="Soil-Related Fertility">Soil-Related Fertility</option>
                                <option value="Conservation">Conservation</option>
                                <option value="Harvesting">Harvesting</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="technologies">What cacao post-harvest technologies does the farmer practice?</label>                        
                            <select multiple id="technologies" name="technologies[]" class="select2-multiple select2-container mb-2 p-2 border border-gray-300 rounded w-full">
                                <option value="Pod Storage">Pod Storage</option>
                                <option value="Pod Breaking & Beans Removal">Pod Breaking & Beans Removal</option>
                                <option value="Fermentation">Fermentation</option>
                                <option value="Drying">Drying</option>
                                <option value="Sorting">Sorting</option>
                                <option value="Dry Bean Storage">Dry Bean Storage</option>
                                <option value="Bean Grading">Bean Grading</option>
                            </select>
                        </div>
                        

                        <button type="button" onclick="nextStep(3)">Next Step</button>
                    </div>
            
                    <!-- Step 3: Summary & Submit -->
                    <div id="step3" class="step hidden grid grid-cols-2 gap-6">
                        <h3>Review Account Information</h3>
                        <p><strong>First Name:</strong> <span id="confirmFname"></span></p>
                        <p><strong>Last Name:</strong> <span id="confirmLname"></span></p>
                        <p><strong>Address:</strong> <span id="confirmAddress"></span></p>
                        <p><strong>Phone Number:</strong> <span id="confirmPhone"></span></p>
                        
                        <h4>Cacao Operation Details:</h4>
                        <p><strong>Type of Cacao Operation:</strong> <span id="confirmCacaoOp"></span></p>
                        <p><strong>Total Farm Hectare:</strong> <span id="confirmFarmHectare"></span></p>
                        <p><strong>Total Cacao Hectare:</strong> <span id="confirmCacaoHectare"></span></p>
                        <p><strong>Beans Sold:</strong> <span id="confirmBeansSold"></span></p>
                        <p><strong>Cacao Varieties:</strong> <span id="confirmCacaoVarieties"></span></p>
                        <p><strong>Cacao Techniques:</strong> <span id="confirmTechniques"></span></p>

                        <button type="submit mt-4 px-4 py-2 bg-green-500 text-white rounded">Submit</button>
                    </div>
                </form>

                <button onclick="closeAddModal()" class="mt-4 px-4 py-2 bg-gray-400 text-white rounded">Close</button>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    
    <script>
        $(document).ready(function() {
            $('#farmersTable').DataTable({
                 "paging": false,        
                 "searching": true,     
                 "ordering": true,      
                 "lengthChange": false, 
                 "pageLength": 10,       
                 "info": false,         
                 "stripeClasses": [], 
                "columnDefs": [
                    { "orderable": false, "targets": 5 }  // Disable ordering on the actions column (index 5)
                ]
            });

            // Use event delegation to handle click on 'View Profile' links
            $('#farmersTable').on('click', 'a#viewProfile', function(event) {
                event.preventDefault();

                // Get the ID from the data-id attribute
                var id = $(this).data('id');

                // Check if the ID is being retrieved correctly
                console.log('Opening profile for ID:', id);

                // Call the function to open the profile modal
                openProfileModal(id);
            });
        });

        //---MULTI-SELECT---//
        $(document).ready(function() {
            $('.select2-multiple').select2({   
                    placeholder: "Select one or more",
                    allowClear: true,
                    tags: true
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

        //-----FARMER PROFILE-----//
        var farmers = @json($paginator->toArray());
        // Open the modal with the data
        function openProfileModal(id) {
            var selectedFarmer = farmers.data[id];
            
             //Conso Information
            if (selectedFarmer.consoname && selectedFarmer.consoname.trim() !== "") {
                // Set the consolidator's name
                document.getElementById('consolidatorName').textContent = selectedFarmer.consoname;
                document.getElementById('consolidatorSection').classList.remove('hidden'); // Make the section visible
            } else {
                // Hide the consolidator section if no 'consoname' is available
                document.getElementById('consolidatorSection').classList.add('hidden');
            }
                
            //Farmer Information
            document.getElementById('profileName').textContent = selectedFarmer.name;
            document.getElementById('profilePhone').textContent = selectedFarmer.contact || 'N/A';
            document.getElementById('profileAddress').textContent = selectedFarmer.city + ', ' + selectedFarmer.province || 'N/A';
            document.getElementById('acctCreated').textContent = selectedFarmer.created_at || 'N/A';
            document.getElementById('farmAddress').textContent = selectedFarmer.address || 'N/A';
            document.getElementById('farmType').textContent = selectedFarmer.cacao_op || 'N/A';
            document.getElementById('farmHectare').textContent = selectedFarmer.ttl_landArea || 'N/A';
            document.getElementById('cacaoHectare').textContent = selectedFarmer.ttl_cacaoArea || 'N/A';

            document.getElementById('viewProfileModal').classList.remove('hidden');
        }

        // Close the modal
        function closeProfileModal() {
            document.getElementById('viewProfileModal').classList.add('hidden');
        }

        // --ADD FARMER OPERATIONS-- //
        function nextStep(step) {
            // Hide all steps
            document.querySelectorAll('.step').forEach(stepDiv => {
                stepDiv.classList.add('hidden');
            });
            // Show the selected step
            document.getElementById('step' + step).classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addFarmerModal').classList.add('hidden');
        }

        //---------ADD FARMER----------//
        // Function to open the modal
        function openAddModal() {
            document.getElementById('addFarmerModal').classList.remove('hidden');
        }

        // Function to close the modal
        function closeAddModal() {
            document.getElementById('addFarmerModal').classList.add('hidden');
        }

        // Function to navigate to the next step
        function nextStep(stepNumber) {
            // Hide all steps
            let steps = document.getElementsByClassName('step');
            for (let i = 0; i < steps.length; i++) {
                steps[i].classList.add('hidden');
            }
            
            // Show the current step
            document.getElementById(`step${stepNumber}`).classList.remove('hidden');
            
            // If it's the last step, fill the confirmation fields
            if (stepNumber === 3) {
                fillConfirmation();
            }
        }

        // Function to fill confirmation details on Step 3
        function fillConfirmation() {
            // Populate confirmation fields
            document.getElementById('confirmFname').innerText = document.getElementById('firstName').value;
            document.getElementById('confirmLname').innerText = document.getElementById('lastName').value;
            // document.getElementById('confirmValidID').innerText = document.getElementById('validID').value;
            document.getElementById('confirmAddress').innerText = `${document.getElementById('province').value}, ${document.getElementById('city').value}, ${document.getElementById('barangay').value}`;
            document.getElementById('confirmPhone').innerText = document.getElementById('phoneNumber').value;
            
            document.getElementById('confirmCacaoOp').innerText = document.getElementById('cacaoOp').value;
            document.getElementById('confirmFarmHectare').innerText = document.getElementById('farmHectare').value;
            document.getElementById('confirmCacaoHectare').innerText = document.getElementById('cacaoHectare').value;
            
            // Get selected beans sold
            let beansSoldOptions = document.getElementById('beansSold').selectedOptions;
            let beansSold = [];
            for (let i = 0; i < beansSoldOptions.length; i++) {
                beansSold.push(beansSoldOptions[i].value);
            }
            document.getElementById('confirmBeansSold').innerText = beansSold.join(', ');

            // Get selected cacao varieties
            let cacaoVarOptions = document.getElementById('cacaoVar').selectedOptions;
            let cacaoVarieties = [];
            for (let i = 0; i < cacaoVarOptions.length; i++) {
                cacaoVarieties.push(cacaoVarOptions[i].value);
            }
            document.getElementById('confirmCacaoVarieties').innerText = cacaoVarieties.join(', ');

            // Get selected techniques
            let techniquesOptions = document.getElementById('techniques').selectedOptions;
            let techniques = [];
            for (let i = 0; i < techniquesOptions.length; i++) {
                techniques.push(techniquesOptions[i].value);
            }
            document.getElementById('confirmTechniques').innerText = techniques.join(', ');
        }

        // Event listener for opening the modal
        document.querySelector('button a').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default link behavior
            openAddModal();
        });

        //-----FULL PROFILE------//
        function openFullProfileModal(id) {
            // Get farmer data using the ID
            var selectedFarmer = farmers.data[id];

            //Profile Information
            document.getElementById('profileFirstName').textContent = selectedFarmer.fname;
            document.getElementById('profileLastName').textContent = selectedFarmer.lname;
            document.getElementById('profileAddress').textContent = selectedFarmer.address || 'N/A';
            document.getElementById('profilePhone').textContent = selectedFarmer.contact || 'N/A';
            document.getElementById('profileBirthdate').textContent = selectedFarmer.birthdate || 'N/A';
            document.getElementById('profileCivilStatus').textContent = selectedFarmer.marital || 'N/A';

            //Farm Information           
            document.getElementById('farmAddress').textContent = selectedFarmer.farmAddress || 'N/A';
            document.getElementById('farmType').textContent = selectedFarmer.cacao_op || 'N/A';
            document.getElementById('farmHectare').textContent = selectedFarmer.ttl_landArea || 'N/A';
            document.getElementById('cacaoHectare').textContent = selectedFarmer.ttl_cacaoArea || 'N/A';
            document.getElementById('cacaoVariety').textContent = selectedFarmer.variety || 'N/A';
            document.getElementById('typeOfBeans').textContent = selectedFarmer.typeBeans || 'N/A';
            document.getElementById('farmingTechnology').textContent = selectedFarmer.cacaoTech || 'N/A';
            document.getElementById('postHarvestTech').textContent = selectedFarmer.postHarvest || 'N/A';

            // Show the modal
            document.getElementById('fullProfileModal').classList.remove('hidden');
        }

        function closeFullProfileModal() {
        document.getElementById('fullProfileModal').classList.add('hidden');
         }

        function saveProfileChanges() {
            // Add logic to save profile changes here
            alert('Changes have been saved.');
            closeFullProfileModal();
        }
    </script>


</body>
</html>
