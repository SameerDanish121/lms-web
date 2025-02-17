<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LMS</title>
    @vite('resources/css/app.css')

    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #024CAA);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .forgot:hover { color: white; }

        .glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            text-align: center;
            font-size: 4rem;
            font-weight: bold;
            color: #024CAA;
            margin-bottom: 50px;
        }

        .input-field {
            border: 2px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        .input-field:focus {
            border-color: #2b78f5;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.5);
            transform: scale(1.02);
        }

        .btn-animate {
            transition: all 0.3s ease-in-out;
        }

        .btn-animate:hover {
            transform: scale(1.05);
            background: white;
            font-size: large;
            color: #024CAA;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>

    <!-- Heading -->
    <h1 class="text-4xl font-bold mb-6 text-center text-[#024CAA]">
        <span class="text-black">Welcome to</span> <span class="text-5xl">LMS</span>
    </h1>

    <!-- Glassmorphic Login Card -->
    <div class="glass text-white flex flex-col items-center">
        <h2 class="login-title">Login</h2>

        <!-- Error Alert (If Exists) -->
        @if(session('error'))
            <div id="error-alert" class="bg-red-600 text-white p-4 rounded-md w-full text-center mb-4 animate-bounce">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div id="success-alert" class="bg-green-600 text-white p-4 rounded-md w-full text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('handleLogin') }}" method="POST" class="w-full flex flex-col items-center">
            @csrf

            <div class="mb-6 w-full">
                <input type="text" id="username" name="username" placeholder="Enter Your Username"
                    class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300" required>
            </div>

            <div class="mb-4 w-full">
                <input type="password" id="password" name="password" placeholder="Enter Your Password"
                    class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300" required>
            </div>

            <button type="submit"
                class="btn-animate w-80 flex justify-center items-center bg-[#024CAA] text-white font-semibold p-4 mt-5 rounded-lg">
                Login
            </button>

            <a href="" class="m-4 text-black cursor-pointer forgot">Forgot Password?</a>
        </form>
    </div>
    {{-- {{ route('forgot') }} --}}
    <!-- Auto-hide Error Alert -->
    <script>
        setTimeout(() => {
            let errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 3000);
    </script>

</body>
</html>
