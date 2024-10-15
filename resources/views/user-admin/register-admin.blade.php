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
	<div class="font-sans relative overflow-hidden md:flex w-1/2 bg-customOrange justify-around items-center hidden p-12 pl-16">
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
                    <div class="w-1/4 h-1 bg-[#E98E15] flex-1"></div>
                    <div class="w-4 h-4 border-2 border-[#E98E15] rounded-full "></div>
                </div>
       
            </div>
            <form method="POST" action="{{ route('admin.register.step1') }}" class="space-y-4 font-sans">
                @csrf
                <h2 class="text-xl font-bold text-[#E98E15] font-sans">Basic Information</h2>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm" required>
                        <option value="Admin">Admin</option>
                        <option value="Consolidator">Consolidator</option>
                    </select>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name*</label>
                        <input id="first_name" type="text" name="first_name" required placeholder="Your first name" class="mt-1 block w-full px-3 py-2 border rounded-m focus:outline-none focus:ring @error('first_name') border-red-500 @enderror">
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name*</label>
                        <input id="last_name" type="text" name="last_name" required placeholder="Your last name" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('last_name') border-red-500 @enderror">
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="province" class="block text-sm font-semibold text-gray-700">Province*</label>
                        <input id="province" type="text" name="province" required placeholder="Enter your province" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('address') border-red-500 @enderror">
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="city" class="block text-sm font-semibold text-gray-700">City*</label>
                        <input id="city" type="text" name="city" required placeholder="Enter your city" class="mt-1 block w-full px-3 py-2 border rounded-m focus:outline-none focus:ring @error('first_name') border-red-500 @enderror">
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>
                <div>
                    <label for="contact_no" class="block text-sm font-semibold text-gray-700">Phone Number*</label>
                    <input id="contact_no" type="text" name="contact_no" required placeholder="Your phone number" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="birthdate" class="block text-sm font-semibold text-gray-700">Birthdate*</label>
                        <input id="birthdate" type="date" name="birthdate" required class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('birthdate') border-red-500 @enderror">
                        @error('birthdate')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="civil_status" class="block text-sm font-semibold text-gray-700">Civil Status*</label>
                        <select id="civil_status" name="civil_status" required class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('civil_status') border-red-500 @enderror">
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
                <div>
                    <label for="emp_no" class="block text-sm font-semibold text-gray-700">Employee Number*</label>
                    <input id="emp_no" type="text" name="emp_no" required placeholder="Your employee number" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password*</label>
                    <input id="password" type="password" name="password" required placeholder="Minimum of 8 characters" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div> --}}
                <button type="submit" class="w-full px-4 py-2 font-semibold text-sm text-white bg-[#E98E15] rounded-sm hover:bg-orange-600 focus:outline-none focus:ring">NEXT STEP</button>
                <p class="text-right mt-1 font-sans">Step <span class="text-customOrange font-semibold">1</span> of 2</p>
            </form>
        </div>
    </div>
</div>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Register Admin</h1>

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

        <form action="{{ route('register.admin') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                <select id="sex" name="sex" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" id="department" name="department" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title/Position</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Register</button>
        </form>
    </div>
</body>
</html> --}}
