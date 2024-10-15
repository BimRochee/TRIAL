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
    <meta name="recordpurchaseport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://fonts.cdnfonts.com/css/akira-expanded" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/akira-expanded');

        body {
            font-family: Popins, sans-serif;
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
            width: 706px;
            height: auto;
            border-radius: 4px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card3 {
            width: 390px;
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

        .large-card th,
        .large-card td {
            text-align: center;
            padding: 10px;
        }

        .large-card thead {
            color: black;
        }

        .indentify-frauds-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .indentify-frauds-header h5 {
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

        <div class="options" style="position: relative;">
            <nav>
                <ul style="list-style-type: none; padding: 0; margin-top: 70px;">
                    <li class="account-pages" style="margin-left: 35px; font-weight: bold;">Main Menu</li>
                    <li
                        style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;">
                        <a href="#" class="nav-link active-link" data-target="dashboard-content"
                            style="text-decoration: none; color: var(--black1); margin: 20px 0 15px 60px;"><i
                                class='bx bxs-dashboard' style='padding-right: 15px;'></i>
                            Dashboard</a>
                    </li>
                    <li
                        style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797;">
                        <a href="#" class="nav-link" data-target="indentify-fraud-content"
                            style="text-decoration: none; color: var(--black1); margin: 20px 0 15px 60px;"><i
                                class='bx bxs-bar-chart-alt-2' style='padding-right: 15px;'></i> Manage Roles</a>
                    </li>
                    <li
                        style="position: relative; display: block; width: 100%; display: flex; text-decoration: none; color: #979797; margin: 20px 0;">
                        <a href="#" class="nav-link" data-target="settings-content"
                            style="text-decoration: none; color: var(--black1); margin: 7px 0 0 60px;"><i
                                class='bx bxs-wrench' style='padding-right: 15px;'></i>Settings</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content">
        <div class="page-header" style="font-size: 13px;">Pages / <span class="link-name">Dashboard</span></div>
        <div id="dashboard-content" class="card">
            <div class="dashboard-card" style="background-color: #E98E15; border: none;">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#ffffff; margin-left: 15px;">Total User</h3>
                    <i class='bx bx-dots-vertical-rounded'
                        style='font-size: 20px; color: #fff; margin-right: 10px;'></i>
                </div>

                <div class="price" style="display:inline-flex; margin-left: 35%; font-size: 23px; color: #fff;">
                    <h1>310</h1>
                </div>
            </div>
            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Total Farmers</h3>
                    <i class='bx bx-dots-vertical-rounded'
                        style='font-size: 20px; color: #434343; margin-right: 10px;'></i>
                </div>

                <div class="price" style="display:inline-flex; margin-left: 35%; font-size: 23px; color: #434343;">
                    <h1>210</h1>
                </div>
            </div>
            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Total Consolidator</h3>
                    <i class='bx bx-dots-vertical-rounded'
                        style='font-size: 20px; color: #434343; margin-right: 10px;'></i>
                </div>

                <div class="price" style="display:inline-flex; margin-left: 40%; font-size: 23px; color: #434343;">
                    <h1>34</h1>
                </div>
            </div>
            <div class="dashboard-card">
                <div id="semi-header" style="justify-content: space-between; display: flex; align-items: center;">
                    <h3 style="color:#434343; margin-left: 15px;">Inactive User</h3>
                    <i class='bx bx-dots-vertical-rounded'
                        style='font-size: 20px; color: #434343; margin-right: 10px;'></i>
                </div>

                <div class="price" style="display:inline-flex; margin-left: 40%; font-size: 23px; color: #434343;">
                    <h1>15</h1>
                </div>
            </div>
            <div class="dashboard-card2">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="font-weight: bold; margin: 10px 0 0 10px;">
                        Recently Registered
                    </label>
                    <div class="buy-sell-buttons" style="display: flex; gap: 10px; border: none;">
                        <button class="filter-button"
                            style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 10px 0 0 0; display: flex; align-items: center; justify-content: center;">
                            <i class='bx bx-slider-alt'></i> Filter
                        </button>
                        <button
                            style=" width: 105px; border-radius: 3px; background-color: #E98E15; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; white-space: nowrap; margin: 10px 20px 0 0;">
                            <span
                                style="background-color: #fff; border-radius: 50%; color: #ff9800; font-weight: bold; height: 15px; width: 17px; display: inline;">
                                <i class='bx bx-plus'></i>
                            </span>
                            <span
                                style="font-weight: bold; font-size: 16px; margin-left: 5px; font-family: Helvetica; font-size: 13px;">
                                Add User
                            </span>
                        </button>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nicollete Vergara</th>
                            <th>Account Type</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jean Vlademer Montebon</td>
                            <td>Consolidator</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Bim Rochee Agliam</td>
                            <td>Consolidator</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Mc Luiz Laurence Saral</td>
                            <td>Consolidator</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Crist Mar De Asis</td>
                            <td>Farmer</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Loid Andrei Aringoy</td>
                            <td>Farmer</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Joshua Banuelos</td>
                            <td>Farmer</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Inalyn Kim Tamayo</td>
                            <td>Farmer</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>Aiah Arceta</td>
                            <td>Farmer</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                        <tr>
                            <td>John Michael Doe</td>
                            <td>Admin</td>
                            <td>01/01/2024</td>
                            <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                        </tr>
                    </tbody>
                </table>
                <div class="see-more" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    <h3 style="color: #E98E15; font-size: 13px; margin-left: 45%; cursor: pointer;">See More</h3>
                </div>
            </div>
            <div class="dashboard-card3">
                <div id="semi-header" style="justify-content: space-between; align-items: center;">
                    <h3 style="color:#434343; padding-left: 10px; font-size: 16px; font-weight: bold;">Online User</h3>
                    <table style="margin-top: 0;">
                        <tbody>
                            <tr>
                                <td>Nicollet Vergara</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                            <tr>
                                <td>Jean Vlademer Montebon</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                            <tr>
                                <td>Joy Bulawan</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                            <tr>
                                <td>Mc Luiz Laurence Saral</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                            <tr>
                                <td>David Blake</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                            <tr>
                                <td>Paul John Pantojan</td>
                                <td><i class='bx bx-dots-horizontal-rounded'></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- MANAGE ROLES - content --}}
        <div id="indentify-fraud-content" class="card hidden"
            style="padding: 20px; background: transparent; border-radius: 8px; position: sticky; ">
            <div style="max-width: 1047px; margin: auto;">
                <div style="font-family: popins,sans-serif; font-weight: bold; font-size: 36px; margin-bottom: 20px;">
                    Manage Permissions
                </div>
                <div style="margin-bottom: 20px;">
                    <a onclick="showCard('farmer', this)"
                        style="margin-right: 20px; cursor: pointer; font-weight: bold;">Farmer</a>
                    <a onclick="showCard('consolidator', this)"
                        style="margin-right: 20px; cursor: pointer; color: #959595;">Consolidator</a>
                    <a onclick="showCard('administrator', this)"
                        style="margin-right: 20px; cursor: pointer; color: #959595;">Administrator</a>
                </div>



                <div id="farmer-permission"
                    style="display: none; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); max-height: 100%;">
                    <h1 style="font-size: 26px; font-weight: bold;">Farmer Permission</h1>
                    <p>Give permission to specific fields, including manage-user, indentify-fraud and change
                        password.</p>
                    <div style="margin: 40px 0 0 30px;">
                        <h2 style="font-size: 18px; margin-top: 20px;">1. Profile
                            Management<span style="margin-left: 57%;">Allow</span><span
                                style="margin-left: 10%;">Deny</span></h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Update personal information (name, contact details,
                                update-Owninfo,
                                modfamdetails status).</label>
                            <label><input type="radio" name="manage-user" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-user" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Change password.</label>
                            <label><input type="radio" name="password" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="password" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Add farm details</label>
                            <label><input type="radio" name="farmdetails" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="farmdetails" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Modify farm details</label>
                            <label><input type="radio" name="modfamdetails" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="modfamdetails" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">2. Transaction Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Record harvesting and production data.</label>
                            <label><input type="radio" name="receivenotif" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="receivenotif" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Create delivery notes or gen-systemwide-reps.</label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">View indentify-fraud history.</label>
                            <label><input type="radio" name="transhistory" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="transhistory" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Generate reports (harvest yield, production).</label>
                            <label><input type="radio" name="reports" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="reports" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">3. Notification Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Receive notifications about market prices, weather alerts, and
                                system updates.</label>
                            <label><input type="radio" name="receivenotif" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="receivenotif" style="margin-right: 6vh;"></label>
                        </div>

                        <div class="save" style="display: flex; gap: 10px; font-size: 13px; margin: 5% 0 0 70%;">
                            <h3 style="margin: 0; color: #959595;">Set to default</h3>
                            <h3 style="margin: 0;  margin-left: 5vh; color: #E98E15;">Save changes</h3>
                        </div>
                    </div>
                </div>



                <div id="consolidator-permission"
                    style="display: none; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <h1 style="font-size: 26px; font-weight: bold;">Consolidator Permission</h1>
                    <p>Give permission to specific fields, including manage-user, indentify-fraud and change
                        password.</p>
                    <div style="margin: 40px 0 0 30px;">
                        <h2 style="font-size: 18px; margin-top: 20px;">1. Profile
                            Management<span style="margin-left: 57%;">Allow</span><span
                                style="margin-left: 10%;">Deny</span></h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Update information (name, update-Owninfo, contact
                                details).</label>
                            <label><input type="radio" name="manage-user" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-user" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">2. Farmer Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Onboard new farmers.</label>
                            <label><input type="radio" name="onboard" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="onboard" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Manage farmer relationships</label>
                            <label><input type="radio" name="conso-standard" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="conso-standard" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Verify farmer information.</label>
                            <label><input type="radio" name="manage-cons-data" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-cons-data" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">3. Transaction Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Record purchases of cacao beans from farmers.</label>
                            <label><input type="radio" name="recordpurchase" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="recordpurchase" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Generate purchase orders and gen-systemwide-reps.</label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Track inventory and quality.</label>
                            <label><input type="radio" name="gen-systemwide-rep"
                                    style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="gen-systemwide-rep"
                                    style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Create delivery notes for sending cacao to processors.</label>
                            <label><input type="radio" name="delivery-notes" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="delivery-notes" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">3. Reporting</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Generate reports on cacao purchases, inventory levels, and
                                quality.</label>
                            <label><input type="radio" name="conso-report" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="conso-report" style="margin-right: 6vh;"></label>
                        </div>
                        <div class="save" style="display: flex; gap: 10px; font-size: 13px; margin: 5% 0 0 70%;">
                            <h3 style="margin: 0; color: #959595;">Set to default</h3>
                            <h3 style="margin: 0;  margin-left: 5vh; color: #E98E15;">Save changes</h3>
                        </div>
                    </div>
                </div>

                <div id="administrator-permission"
                    style="display: none; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <h1 style="font-size: 26px; font-weight: bold;">Administrator Permission</h1>
                    <p>Give permission to specific fields, including manage-user, indentify-fraud and change
                        password.</p>
                    <div style="margin: 40px 0 0 30px;">
                        <h2 style="font-size: 18px; margin-top: 20px;">1. Profile
                            Management<span style="margin-left: 57%;">Allow</span><span
                                style="margin-left: 10%;">Deny</span></h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Manage user accounts (farmers, consolidators).</label>
                            <label><input type="radio" name="manage-user" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-user" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Update profile information</label>
                            <label><input type="radio" name="update-Owninfo" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="update-Owninfo" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">2. Farmer Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Approve or reject farmer registrations.</label>
                            <label><input type="radio" name="approve-deny" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="approve-deny" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Monitor farmer compliance with standards.</label>
                            <label><input type="radio" name="farmer-compl" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="farmer-compl" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Manage farmer data.</label>
                            <label><input type="radio" name="manage-farmer-data"
                                    style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-farmer-data"
                                    style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">3. Consolidator Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Approve or reject consolidator registrations.</label>
                            <label><input type="radio" name="conso-reg" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="conso-reg" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Monitor consolidator compliance with standards.</label>
                            <label><input type="radio" name="conso-standard" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="conso-standard" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Manage consolidator data.</label>
                            <label><input type="radio" name="manage-cons-data" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="manage-cons-data" style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">4. Transaction Management</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Monitor overall system transactions.</label>
                            <label><input type="radio" name="all-sys-trans" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="all-sys-trans" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Identify potential discrepancies or fraud.</label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="indentify-fraud" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Generate system-wide reports.</label>
                            <label><input type="radio" name="gen-systemwide-rep"
                                    style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="gen-systemwide-rep"
                                    style="margin-right: 6vh;"></label>
                        </div>
                        <h2 style="font-size: 18px; margin-top: 20px;">5. System Configuration</h2>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Update announcement</label>
                            <label><input type="radio" name="update-announcement"
                                    style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="update-announcement"
                                    style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Update cacao price</label>
                            <label><input type="radio" name="update-cacaoPrice"
                                    style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="update-cacaoPrice" style="margin-right: 6vh;"></label>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <label style="flex-grow: 1;">Manage system settings and parameters.</label>
                            <label><input type="radio" name="sys-settings" style="margin-right: 17vh;"></label>
                            <label><input type="radio" name="sys-settings" style="margin-right: 6vh;"></label>
                        </div>
                        <div class="save" style="display: flex; gap: 10px; font-size: 13px; margin: 5% 0 0 70%;">
                            <h3 style="margin: 0; color: #959595;">Set to default</h3>
                            <h3 style="margin: 0;  margin-left: 5vh; color: #E98E15;">Save changes</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="manage-user-content" class="card hidden"
            style="width: 1088px; height: auto; margin: 0 auto; padding: 20px; position: relative; top: 50px; left: 0; opacity: 1;">
            <h2
                style="font-family: Poppins, sans-serif; font-size: 28px; font-weight: 700; line-height: 42px; text-align: left; color: #545454; margin: 0;">
                Profile Information
            </h2>
            <div class="large-card"
                style="width: 100%; height: auto; border-radius: 8px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); color: #959595;">
                <table style="width: 100%; border-collapse: collapse; margin: 0 auto; padding: 0;">
                    <thead>
                        <tr>
                            <th style="padding: 10px; text-align: center; color: #4e4e4e; background-color: #f5f5f5;">
                            </th>
                            <th style="padding: 10px; text-align: center; color: #4e4e4e; background-color: #f5f5f5;">
                            </th>
                            <th style="padding: 10px; text-align: center; color: #4e4e4e; background-color: #f5f5f5;">
                            </th>
                            <th style="padding: 10px; text-align: center; color: #4e4e4e; background-color: #f5f5f5;">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                            <td style="padding: 10px; text-align: center; color: #4e4e4e;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>




        <div id="settings-content" class="card hidden">
            <h2>Settings</h2>
            <p>Settings Content</p>
        </div>
        <div id="faqs-content" class="card hidden">
            <h2>FAQs</h2>
            <p>FAQs Content</p>
        </div>
    </div>

    {{-- Js For Active Options --}}
    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active-link'));
                this.classList.add('active-link');
                const target = this.getAttribute('data-target');
                const linkText = this.textContent.trim();
                document.querySelectorAll('.content .card').forEach(card => card.classList.add('hidden'));
                document.getElementById(target).classList.remove('hidden');
                document.querySelector('.page-header .link-name').textContent = linkText;
            });
        });

        function showCard(cardId, element) {
            // Hide all permission cards
            const permissionCards = document.querySelectorAll(
                '#farmer-permission, #consolidator-permission, #administrator-permission');
            permissionCards.forEach(card => {
                card.style.display = 'none';
            });
            document.getElementById(cardId + '-permission').style.display = 'block';

            // Remove active class from all links
            document.querySelectorAll('a').forEach(link => {
                link.style.color = '#959595';
                link.style.fontWeight = 'normal';
            });

            // Add active class to the clicked link
            element.style.color = '#E98E15';
            element.style.fontWeight = 'bold';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Set Farmer as default active link
            const defaultLink = document.querySelector('[onclick^="showCard"][onclick*="farmer"]');
            showCard('farmer', defaultLink);

            // Add click event listeners to the links
            document.querySelectorAll('[onclick^="showCard"]').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    // Get the card ID from the onclick attribute
                    const cardId = this.getAttribute('onclick').split("'")[1];
                    showCard(cardId, this);
                });
            });
        });

        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.addEventListener('click', function() {
                var target = this.getAttribute('data-target');
                document.querySelectorAll('.card').forEach(function(card) {
                    card.classList.add('hidden');
                });
                document.getElementById(target).classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
