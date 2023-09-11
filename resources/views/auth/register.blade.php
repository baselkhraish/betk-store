<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل </title>
    <link rel="stylesheet" href="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-gray-100" dir="rtl">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
                <div class="flex items-center justify-center">
                    <img src="https://www.ibelieveinsci.com/wp-content/uploads/1628521849226-scaled.jpg" alt="Unsplash Photo"
                        class="w-20 h-20 rounded-full">
                </div>
				<form method="POST" action="{{ route('register') }}">
					@csrf
					<!-- Name -->
					<div class="mt-4">
						<label for="name" class="block text-gray-700 font-bold mb-2">الاسم</label>
						<input type="name" id="name" name="name"
							class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
							value="{{ old('name') }}" required autofocus autocomplete="name"
							placeholder="أدخل اسمك">

					</div>

					<!-- Email -->
					<div class="mt-4">
						<label for="email" class="block text-gray-700 font-bold mb-2">الإيميل</label>
						<input type="email" id="email" name="email"
							class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
							value="{{ old('email') }}" required autofocus autocomplete="email"
							placeholder="أدخل الإيميل">

					</div>

					<!-- Password -->
					<div class="mt-4">
						<label for="password" class="block text-gray-700 font-bold mb-2">كلمة السر</label>
						<input type="password" id="password" name="password"
							class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                            required autocomplete="current-password">
						{{-- <p id="password-strength" class="text-gray-600 mt-2"></p> --}}
					</div>

					<!-- Confirm Password -->
					<div class="mt-4">
						<label for="password_confirmation" class="block text-gray-700 font-bold mb-2">تأكيد كلمة السر</label>
						<input type="password" id="password_confirmation" name="password_confirmation"
							class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                            required autocomplete="current-password">
						{{-- <p id="password-strength" class="text-gray-600 mt-2"></p> --}}
					</div>

					<!-- Remember Me -->
					<div class="block mt-4">
						<label for="remember_me" class="inline-flex items-center">
							<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
							<span class="mr-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
						</label>
					</div>

					<div class="flex items-center justify-end mt-6">
						<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
							{{ __('لديك حساب؟') }}
						</a>

						<x-primary-button class="mr-4">
							{{ __('تسجيل') }}
						</x-primary-button>
					</div>
				</form>
			</div>
        </div>

        <script>
                const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.getElementById('password-strength');
        const loginButton = document.getElementById('login-btn');

        function checkPasswordStrength(password) {
            // You can customize this function to implement your own password strength checking logic
            // For simplicity, let's assume a weak password contains less than 8 characters and a strong one contains 8 or more characters.
            if (password.length < 8) {
                return 'Weak';
            } else {
                return 'Strong';
            }
        }

        passwordInput.addEventListener('input', function () {
            const password = passwordInput.value;
            const strength = checkPasswordStrength(password);
            passwordStrength.textContent = 'Password Strength: ' + strength;
        });

        loginButton.addEventListener('click', function () {
            const email = emailInput.value;
            const password = passwordInput.value;

            // Basic email and password validation for demonstration purposes
            if (email.trim() === '') {
                alert('Please enter your email.');
                return;
            }

            if (password.trim() === '') {
                alert('Please enter your password.');
                return;
            }

            // Check if the password is strong enough
            const strength = checkPasswordStrength(password);
            if (strength === 'Weak') {
                alert('Your password is too weak. Please choose a stronger one.');
                return;
            }

            // If all validations pass, proceed with login or form submission here.
            // For this example, we will just show an alert indicating successful login.
            alert('Login Successful!');
        });
        </script>
</body>
</html>
