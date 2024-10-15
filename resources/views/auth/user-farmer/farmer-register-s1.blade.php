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
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')

</head>

<body>
    <!-- component -->
    <div class="h-screen md:flex">
        <div
            class="font-sans relative overflow-hidden md:flex w-1/2 bg-customOrange justify-around items-center hidden p-12 pl-16">
            <div>
                <h1 class="text-white font-bold text-4xl mb-4">Let's set up your Traco account</h1>
                <p class="text-white mt-1 mb-8 pr-10">Lorem ipsum dolor sit amet consectetur. Faucibus nibh pellentesque
                    eu semper morbi posuere accumsan ac.</p>
            </div>
        </div>

        <!--Right Section-->
        <div class="w-4/5 bg-white flex flex-col justify-center items-center p-12 font-inter shadow-custom-left">
            <div class="w-full max-w-lg">
                <div class="mb-8 text-center">
                    <div class="flex justify-center mb-4 items-center">
                        <div class="w-4 h-4 bg-[#E98E15] rounded-full"></div>
                        <div class="w-1/4 h-1 bg-[#E98E15] flex-1"></div>
                        <div class="w-4 h-4 border-2 border-[#E98E15] rounded-full "></div>
                        <div class="h-1 bg-[#E98E15] flex-1"></div>
                        <div class="w-4 h-4 border-2 border-[#E98E15] rounded-full"></div>
                    </div>

                </div>
                <form method="POST" action="{{ route('register.step1') }}" class="space-y-4 font-sans">
                    @csrf
                    <h2 class="text-xl font-bold text-[#E98E15] font-sans">Profile Information</h2>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="first_name" class="block text-sm font-semibold text-gray-700">First
                                Name*</label>
                            <input id="first_name" type="text" name="first_name" required
                                placeholder="Your first name"
                                class="mt-1 block w-full px-3 py-2 border rounded-m focus:outline-none focus:ring @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name*</label>
                            <input id="last_name" type="text" name="last_name" required placeholder="Your last name"
                                class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('last_name') border-red-500 @enderror">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="province" class="block text-sm font-semibold text-gray-700">Province*</label>
                            <input id="address" type="text" name="address" required placeholder="Your address"
                                class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('address') border-red-500 @enderror">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="city" class="block text-sm font-semibold text-gray-700">City*</label>
                            <input id="first_name" type="text" name="first_name" required
                                placeholder="Your first name"
                                class="mt-1 block w-full px-3 py-2 border rounded-m focus:outline-none focus:ring @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <label for="contact_no" class="block text-sm font-semibold text-gray-700">Phone Number*</label>
                        <input id="contact_no" type="text" name="contact_no" required placeholder="Your phone number"
                            class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('phone_number') border-red-500 @enderror">
                        @error('phone_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="birthdate" class="block text-sm font-semibold text-gray-700">Birthdate*</label>
                            <input id="birthdate" type="date" name="birthdate" required
                                class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('birthdate') border-red-500 @enderror">
                            @error('birthdate')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="civil_status" class="block text-sm font-semibold text-gray-700">Civil
                                Status*</label>
                            <select id="civil_status" name="civil_status" required
                                class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('civil_status') border-red-500 @enderror">
                                <option value="">Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                            </select>
                            @error('civil_status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password*</label>
                    <input id="password" type="password" name="password" required placeholder="Minimum of 8 characters" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div> --}}
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-sm text-white bg-[#E98E15] rounded-sm hover:bg-orange-600 focus:outline-none focus:ring">NEXT
                        STEP</button>
                    <p class="text-right mt-1 font-sans">Step <span class="text-customOrange font-semibold">1</span> of
                        3</p>
                </form>
            </div>
        </div>
    </div>

</html>
