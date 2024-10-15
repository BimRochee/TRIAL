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
    <title>Admin Registration - Step 2</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
    @vite('resources/css/app.css')
</head>
{{-- <body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Admin Registration - Step 2</h1>
        <form method="POST" action="{{ route('admin.register.step2') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Create Username</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Create Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit Registration</button>
        </form>
    </div>
</body>
</html> --}}

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
        <div class="mb-8 text-center">
            <div class="flex justify-center mb-4 items-center">
                <div class="w-4 h-4 bg-[#E98E15] rounded-full"></div>
                <div class="h-1 w-32 bg-[#E98E15] flex-1"></div>
                <div class="w-4 h-4 bg-[#E98E15] rounded-full"></div>
            </div>
   
        </div>  
        <div class="w-full max-w-lg">       

            <form method="POST" action="{{ route('admin.register.step2') }}" class="space-y-4 w-full">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" type="text" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-customOrange text-white font-semibold rounded-md hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2">SIGN UP</button>
                </div>
            </form>

        {{-- <form method="POST" action="{{ route('register.step3') }}" class="space-y-4 w-full">
                        @csrf
                        <h2 class="text-xl font-bold text-[#E98E15] font-helvetica">Finishing up!</h2>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="text" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" required placeholder="Minimum of 8 characters" class="mt-1 block w-full px-3 py-2 border rounded-sm focus:outline-none focus:ring @error('password') border-red-500 @enderror">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" name="password-confirm" class="form-control" required autocomplete="new-password">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="w-full px-4 py-2 bg-customOrange text-white font-semibold rounded-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Next Step</button>
                        </div>
                    </form>

        </div>
    </div>
</div>
</html>
 --}}
