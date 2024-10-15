<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create User</h1>

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

        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
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
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact No</label>
                <input type="text" id="contact_no" name="contact_no" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil Status</label>
                <input type="text" id="civil_status" name="civil_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="farm_address" class="block text-sm font-medium text-gray-700">Farm Address</label>
                <input type="text" id="farm_address" name="farm_address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="total_farm_hectare" class="block text-sm font-medium text-gray-700">Total Farm Hectare</label>
                <input type="number" id="total_farm_hectare" name="total_farm_hectare" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="total_cacao_hectare" class="block text-sm font-medium text-gray-700">Total Cacao Hectare</label>
                <input type="number" id="total_cacao_hectare" name="total_cacao_hectare" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="variety" class="block text-sm font-medium text-gray-700">Variety</label>
                <select id="variety" name="variety[]" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="Criollo">Criollo</option>
                    <option value="Forastero">Forastero</option>
                    <option value="Trinitario">Trinitario</option>
                    <option value="Nacional">Nacional</option>
                    <option value="MIX">MIX</option>
                </select>
            </div>
            <div>
                <label for="clone" class="block text-sm font-medium text-gray-700">Clone</label>
                <select id="clone" name="clone[]" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="UF18">UF18</option>
                    <option value="BR25">BR25</option>
                    <option value="W10">W10</option>
                    <option value="BRAZIL">BRAZIL</option>
                    <option value="PBC123">PBC123</option>
                    <option value="K1">K1</option>
                    <option value="MIRACLES">MIRACLES</option>
                    <option value="OTHER Varieties">OTHER Varieties</option>
                    <option value="MIX">MIX</option>
                </select>
            </div>
            <div>
                <label for="cacao_type_selling" class="block text-sm font-medium text-gray-700">Cacao Type Selling</label>
                <select id="cacao_type_selling" name="cacao_type_selling[]" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="Wet Beans">Wet Beans</option>
                    <option value="Dry Fermented">Dry Fermented</option>
                    <option value="Dry Unfermented">Dry Unfermented</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create User</button>
        </form>
    </div>

    <!-- Include jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#variety').select2();
            $('#clone').select2();
            $('#cacao_type_selling').select2();
        });
    </script>
</body>
</html>
