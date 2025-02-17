<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - LMS</title>
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
        .progress-container {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
            position: relative;
            padding: 0 15px;
        }
        .progress-line {
            position: absolute;
            top: 50%;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #ddd;
            transform: translateY(-50%);
            z-index: 0;
            transition: width 0.3s, background 0.3s;
        }
        .progress-bar {
            display: flex;
            justify-content: space-between;
            width: 100%;
            z-index: 1;
        }
        .step {
            width: 30px;
            height: 30px;
            background: #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: black;
            position: relative;
            z-index: 2;
        }
        .active {
            background: #024CAA;
            color: white;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h1 class="text-4xl font-bold mb-6 text-center text-[#024CAA]">
        <span class="text-black">Reset Your</span> <span class="text-5xl">Password</span>
    </h1>

    <div class="glass text-white flex flex-col items-center">
        <div class="progress-container">
            <div class="progress-line" id="progress-line"></div>
            <div class="progress-bar">
                <div id="step1" class="step active">1</div>
                <div id="step2" class="step">2</div>
                <div id="step3" class="step">3</div>
            </div>
        </div>

        <div id="step1-content" class="step-content w-full text-center">
            <p class="mb-4">Enter your email to receive a verification code.</p>
            <input type="email" id="email" placeholder="Enter Your Email"
                class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300 mb-4" required>
            <button onclick="sendOTP()"
                class="btn-animate w-full bg-[#024CAA] text-white font-semibold p-4 mt-3 rounded-lg">
                Send Code
            </button>
        </div>

        <div id="step2-content" class="step-content w-full text-center hidden">
            <p class="mb-4">Enter the code sent to your email.</p>
            <input type="text" id="code" placeholder="Enter Code"
                class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300 mb-4" required>
            <button onclick="verifyOTP()"
                class="btn-animate w-full bg-[#024CAA] text-white font-semibold p-4 mt-3 rounded-lg">
                Verify Code
            </button>
        </div>

        <div id="step3-content" class="step-content w-full text-center hidden">
            <p class="mb-4">Set your new password.</p>
            <input type="password" id="password" placeholder="New Password"
                class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300 mb-4" required>
            <input type="password" id="confirm-password" placeholder="Confirm Password"
                class="input-field w-full p-4 rounded-lg border text-black focus:outline-none transition-all duration-300 mb-4" required>
            <button onclick="updatePassword()"
                class="btn-animate w-full bg-[#024CAA] text-white font-semibold p-4 mt-3 rounded-lg">
                Submit
            </button>
        </div>
    </div>

   
    <script>
        const API_BASE_URL = "http://127.0.0.1:8000";
    
        function nextStep(step) {
            document.getElementById(`step${step}-content`).classList.add('hidden');
            document.getElementById(`step${step + 1}-content`).classList.remove('hidden');
            document.getElementById(`step${step}`).classList.remove('active');
            document.getElementById(`step${step + 1}`).classList.add('active');
    
            let progressLine = document.getElementById('progress-line');
            if (step === 1) {
                progressLine.style.width = "40%";
                progressLine.style.background = "#024CAA";
            } else if (step === 2) {
                progressLine.style.width = "85%";
            }
        }
    
        // Send OTP API
        function sendOTP() {
            let email = document.getElementById("email").value.trim();
            if (!email) {
                alert("Please enter your email!");
                return;
            }
    
            fetch(`${API_BASE_URL}/api/forgot-password`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                    localStorage.setItem("user_id", data.user_id); // Store user_id for later
                    nextStep(1);
                } else {
                    alert("Email doesn't exist. Please try again.");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    
        // Verify OTP API
        function verifyOTP() {
            let otp = document.getElementById("code").value.trim();
            let user_id = localStorage.getItem("user_id");
    
            if (!otp) {
                alert("Please enter the OTP!");
                return;
            }
    
            fetch(`${API_BASE_URL}/api/verify-otp`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    user_id: user_id,
                    otp: otp
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                    nextStep(2);
                } else {
                    alert("Invalid OTP. Please try again.");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    
        // Update Password API
        function updatePassword() {
            let newPassword = document.getElementById("password").value.trim();
            let confirmPassword = document.getElementById("confirm-password").value.trim();
            let user_id = localStorage.getItem("user_id");
    
            if (!newPassword || !confirmPassword) {
                alert("Please fill in both password fields!");
                return;
            }
    
            if (newPassword !== confirmPassword) {
                alert("Passwords do not match!");
                return;
            }
    
            fetch(`${API_BASE_URL}/api/update-pass`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    user_id: user_id,
                    new_password: newPassword
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                localStorage.removeItem("user_id"); // Clear stored user_id
                window.location.href = "{{ route('login') }}"; // Redirect to login
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
    
</body>
</html>