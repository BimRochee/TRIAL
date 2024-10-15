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


    <style>
        @import url('https://fonts.cdnfonts.com/css/akira-expanded');

        body {
            background-color: F8F9FA;

        }

        li:hover a {
            color: #E98E15 !important;
        }

        .active-link {
            color: #E98E15 !important;
        }

        .card {
            padding: 20px;
            margin: 20px;
            background-color: F8F9FA;
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
            height: auto;
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

        .large-card th,
        .large-card td {
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

        .hidden {
            display: none;
        }

        /* Modal overlay */
        .modal {
            display: none;
            position: fixed;
            z-index: 200;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        /* Modal content */
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Triple dot hover and click effect */
        .bx-dots-horizontal-rounded {
            cursor: pointer;
            position: relative;
            color: #959595;
            transition: color 0.3s ease;
        }

        /* Hover effect - changes color and background */
        .bx-dots-horizontal-rounded:hover {
            color: #E98E15;
            /* Change color on hover */
        }

        /* Active state effect when clicked */
        .bx-dots-horizontal-rounded:active {
            color: #E98E15;
            /* Keep the color change on click */
        }

        /* Optional: add an arrow or icon when hovered */
        .bx-dots-horizontal-rounded::after {
            content: '▼';
            /* Add a small arrow below the triple dots */
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            color: transparent;
            font-size: 12px;
            transition: color 0.3s ease;
        }

        /* Show the arrow on hover */
        .bx-dots-horizontal-rounded:hover::after {
            color: #E98E15;
            /* Arrow color on hover */
        }
    </style>
</head>

<body
    style="margin: 0; padding: 0; box-sizing: border-box; text-decoration: none; border: none; outline: none; scroll-behavior: smooth; font-family: 'Poppins', sans-serif; background-color: #F8F9FA;">
    <header
        style="width: 100%; height: 83px; display: flex; align-items: center; justify-content: flex-end; gap: 16px; border: 2px solid #ccc; position: fixed; top: 0; z-index: 50; background-color: #fff;">
        <i class='bx bxs-bell' style="font-size:25px; color: #A6A6A6;"></i>
        <i class='bx bxs-grid' style="font-size: 25px; color: #A6A6A6;"></i>
        <img src="/icons/profile-pic.png" alt="Profile" style="height: 42px; width: 42px; margin-right:4%;">
    </header>

    <div
        style="width: 264px; height: 100vh; left: 0; border: 2px solid #ccc; position: fixed; top: 0; z-index: 100; font-family: Helvetica, sans-serif; background-color: #fff;">
        <h1
            style="font-size: 26px; font-family: 'Akira Expanded', sans-serif; font-weight: bold; text-align: center; margin: 28.5px 0 25px 0;">
            TRACO
        </h1>

        <div class=""><span
                style="position: absolute; display: block; width: 100%; height: 2px; background-color: #ccc;"></span>
        </div>

        @include('include.admin-sidebar')
    </div>

    <div class="content">
        <div class="page-header" style="font-size: 13px;">Pages / <span class="link-name">Dashboard</span></div>
        <div id="dashboard-content" class="card">
            <div class="dashboard-card" style="background-color: #E98E15; border: none;">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#ffffff; margin-left: 15px;">Cacao Price Today</h3>
                    <div style="position: relative; display: inline-block;">
                        <i class='bx bx-dots-vertical-rounded' id="more-cacao-btn"
                            style='font-size: 20px; color: #fff; margin-right: 10px; cursor: pointer;'></i>
                        <div id="cacaoPriceBox" class="menu-popup"
                            style="position: absolute; top: 70%; right: -185%; z-index: 900; padding: 10px 0; margin-top: 9px; background-color: #fff; border: 1px solid #ccd8e0; border-radius: 4px; box-shadow: 1px 1px 3px rgba(0,0,0,0.25); opacity: 0; transform: translate(0, 15px) scale(.95); transition: transform 0.1s ease-out, opacity 0.1s ease-out; pointer-events: none;">
                            <div
                                style="position: absolute; top: -10px; left: 12px; width: 18px; height: 10px; overflow: hidden;">
                                <div
                                    style="border-bottom: 10px solid #c1d0da; border-left: 10px solid transparent; border-right: 10px solid transparent; position: absolute; display: inline-block; margin-left: -1px; font-size: 0; line-height: 1;">
                                </div>
                                <div
                                    style="top: 1px; left: 1px; border-left: 9px solid transparent; border-right: 9px solid transparent; border-bottom: 9px solid #fff; position: absolute; display: inline-block; font-size: 0; line-height: 1;">
                                </div>
                            </div>
                            <ul style="margin: 0; list-style: none; padding: 0;" tabindex="-1" role="menu"
                                aria-labelledby="more-cacao-btn" aria-hidden="true">
                                <li style="display: block;" role="presentation">
                                    <button type="button"
                                        style="min-width: 100%; color: #66757f; cursor: pointer; display: block; font-size: 13px; line-height: 18px; padding: 5px 20px; background: none; border: 0; white-space: nowrap; text-align: left;"
                                        role="menuitem" onclick="openModal()">Edit Price</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="price" style="display:inline-flex; margin-left: 5.8vh; font-size: 23px; color: #fff;">
                    <h1 class="peso-sign">₱</h1>
                    <h1>{{ $cacaoPrice }}</h1>
                </div>
            </div>

            {{-- Edit Price modal --}}
            <div id="editPriceModal"
                style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
                <div
                    style="background-color: #fefefe; margin: 15% auto; padding: 20px 30px; border: 1px solid #888; max-width: 251px; border-radius: 10px;">
                    <span id="closeCacaoModal"
                        style="float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
                    <h2 style="color: #E98E15; font-family: Poppins;">Edit Price</h2>
                    <form action="{{ route('update.cacao.price') }}" method="POST">
                        @csrf
                        <input type="text" id="new-cacao-price" name="price" placeholder="Enter price here"
                            style="width: 88%; padding: 8px; border: 2px solid #E98E15; border-radius: 5px;"
                            onfocus="this.style.borderColor='#E98E15';">
                        <button type="submit"
                            style="position: static; margin-top: 16px; margin-left: 75%; padding: 10px 20px; background-color: transparent; color: #E98E15; border: none; cursor: pointer;">
                            Save
                        </button>
                    </form>

                    @if (session('status'))
                        <div style="color: green;">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- TotalPrice_Transacted --}}
            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 10px;">Total Farmers</h3>
                </div>
                <div id="Numfarmers-display" class="numFarmer"
                    style="display:inline-flex; font-size: 23px; color: #434343; padding-left: 20%;">
                    <h1 id="total-farmers" style="margin-left: 2rem;">{{ $numFarmers }}</h1>
                </div>
            </div>
            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Total Consolidator</h3>
                </div>
                <div class="price" style="display:inline-flex; margin-left: 16vh; font-size: 23px; color: #434343;">
                    <h1>{{ $numConso }}</h1>
                </div>
            </div>

            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Total Users</h3>
                </div>
                <div class="price" style="display:inline-flex; margin-left: 5.5vh; font-size: 23px; color: #434343;">
                    <h1 id="total-members" style="margin-left: 50px;">{{ $total }}</h1>
                </div>
            </div>


            {{-- Announcement Section --}}
            <div class="dashboard-card2">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="margin-left: 15px; color: #434343;">Announcement</h3>
                    <i class='bx bx-dots-vertical-rounded'
                        style='font-size: 20px; margin-right: 10px; color: #E98E15; cursor: pointer;'
                        id="more-btn"></i>
                </div>
                <div class="description" style="padding: 0 10px; justify-content: center;">
                    <p style="font-size: 12px;">{{ $announcement }}</p>
                </div>
            </div>

            {{-- Update Announcement Modal --}}
            <div id="updateAnnouncementModal" class="modal" style="display: none;">
                <div class="modal-content"
                    style="background: #fff; padding: 20px; border-radius: 8px; width: 623px; height: 230px; margin: 100px auto; position: relative;">
                    <span class="close" id="closeModal"
                        style="position: absolute; top: 10px; right: 20px; font-size: 24px; cursor: pointer;">&times;</span>
                    <h3 style="color: #E98E15;">Announcement</h3>
                    <form action="{{ route('admin.announcement.update') }}" method="POST">
                        @csrf
                        <div>
                            <textarea name="description" id="description" rows="4"
                                style="width: 98%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: Poppins; font-size: 12px; color: #2a2a2a;"
                                required>{{ $announcement }}</textarea>
                        </div>
                        <div style="margin-top: 20px; text-align: right;">
                            <button type="submit"
                                style="background: #E98E15; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dashboard-card2">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Barbco VMG's</h3>
                    <h4
                        style="font-size: 12px; color: #E98E15; font-weight: normal; align-items: center; margin-right: 10px;">
                        Mission <i class='bx bx-caret-down'></i></h4>
                </div>
            </div>
            <div class="large-card">
                <div class="transactions-header">
                    <div>
                        <label style="font-weight: bold;">Transactions <span
                                style="color: #959595; font-size: 13px;">(</span><span
                                style="color: #E98E15; font-size: 13px;">{{ count($transactionsData) }}</span><span
                                style="color: #959595; font-size: 13px;">)</span>
                            <span style="color: #959595; font-size: 13px;">entries</span>
                        </label>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Batch No</th>
                            <th>Clone</th>
                            <th>Price per kilo</th>
                            <th>Total Weight</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $latestTransactions = array_slice($transactionsData, 0, 5);
                        @endphp
                        @foreach ($latestTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction['createdAt'] }}</td>
                                <td>{{ $transaction['batch_num'] }}</td>
                                <td>{{ $transaction['cacaoCloneName'] }}</td>
                                <td>P{{ number_format($transaction['pricepk'], 2) }}</td>
                                <td>{{ $transaction['weight'] }} kg</td>
                                <td>P{{ number_format($transaction['totalprice'], 2) }}</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h6 style="font-size: 12px; color: #E98E15; font-weight: bold; margin-left: 65vh; cursor: pointer;" a
                    href="#" class="show-more-link" data-target="transaction-content">
                    Show More
                </h6>
            </div>
        </div>

        <div id="manage-request-content" class="card hidden" style="padding: 20px;">
            @php
                // Fetch pending consolidator requests
                $pendingRequests = app(
                    App\Http\Controllers\CacaoPriceController::class,
                )->fetchPendingConsolidatorRequests();
            @endphp

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

            <h2
                style="font-family: Poppins, sans-serif; font-size: 28px; font-weight: 700; line-height: 42px; text-align: left; margin-bottom: 20px;">
                Manage Request <label style="font-weight: bold;">
                    <span style="color: #959595; font-size: 13px;">(</span>
                    <span style="color: #E98E15; font-size: 13px;">{{ count($pendingRequests) }}</span>
                    <span style="color: #959595; font-size: 13px;">)</span>
                    <span style="color: #959595; font-size: 13px;">pending request</span>
                </label>
            </h2>

            <div
                style="box-shadow: 0px 0px 5px 0px #0000001A; border-radius: 10px; background-color: white; padding: 20px;">
                @if (!empty($pendingRequests))
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th
                                    style="padding: 10px; text-align: center; color: #4e4e4e; background-color: white;">
                                    Name</th>
                                <th
                                    style="padding: 10px; text-align: center; color: #4e4e4e; background-color: white;">
                                    Address</th>
                                <th
                                    style="padding: 10px; text-align: center; color: #4e4e4e; background-color: white;">
                                    Status</th>
                                <th
                                    style="padding: 10px; text-align: center; color: #4e4e4e; background-color: white;">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingRequests as $request)
                                <tr>
                                    <td
                                        style="padding: 10px; text-align: center; color: #4e4e4e; text-transform: capitalize;">
                                        {{ $request['first_name'] }} {{ $request['last_name'] }}
                                    </td>
                                    <td style="padding: 10px; text-align: center; color: #4e4e4e;">
                                        {{ $request['location'] }}
                                    </td>
                                    <td
                                        style="padding: 10px; text-align: center; color: #E98E15; background-color: #FFFA8D; border-radius: 50px; line-height: .1;
                                        ">
                                        {{ $request['status'] }}
                                    </td>
                                    <td style="padding: 10px; text-align: center; color: #4e4e4e; cursor: pointer;">...
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No pending requests.</p>
                @endif
                <!-- The Modal -->
                <div id="myModal"
                    style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.5);">
                    <div
                        style="background-color: #fff; margin: 15% auto; padding: 20px; border-radius: 5px; width: 30%; text-align: center;">
                        <span onclick="closeModal()"
                            style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
                        <p style="font-family: Poppins, sans-serif; color: #4e4e4e;">Details about this transaction...
                        </p>
                    </div>
                </div>

            </div>
        </div>

    {{-- Js For Active Options --}}
    <script>
        // Function to toggle sub-menu visibility
        function toggleSubMenu(event) {
            event.preventDefault();
            const subMenu = event.target.nextElementSibling;
            const subMenuVisible = subMenu.style.display === 'block';

                // Debugging: Log the subMenu element and its visibility state
                console.log('SubMenu:', subMenu);
                console.log('SubMenu Visible:', subMenuVisible);

                // Hide all submenus
                document.querySelectorAll('.sub-menu').forEach(menu => menu.style.display = 'none');

                // Reset margins of all items
                document.querySelectorAll('li').forEach(item => {
                    item.style.marginTop = '';
                });

                if (!subMenuVisible) {
                    subMenu.style.display = 'block';
                }
            }

            // function redirectToRoute() {
            //     const target = event.target.getAttribute('data-target');
            //     window.location.href = "{{ route('farmers.list') }}";
            // }
            document.addEventListener('DOMContentLoaded', function() {
                // Toggle the Cacao Price menu
                var cacaoBtn = document.getElementById('more-cacao-btn');
                var cacaoMenu = document.getElementById('cacaoPriceBox');
                var cacaoVisible = false;

                function showCacaoMenu(e) {
                    e.preventDefault();
                    if (!cacaoVisible) {
                        cacaoVisible = true;
                        cacaoMenu.style.opacity = "1";
                        cacaoMenu.style.transform = "translate(0, 0) scale(1)";
                        cacaoMenu.style.pointerEvents = "auto";
                        document.addEventListener('mousedown', hideCacaoMenu, false);
                    }
                }

                function hideCacaoMenu(e) {
                    if (!cacaoMenu.contains(e.target) && e.target !== cacaoBtn) {
                        cacaoVisible = false;
                        cacaoMenu.style.opacity = "0";
                        cacaoMenu.style.transform = "translate(0, 15px) scale(.95)";
                        cacaoMenu.style.pointerEvents = "none";
                        document.removeEventListener('mousedown', hideCacaoMenu);
                    }
                }

                cacaoBtn.addEventListener('click', showCacaoMenu, false);

                // Modal Handling
                var editCacaoPriceBtn = document.querySelector(
                    '#cacaoPriceBox button[role="menuitem"]'); // Adjusted to select the button inside the menu
                var cacaoModal = document.getElementById('editPriceModal');
                var closeCacaoModalBtn = document.getElementById('closeCacaoModal');

                function showCacaoModal() {
                    cacaoModal.style.display = "block";
                }

                function hideCacaoModal() {
                    cacaoModal.style.display = "none";
                }

                editCacaoPriceBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevents the menu from closing immediately
                    showCacaoModal();
                    hideCacaoMenu(); // Hide menu after clicking
                });

                closeCacaoModalBtn.addEventListener('click', hideCacaoModal);

                // Optional: Close the modal if clicking outside of it
                window.addEventListener('click', function(event) {
                    if (event.target === cacaoModal) {
                        hideCacaoModal();
                    }
                });
            });

            var btn = document.getElementById('more-btn');
            var menu = document.getElementById('more-menu');
            var editBtn = document.getElementById('edit-announcement');
            var modal = document.getElementById('modal');
            var overlay = document.getElementById('modal-overlay');
            var closeModal = document.getElementById('close-modal');
            var visible = false;

            function showMenu(e) {
                e.preventDefault();
                if (!visible) {
                    visible = true;
                    menu.style.opacity = "1";
                    menu.style.transform = "translate(0, 0) scale(1)";
                    menu.style.pointerEvents = "auto";
                    document.addEventListener('mousedown', hideMenu, false);
                }
            }

            function hideMenu(e) {
                if (!menu.contains(e.target) && e.target !== btn) {
                    visible = false;
                    menu.style.opacity = "0";
                    menu.style.transform = "translate(0, 15px) scale(.95)";
                    menu.style.pointerEvents = "none";
                    document.removeEventListener('mousedown', hideMenu);
                }
            }

            function showModal() {
                modal.style.display = "block";
                overlay.style.display = "block";
            }

            function hideModal() {
                modal.style.display = "none";
                overlay.style.display = "none";
            }

            btn.addEventListener('click', showMenu, false);
            editBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevents the menu from closing immediately
                showModal();
                hideMenu();
            });
            closeModal.addEventListener('click', hideModal);
            overlay.addEventListener('click', hideModal);

            // Popup message and close modal after save
            document.getElementById('save-changes').addEventListener('click', function() {
                var popup = document.getElementById('popup-message');
                popup.style.display = 'block';

                // Hide the popup and close the modal after 2 seconds
                setTimeout(function() {
                    popup.style.display = 'none';
                    hideModal();
                }, 800);
            });

            //cacao price edit
            document.addEventListener('DOMContentLoaded', function() {
                // Cacao Price Menu
                var cacaoBtn = document.getElementById('more-cacao-btn');
                var cacaoMenu = document.getElementById('cacaoPriceBox');
                var cacaoVisible = false;

                function showCacaoMenu(e) {
                    e.preventDefault();
                    if (!cacaoVisible) {
                        cacaoVisible = true;
                        cacaoMenu.style.opacity = "1";
                        cacaoMenu.style.transform = "translate(0, 0) scale(1)";
                        cacaoMenu.style.pointerEvents = "auto";
                        document.addEventListener('mousedown', hideCacaoMenu, false);
                    }
                }

                function hideCacaoMenu(e) {
                    if (!cacaoMenu.contains(e.target) && e.target !== cacaoBtn) {
                        cacaoVisible = false;
                        cacaoMenu.style.opacity = "0";
                        cacaoMenu.style.transform = "translate(0, 15px) scale(.95)";
                        cacaoMenu.style.pointerEvents = "none";
                        document.removeEventListener('mousedown', hideCacaoMenu);
                    }
                }

                cacaoBtn.addEventListener('click', showCacaoMenu, false);

                // Modal Handling
                var editCacaoPriceBtn = document.querySelector(
                    '#cacaoPriceBox button[role="menuitem"]'); // Adjusted to select the button inside the menu
                var cacaoModal = document.getElementById('editPriceModal');
                var closeCacaoModalBtn = document.getElementById('closeCacaoModal');

                function showCacaoModal() {
                    cacaoModal.style.display = "block";
                }

                function hideCacaoModal() {
                    cacaoModal.style.display = "none";
                }

                editCacaoPriceBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevents the menu from closing immediately
                    showCacaoModal();
                    hideCacaoMenu(); // Hide menu after clicking
                });

                closeCacaoModalBtn.addEventListener('click', hideCacaoModal);

                // Optional: Close the modal if clicking outside of it
                window.addEventListener('click', function(event) {
                    if (event.target === cacaoModal) {
                        hideCacaoModal();
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add event listeners to sidebar links
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove(
                            'active-link'));
                        this.classList.add('active-link');
                        const target = this.getAttribute('data-target');
                        const linkText = this.textContent.trim();
                        document.querySelectorAll('.content .card').forEach(card => card.classList.add(
                            'hidden'));
                        if (target) {
                            document.getElementById(target).classList.remove('hidden');
                            document.querySelector('.page-header .link-name').textContent = linkText;
                        } else {
                            // Handle external route
                            window.location.href = this.getAttribute('href');
                        }
                    });
                });

            });

            function showContent(targetId) {
                document.querySelectorAll('.content .card').forEach(card => card.classList.add('hidden'));
                document.getElementById(targetId).classList.remove('hidden');
            }

            //edit announcement modal
            document.getElementById("more-btn").onclick = function() {
                document.getElementById("updateAnnouncementModal").style.display = "block";
            }

            document.getElementById("closeModal").onclick = function() {
                document.getElementById("updateAnnouncementModal").style.display = "none";
            }

            // Close the modal if the user clicks outside of the modal content
            window.onclick = function(event) {
                if (event.target == document.getElementById("updateAnnouncementModal")) {
                    document.getElementById("updateAnnouncementModal").style.display = "none";
                }
            }


            //Show More in dashboard
            document.addEventListener('DOMContentLoaded', function() {
                // Add event listener to "Show More" link with a unique class
                document.querySelector('.show-more-link').addEventListener('click', function(event) {
                    event.preventDefault();

                    // Trigger a click on the Transaction sidebar link
                    const transactionSidebarLink = document.querySelector(
                        'a[data-target="transaction-content"]:not(.show-more-link)');
                    if (transactionSidebarLink) {
                        transactionSidebarLink.click(); // Simulate the click
                    }
                });
            });
        </script>

</body>

</html>
