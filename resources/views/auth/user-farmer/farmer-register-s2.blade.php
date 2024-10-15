<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')

    <style>
        .select2-container .select2-selection--multiple {
            height: auto;
            min-height: 38px;
            font-size: 14px;
            border-radius: 2px;
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))

        }
    </style>
</head>

<body>
<!-- component -->
<div class="h-screen md:flex">
	<div class="font-inter relative overflow-hidden md:flex w-1/2 bg-customOrange justify-around items-center hidden p-12 pl-16">
		<div>
			<h1 class="text-white font-bold text-4xl mb-4">Let's set up your Traco account</h1>
			<p class="text-white mt-1 mb-8 pr-10">Lorem ipsum dolor sit amet consectetur. Faucibus nibh pellentesque eu semper morbi posuere accumsan ac.</p>
		</div>
	</div>

    <!--Right Section-->
	<div class="w-4/5 bg-white flex flex-col justify-center items-center p-12 font-inter shadow-custom-left">
        <div class="w-full max-w-lg">
            <div class="mb-8 text-center">
                <div class="flex justify-center mb-4 items-center">
                    <div class="w-4 h-4 bg-[#E98E15] rounded-full"></div>
                    <div class="h-1 bg-[#E98E15] flex-1 "></div>
                    <div class="w-4 h-4 bg-[#E98E15] rounded-full"></div>
                    <div class="h-1 bg-[#E98E15] flex-1"></div>
                    <div class="w-4 h-4 border-2 border-[#E98E15] rounded-full"></div>
                </div>
       
            </div>         

            <form method="POST" action="{{ route('register.step2') }}" class="space-y-4 w-full">
                @csrf
                <h2 class="text-xl font-bold text-[#E98E15] font-helvetica">Farm Information</h2>
                <div class="mb-4">
                    <label for="farm_address" class="block text-sm font-medium text-gray-700">Farm Address</label>
                    <input id="farm_address" type="text" name="farm_address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                </div>
                <div class="flex space-x-4">
                    <div class="w=1/2">
                        <label for="total_farm_hectare" class="block text-sm font-medium text-gray-700">Total Farm Hectare</label>
                        <input id="total_farm_hectare" type="number" name="total_farm_hectare" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                    </div>
                    <div class="w=1/2">
                        <label for="total_cacao_hectare" class="block text-sm font-medium text-gray-700">Total Cacao Hectare</label>
                        <input id="total_cacao_hectare" type="number" name="total_cacao_hectare" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="variety" class="block text-sm font-semibold text-gray-700">What variety of cacao do you have?</label>
                    <select id="variety" name="variety[]" class="select2-multiple mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:orange-orange-500 sm:text-sm font-sans text-sm" required multiple>
                        <option value="Criollo">Criollo</option>
                        <option value="Forastero">Forastero</option>
                        <option value="Trinitario">Trinitario</option>
                        <option value="Nacional">Nacional</option>
                        <option value="MIX">MIX</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="clone" class="block text-sm font-semibold text-gray-700">What clone of cacao do you have?</label>
                    <select id="clone" name="clone[]" multiple class="select2-multiple mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
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
                <div class="mb-4">
                    <label for="cacao_type_selling" class="block text-sm font-semibold text-gray-700">What type of cacao do you have?</label>
                    <select id="cacao_type_selling" name="cacao_type_selling[]" multiple class="select2-multiple mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                        <option value="Wet Beans">Wet Beans</option>
                        <option value="Dry Fermented">Dry Fermented</option>
                        <option value="Dry Unfermented">Dry Unfermented</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-full px-4 py-2 bg-customOrange text-white font-semibold rounded-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">Next Step</button>
                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.select2-multiple').select2({   
                    placeholder: "Select one or more",
                    allowClear: true
                    });
                });
            </script>
        </div>
    </div>
</div>
</html>
