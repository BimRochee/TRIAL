<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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

            padding-top: 103px;

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
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal h2 {
            color: #f39c12;
            margin: 0;
            font-size: 24px;
        }

        .modal p {
            margin: 5px 0 20px;
            color: #888;
        }

        .modal label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .modal input,
        .modal select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .modal input[type="text"],
        .modal input[type="tel"],
        .modal input[type="date"] {
            width: calc(100% - 20px);
        }

        .modal .form-group {
            display: flex;
            justify-content: space-between;
        }

        .modal .form-group input,
        .modal .form-group select {
            width: calc(48% - 10px);
        }

        .modal .next-step {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        #transaction-content {
            padding: 20px;
            background-color: #F8F9FA;
            border-radius: 8px;
        }

        #transaction-content .buy-sell-buttons {
            display: flex;
            gap: 10px;
            border: none;
        }

        #transaction-content .filter-button {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            background-color: #fff;
            color: #BABABA;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #transaction-content .sort-button {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            background-color: #fff;
            color: #BABABA;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #transaction-content .create-batch-button {
            width: 148px;
            height: 34px;
            padding: 6px 16px;
            border: none;
            border-radius: 2px 0px 0px 0px;
            background-color: #E98E15;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            white-space: nowrap;
        }

        .large-card {
            width: 1120px;
            height: 555px;
            border-radius: 8px;
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #959595;
            margin-left: 70px;
            overflow-y: auto;
        }

        .large-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .large-card th,
        .large-card td {
            text-align: center;
            padding: 7px;
            background-color: transparent;
        }

        .large-card thead {
            color: black;
        }

        .large-card tbody {
            border-bottom: 1px solid black;
        }

        .large-card tr:last-child td {
            border-bottom: none;
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
            margin-right: 60px;
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
            z-index: 1;
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


        .bx-dots-horizontal-rounded {
            cursor: pointer;
            position: relative;
            color: #959595;
            transition: color 0.3s ease;
        }


        .bx-dots-horizontal-rounded:hover {
            color: #E98E15;

        }


        .bx-dots-horizontal-rounded:active {
            color: #E98E15;

        }


        .bx-dots-horizontal-rounded::after {
            content: '▼';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            color: transparent;
            font-size: 12px;
            transition: color 0.3s ease;
        }

        .bx-dots-horizontal-rounded:hover::after {
            color: #E98E15;
        }

        /* Modal background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* Modal content */

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px 30px;
            border-radius: 10px;
            width: 485px;
            height: auto;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            font-family: 'Poppins', sans-serif;
            color: #333;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }


        .modal-full-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 5px;
            margin-top: 30px;
            margin-left: 30px;
            font-weight: 600;
        }

        .modal-full-row .modal-row {
            margin-bottom: 10px;
            font-size: 14px;
        }


        .modal-sections-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            margin-left: 30px;
            font-weight: 600;
        }

        .modal-section {
            width: 48%;
        }

        .modal-row {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .modal-section2 {
            width: 48%;
            margin-left: 100px;
        }


        .modal-row div strong {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #959595;
            font-size: 14px;
        }


        .modal-total-price {
            text-align: center;
            margin-top: 20px;
        }

        #modalTotalPrice {
            color: #F7941D;
            font-weight: bold;
            font-size: 26px;
        }

        #soldModalTotalPrice {
            color: #F7941D;
            font-weight: bold;
            font-size: 26px;
        }


        .modal-remarks {
            margin-top: 25px;
            font-size: 14px;
            color: #555;
            width: 100%;
            text-align: justify;
        }

        .modal-remarks strong {
            color: #959595;
            font-weight: 600;
            font-size: 14px;
        }

        .modal-remarks p {
            color: black;
        }

        .modal-header {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 22px;
            margin-top: 10px;
        }

        .batch-modal-overlay {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #createBatchModal .batch-modal {
            width: 785px;
            height: 529px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }


        #stepModal1 .batch-modal {
            width: 364px;
            height: 572px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }


        #stepModal2 .batch-modal,
        #stepModal3 .batch-modal {
            width: 766px;
            height: 540px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .batch-modal {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .batch-modal-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 5px;
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 158px;
        }

        .batch-modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }

        .cancel-btn {
            background-color: #fff;
            color: #959595;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .confirm-btn {
            width: auto;
            height: 33px;
            background-color: #E98E15;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: bold;
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
        }

        .step-modal {
            width: 364px;
            height: 572px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .step-modal-large {
            width: 766px;
            height: 540px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Additional modal variations */
        .step-modal,
        .step-modal-large {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .modal-step-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            border-radius: 5px;
            padding: 5px 10px;
            width: auto;
            height: auto;
            margin: 20px 25px 0 0;
        }

        .modal-step-indicator p {
            margin: 0;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            white-space: nowrap;
        }

        .step-text {
            font-weight: 600;
            color: #878787;
            margin-right: 3px;
        }

        .step-number {
            font-weight: bold;
            color: #E98E15;
            margin-right: 3px;
        }

        .of-step {
            font-weight: bold;
            color: #878787;
        }




        .modal-done-btn {
            background-color: #E98E15;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }



        .next-step-btn {
            width: 88px;
            height: 24px;
            background-color: #E98E15;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .next-step-btn-2 {
            width: 173px;
            height: 39px;
            background-color: #E98E15;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
        }


        .next-step-btn-2::after {
            content: '\2192';
            font-size: 14px;
            display: inline-block;
        }




        .modal-done-btn {
            width: 173px;
            height: 39px;
            background-color: #E98E15;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .cancel-btn {
            width: auto;
            height: 33px;
            background-color: transparent;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #ddd;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
        }


        .small-buttons {
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 10px 15px 20px 0;
        }

        .small-buttons2 {
            display: flex;
            align-items: center;
            gap: 10px;

        }

        .batch-modal-header {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: bold;
            text-align: left;
            color: #E98E15;
            margin: 20px 0 0 30px;
        }

        .batch-modal-semi-header {
            color: #A2A2A2;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            margin: 0 0 0 30px;
        }


        .active-button {
            background-color: #ff9800 !important;
            color: #fff !important;
        }

        .batch-table {
            width: 666px;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            margin: 0 auto;
        }

        .batch-table .table-header {
            font-size: 8px;
            color: #878787;
            font-weight: regular;
            display: block;
            margin-bottom: 5px;
            text-align: center;
        }

        .batch-table tbody td {
            font-size: 10px;
            color: #666666;
            font-weight: 600;
            padding: 0px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }

        .batch-table td {
            height: 50px;
        }

        .batch-table td:first-child,
        .batch-table td:nth-child(2) {
            width: 25%;
        }

        .batch-table td:nth-child(3),
        .batch-table td:nth-child(4) {
            width: 20%;
        }

        .batch-table td:nth-child(5) {
            width: 10%;
        }

        .batch-table td .custom-checkbox {
            display: block;
            margin: auto;
            cursor: pointer;
            accent-color: #E98E15;
        }

        .custom-checkbox:checked {
            background-color: #E98E15;
            box-shadow: 0px 0px 3px #E98E15;
        }


        .batch-table tbody tr {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .batch-table tbody td {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        .batch-table tbody tr:first-child {
            background-color: #F7F7F7;
        }


        .batch-table tbody tr:first-child td {
            border-bottom: none;
        }

        .table-header,
        .table-header span {
            font-family: 'Poppins', sans-serif
        }

        .batch-label {
            font-family: 'Poppins', sans-serif;
            font-weight: regular;
            font-size: 10px;
            color: #959595;
            margin-bottom: 0;
            display: block;
        }

        .batch-info {
            margin-left: 25px;
        }

        .batch-item {
            margin-bottom: 15px;
        }

        .batch-data {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #666666;
            margin: 0;
        }

        .input-weight-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 5px 0;
        }

        .input-weight-label {
            align-self: flex-start;
            font-family: 'Poppins', sans-serif;
            font-weight: regular;
            font-size: 10px;
            color: #959595;
            margin-bottom: 5px;
            margin-left: 83px;
        }

        .input-weight-box {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #666666;
            width: 158px;
            height: 40px;
            padding: 0 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .selected-section {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 5px;
        }

        .selected-label {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #E98E15;
            margin-bottom: 5px;
        }

        .selected-box {
            width: 294px;
            height: 45px;
            background-color: #F4F4F4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
        }

        .reference-info {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .reference-label {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #959595;
        }

        .reference-no {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #666666;
        }

        .weight {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #666666;
        }

        .weight-value {
            color: #E98E15;
        }

        .batch-modal-content {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            flex-direction: column;
        }

        .batch-modal-content1 {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            flex-direction: column;
            margin-left: 30px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-column {
            width: 48%;
        }

        .input-label {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #666666;
            margin-bottom: 11px;
            display: block;
        }

        .input-field {
            width: 100%;
            height: 50px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #A0AEC0;
        }

        .input-field option {
            color: #A0AEC0;
        }


        .input-field:valid {
            color: #000000;
        }

        .required {
            color: red;
            margin-left: 2px;
        }

        #transactionsTable tr,
        #soldToTable tr {
            background-color: transparent !important;
        }

        #transactionsTable td,
        #soldToTable td {
            background-color: transparent !important;
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

    <div class="content bg-gray-100 h-screen w-auto m-0 p-2">
        <nav class="text-gray-500 text-sm mb-4" aria-label="Breadcrumb">
            <ol class="list-reset flex">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Pages</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-orange-500">Transactions</li>
            </ol>
        </nav>


        <div style="display: flex; justify-content: space-between; align-items: center; margin-left: 40px;">
            <label style="font-weight: bold; font-size: 28px;">Transactions <span
                    style="color: #959595; font-size: 13px;">(</span><span {{-- style="color: #E98E15; font-size: 13px;">{{ count($transactionsData) }}</span><span --}}
                    style="color: #959595; font-size: 13px;">)</span>
                <span style="color: #959595; font-size: 13px;">entries</span>
            </label>
            <div class="buy-sell-buttons" style="display: flex; gap: 10px; border: none;">
                <button id="filterButton" class="filter-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-slider-alt'></i> Filter
                </button>

                <button class="sort-button"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; background-color: #fff; color: #BABABA; margin: 0; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-sort'></i> Sort
                </button>


                <button id="createBatchBtn"
                    style="width: 148px; height: 34px; padding: 6px 16px; border: none; border-radius: 2px 0px 0px 0px; background-color: #E98E15; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; white-space: nowrap;">
                    <span
                        style="background-color: #fff; border-radius: 50%; color: #ff9800; font-weight: bold; height: 15px; width: 22px; display: inline;">
                        <i class='bx bx-plus'></i>
                    </span>
                    <span style="font-weight: bold; font-size: 16px; margin-left: 5px;">
                        Create Batch
                    </span>
                </button>
            </div>


            <div id="createBatchModal" class="batch-modal-overlay" style="display: none;">
                <div class="batch-modal">
                    <h2 class="batch-modal-header">Create Batch</h2>
                    <h2 class="batch-modal-semi-header">Select batch to finalize</h2>
                    <div class="batch-modal-content">
                        <table class="batch-table">
                            <tbody>
                                <tr>
                                    <td><span class="table-header">Batch No.</span>20240921FTKTBK01</td>
                                    <td><span class="table-header">Date Created</span>2024-10-05</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>500 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>

                                <tr>
                                    <td><span class="table-header">Batch No.</span>06xmoNiWWMSabo</td>
                                    <td><span class="table-header">Date Created</span>2024-10-04</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>600 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>

                                <tr>
                                    <td><span class="table-header">Batch No.</span>06xmoNiWWMSabo</td>
                                    <td><span class="table-header">Date Created</span>2024-10-03</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>450 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>

                                <tr>
                                    <td><span class="table-header">Batch No.</span>06xmoNiWWMSabo</td>
                                    <td><span class="table-header">Date Created</span>2024-10-02</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>520 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>

                                <tr>
                                    <td><span class="table-header">Batch No.</span>06xmoNiWWMSabo</td>
                                    <td><span class="table-header">Date Created</span>2024-10-01</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>580 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>

                                <tr>
                                    <td><span class="table-header">Batch No.</span>06xmoNiWWMSabo</td>
                                    <td><span class="table-header">Date Created</span>2024-09-30</td>
                                    <td><span class="table-header">Batch from</span>Barbco</td>
                                    <td><span class="table-header">Total Weight</span>470 kg</td>
                                    <td><input type="checkbox" class="custom-checkbox" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="batch-modal-footer">
                        <div class="small-buttons">
                            <button class="cancel-btn">Cancel</button>
                            <button class="confirm-btn">Confirm Batch</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="stepModal1" class="batch-modal-overlay" style="display: none;">
                <div class="batch-modal">
                    <h2 class="batch-modal-header">Batch Creation</h2>
                    <div class="batch-modal-content">
                        <div class="batch-info">

                            <div class="batch-item">
                                <label class="batch-label">Batch No.</label>
                                <p class="batch-data">12345</p>
                            </div>

                            <div class="batch-item">
                                <label class="batch-label">Date Created</label>
                                <p class="batch-data">2024-10-05</p>
                            </div>

                            <div class="batch-item">
                                <label class="batch-label">Batch From</label>
                                <p class="batch-data">Barbco</p>
                            </div>

                            <div class="batch-item">
                                <label class="batch-label">Location</label>
                                <p class="batch-data">Talandang, Barbco</p>
                            </div>
                        </div>


                        <div class="input-weight-section">
                            <label class="input-weight-label">Input Weight</label>
                            <input type="text" class="input-weight-box" />
                        </div>


                        <div class="selected-section">
                            <label class="selected-label">Selected</label>


                            <div class="selected-box">
                                <div class="reference-info">
                                    <p class="reference-label">Reference No.</p>
                                    <p class="reference-no">06xmoNiWWMSabo</p>
                                </div>
                                <p class="weight">Weight: <span class="weight-value">500 kg</span></p>
                            </div>


                            <div class="selected-box">
                                <div class="reference-info">
                                    <p class="reference-label">Reference No.</p>
                                    <p class="reference-no">09Tklou34JLbdg</p>
                                </div>
                                <p class="weight">Weight: <span class="weight-value">300 kg</span></p>
                            </div>

                        </div>


                    </div>

                    <div class="batch-modal-footer">
                        <div class="small-buttons2">
                            <button class="cancel-btn">Cancel</button>
                            <button class="next-step-btn">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>





            <div id="stepModal2" class="batch-modal-overlay" style="display: none;">
                <div class="batch-modal">
                    <h2 class="batch-modal-header">Final batch release</h2>
                    <h2 class="batch-modal-semi-header">Fill in the remaining information needed.</h2>

                    <!-- Step indicator -->
                    <div class="modal-step-indicator">
                        <p>
                            <span class="step-text">Step</span>
                            <span class="step-number">1</span>
                            <span class="of-step">of 2</span>
                        </p>
                    </div>

                    <!-- Form content -->
                    <div class="batch-modal-content1">
                        <div class="form-group">
                            <div class="form-column">
                                <label for="pesticides" class="input-label">Pesticides<span
                                        class="required">*</span></label>
                                <select id="pesticides" class="input-field" required>
                                    <option value="" disabled selected>Select pesticides</option>
                                    <option value="pesticide1">Pesticide 1</option>
                                    <option value="pesticide2">Pesticide 2</option>
                                </select>
                            </div>
                            <div class="form-column">
                                <label for="sub-pesticides" class="input-label">Sub Pesticides<span
                                        class="required">*</span></label>
                                <select id="sub-pesticides" class="input-field" required>
                                    <option value="" disabled selected>Select sub pesticides</option>
                                    <option value="sub-pesticide1">Sub Pesticide 1</option>
                                    <option value="sub-pesticide2">Sub Pesticide 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-column">
                                <label for="heavy-metal" class="input-label">Heavy Metal Contamination on Soil<span
                                        class="required">*</span></label>
                                <input id="heavy-metal" class="input-field" type="text" />
                            </div>
                            <div class="form-column">
                                <label for="hygiene" class="input-label">Processing Hygiene Practices<span
                                        class="required">*</span></label>
                                <input id="hygiene" class="input-field" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-column">
                                <label for="aroma" class="input-label">Aroma<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                            <div class="form-column">
                                <label for="moisture" class="input-label">Moisture Content<span
                                        class="required">*</span></label>
                                <input id="moisture" class="input-field" type="text" />
                            </div>
                        </div>
                    </div>


                    <div class="batch-modal-footer">
                        <button class="next-step-btn-2">Next Step</button>
                    </div>
                </div>
            </div>


            <div id="stepModal3" class="batch-modal-overlay" style="display: none;">
                <div class="batch-modal">
                    <h2 class="batch-modal-header">Final batch release</h2>
                    <h2 class="batch-modal-semi-header">Fill in the remaining inforation needed.</h2>
                    <div class="modal-step-indicator">
                        <p>
                            <span class="step-text">Step</span>
                            <span class="step-number">2</span>
                            <span class="of-step">of 2</span>
                        </p>
                    </div>


                    <div class="batch-modal-content1">
                        <div class="form-group">
                            <div class="form-column">
                                <label for="pesticides" class="input-label">Bean Size and Uniformity<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                            <div class="form-column">
                                <label for="sub-pesticides" class="input-label">Bean Color<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-column">
                                <label for="heavy-metal" class="input-label">Post Harvest Handling<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                            <div class="form-column">
                                <label for="hygiene" class="input-label">Acidity / Acid<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-column">
                                <label for="aroma" class="input-label">Fermentation Percentage<span
                                        class="required">*</span></label>
                                <input id="aroma" class="input-field" type="text" />
                            </div>
                        </div>
                    </div>

                    <div class="batch-modal-footer">
                        <button class="modal-done-btn">Done</button>
                    </div>
                </div>
            </div>


            <script>
                const createBatchBtn = document.getElementById('createBatchBtn');
                const createBatchModal = document.getElementById('createBatchModal');
                const stepModal1 = document.getElementById('stepModal1');
                const stepModal2 = document.getElementById('stepModal2');
                const stepModal3 = document.getElementById('stepModal3');
                const cancelButtons = document.querySelectorAll('.cancel-btn');


                createBatchBtn.addEventListener('click', () => {
                    createBatchModal.style.display = 'flex';
                });


                cancelButtons.forEach(btn => {
                    btn.addEventListener('click', (event) => {
                        const currentModal = event.target.closest('.batch-modal-overlay');


                        if (currentModal.id === 'stepModal1') {
                            stepModal1.style.display = 'none';
                            createBatchModal.style.display = 'flex';
                        } else if (currentModal.id === 'stepModal2') {

                            stepModal2.style.display = 'none';
                            stepModal1.style.display = 'flex';
                        } else {

                            document.querySelectorAll('.batch-modal-overlay').forEach(modal => {
                                modal.style.display = 'none';
                            });
                        }
                    });
                });


                document.querySelector('.confirm-btn').addEventListener('click', () => {
                    createBatchModal.style.display = 'none';
                    stepModal1.style.display = 'flex';
                });

                document.querySelector('.next-step-btn').addEventListener('click', () => {
                    stepModal1.style.display = 'none';
                    stepModal2.style.display = 'flex';
                });

                document.querySelector('.next-step-btn-2').addEventListener('click', () => {
                    stepModal2.style.display = 'none';
                    stepModal3.style.display = 'flex';
                });

                document.querySelector('.modal-done-btn').addEventListener('click', () => {
                    stepModal2.style.display = 'none';
                    stepModal3.style.display = 'none';
                });
            </script>


            <script>
                document.querySelectorAll('.filter-button, .sort-button').forEach(button => {
                    button.addEventListener('mousedown', function() {
                        this.classList.add('active-button');
                    });

                    button.addEventListener('mouseup', function() {
                        setTimeout(() => {
                            this.classList.remove('active-button');
                        }, 200);
                    });

                    button.addEventListener('mouseleave', function() {
                        this.classList.remove('active-button');
                    });
                });
            </script>
        </div>


        <div id="boughtFromTransactions" class="large-card">
            <table id="transactionsTable" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Bought from</th>
                        <th>Reference No.</th>
                        <th>Clone</th>
                        <th>Price per kilo</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="transactionBody">
                    <tr>
                        <td>01/01/2024</td>
                        <td>Mc</td>
                        <td>12345</td>
                        <td>Clone 1</td>
                        <td>P10 / kg</td>
                        <td>P1000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Mc Night12</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P20 / kg</td>
                        <td>P300</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div id="transactionModal" class="modal hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="back-arrow"></span>
                    <h2>Transaction Details</h2>
                </div>
                <div class="modal-body">

                    <div class="modal-full-row">
                        <div class="modal-row">
                            <div><strong>Reference No.</strong></div>
                            <div><span id="modalReferenceNum">20240722HTVSQTA1</span></div>
                        </div>
                        <div class="modal-row">
                            <div><strong>Bought from</strong></div>
                            <div><span id="modalSoldTo">David Guzman</span></div>
                        </div>
                    </div>

                    <!-- Two equal-width sections -->
                    <div class="modal-sections-wrapper">
                        <!-- Left section -->
                        <div class="modal-section">
                            <div class="modal-row">
                                <div><strong>Date</strong></div>
                                <div><span id="modalDate">2024-07-19</span></div>
                            </div>
                            <div class="modal-row">
                                <div><strong>Cacao Clone</strong></div>
                                <div><span id="modalClone">UF18</span></div>
                            </div>
                            <div class="modal-row">
                                <div><strong>Total Weight</strong></div>
                                <div><span id="modalTotalWeight">50 KG</span></div>
                            </div>
                        </div>

                        <!-- Right section -->
                        <div class="modal-section2">
                            <div class="modal-row">
                                <div><strong>Cacao Type</strong></div>
                                <div><span id="modalCacaoType">Wet beans</span></div>
                            </div>
                            <div class="modal-row">
                                <div><strong>Cacao Variety</strong></div>
                                <div><span id="modalVariety">Criollo</span></div>
                            </div>
                            <div class="modal-row">
                                <div><strong>Price per kilo</strong></div>
                                <div><span id="modalPricePerKilo">P 3/KG</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Centered Total Price -->
                    <div class="modal-total-price">
                        <div class="modal-row">
                            <div><strong>Total Price</strong></div>
                            <div><span id="modalTotalPrice">P150.00</span></div>
                        </div>
                    </div>

                    <!-- Remarks Section -->
                    <div class="modal-remarks">
                        <strong>Remarks</strong>
                        <p>Lorem ipsum dolor sit amet consectetur. Tristique in non massa commodo ultrices duis.
                            Morbi volutpat volutpat nulla adipiscing eget. Eu proin malesuada imperdiet pellentesque
                            elit ornare.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="soldToTransactions" class="large-card hidden">
            <table id="soldToTable" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sold to</th>
                        <th>Reference No.</th>
                        <th>Clone</th>
                        <th>Price per kilo</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="soldToBody">
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>
                    <tr>
                        <td>01/01/2026</td>
                        <td>Night</td>
                        <td>54321</td>
                        <td>Clone 2</td>
                        <td>P30 / kg</td>
                        <td>P2000</td>
                        <td><i class='bx bx-dots-horizontal-rounded' onclick="openTransactionModal(this)"></i></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <script>
            const modal = document.getElementById("transactionModal");
            const backArrow = document.querySelector(".modal .back-arrow");


            document.querySelectorAll('.bx-dots-horizontal-rounded').forEach((icon) => {
                icon.addEventListener('click', () => {
                    const transactionRow = icon.closest('tr');
                    const cells = transactionRow.querySelectorAll('td');


                    document.getElementById('modalDate').innerText = cells[0].innerText;
                    document.getElementById('modalSoldTo').innerText = cells[1].innerText;
                    document.getElementById('modalReferenceNum').innerText = cells[2].innerText;
                    document.getElementById('modalTotalWeight').innerText = '50 KG';
                    document.getElementById('modalClone').innerText = cells[3].innerText;
                    document.getElementById('modalVariety').innerText = 'Criollo';
                    document.getElementById('modalPricePerKilo').innerText = cells[4].innerText;
                    document.getElementById('modalTotalPrice').innerText = cells[5].innerText;


                    modal.classList.remove('hidden');
                    modal.style.display = 'flex';
                });
            });


            backArrow.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.style.display = 'none';
            });


            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    modal.style.display = 'none';
                }
            });
        </script>

        <script>
            document.getElementById('filterButton').addEventListener('click', function() {
                const boughtFromTable = document.getElementById('boughtFromTransactions');
                const soldToTable = document.getElementById('soldToTransactions');
                const transactionTypeHeader = document.getElementById('transactionType');

                if (boughtFromTable.classList.contains('hidden')) {
                    // Show "Bought from" table
                    boughtFromTable.classList.remove('hidden');
                    soldToTable.classList.add('hidden');
                    transactionTypeHeader.innerText = "Bought from";
                } else {
                    // Show "Sold to" table
                    boughtFromTable.classList.add('hidden');
                    soldToTable.classList.remove('hidden');
                    transactionTypeHeader.innerText = "Sold to";
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#transactionsTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true,
                    "lengthChange": false,
                    "pageLength": 10,
                    "language": {
                        "paginate": {
                            "first": "«",
                            "previous": "‹",
                            "next": "›",
                            "last": "»"
                        }
                    }
                });

                $('#soldToTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true,
                    "lengthChange": false,
                    "pageLength": 10,
                    "language": {
                        "paginate": {
                            "first": "«",
                            "previous": "‹",
                            "next": "›",
                            "last": "»"
                        }
                    }
                });
            });

            function openTransactionModal(element) {
                const row = $(element).closest('tr');
                const rowData = row.children('td').map(function() {
                    return $(this).text();
                }).get();

                $('#modalDate').text(rowData[0]);
                $('#modalSoldTo').text(rowData[1]);
                $('#modalReferenceNum').text(rowData[2]);
                $('#modalClone').text(rowData[3]);
                $('#modalPricePerKilo').text(rowData[4]);
                $('#modalTotalPrice').text(rowData[5]);

                $('#transactionModal').show();
            }
        </script>
