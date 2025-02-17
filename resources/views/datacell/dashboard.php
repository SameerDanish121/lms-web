<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard</title>
    @vite(['resources/css/app.css'])
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        }
    </script>
    <style>
        @keyframes marquee {
            from { transform: translateX(0); }
            to { transform: translateX(-100%); }
        }
        .marquee-container {
            display: flex;
            min-width: 200%;
            animation: marquee 50s linear infinite;
        }
        .relative:hover .marquee-container {
            animation-play-state: paused;
        }
        .btn-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .nav-item {
            position: relative;
            color: #4b5563;
            font-weight: 600;
            transition: color 0.3s ease-in-out;
        }
        .nav-item:hover {
            color: #1d4ed8;
        }
        .nav-item::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #1d4ed8;
            transition: width 0.3s ease-in-out, left 0.3s ease-in-out;
        }
        .nav-item:hover::after {
            width: 100%;
            left: 0;
  }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 min-h-screen p-0 m-0">
    @include('components.navbar', ['username' => ' M Sharjeel', 'profileImage' => 'images/2021-ARID-4583.png', 'a'=>'dc'])



    <div class="max-w-6xl mx-auto mb-1 mt-6 p-6 rounded-2xl shadow-lg text-center fade-in backdrop-blur-lg border border-white/10" style="background: linear-gradient(to bottom right, rgba(0, 198, 255, 0.8), rgba(0, 114, 255, 0.8), rgba(30, 61, 143, 0.8));">
        <img src="{{ asset('images/2021-ARID-4583.png') }}" alt="Profile Picture" class="mx-auto rounded-full border-4 border-white shadow-lg w-24 h-24 object-cover">
        <h2 class="text-white text-2xl font-bold mt-3">Muhammad Sharjeel</h2>
        <p class="text-white opacity-80">DataCell</p>
        <button class="account-btn text-white px-6 py-3 mt-4 rounded-full bg-white/20 hover:bg-white/30 transition-all duration-300 shadow-lg">Account Details</button>
    </div>
    <div class="relative w-full max-w-8xl overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-800 text-white shadow-lg rounded-lg border border-white/10 mx-auto py-4">
        <div class="marquee-container flex space-x-16 whitespace-nowrap text-lg font-semibold tracking-wide">
            <div class="marquee flex space-x-20">
                <span>🚀 Semester Registrations Open</span>
                <span>🏛️ Fee Deadline: 15 Feb 2025</span>
                <span>🎓 Convocation: 20 March 2025</span>
                <span>📢 Students Week Soon</span>
                <span>📝 Mids : 25 March 2025</span>
            </div>
            <div class="marquee flex space-x-16">
                <span>🚀 Semester Registrations Open</span>
                <span>🏛️ Fee Deadline: 15 Feb 2025</span>
                <span>🎓 Convocation: 20 March 2025</span>
                <span>📢 New Student Portal Launched!</span>
                <span>📝 Exam Forms Submission Ends Soon</span>
            </div>
        </div> </div> </div>
        <div class="max-w-5xl mx-auto mt-6 flex items-center">
           <button id="prevBtn" class="bg-white p-3 md:p-4 rounded-lg shadow-md text-center btn-hover mr-2 md:mr-5">⬅️</button>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 flex-1" id="cardContainer">
                <!-- Button 1 -->
                <a href="{{ route('Upload') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">📑</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">Upload Timetable</p>
                </a>
                <!-- Button 2 -->
                <a href="{{ route('uploadStudents') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">👨‍🎓</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">Add Students</p>
                </a>
                <!-- Button 3 -->
                <a href="{{ route('courses') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">📚</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">All Courses</p>
                </a>
                <!-- Button 4 -->
                <a href="{{ route('courses') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">🎓</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">Assign Courses</p>
                </a>

                <!-- Button 5 -->
                <a href="{{ route('courses') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">👨‍🏫</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">Teachers</p>
                </a>
                <!-- Button 6 -->
                <a href="{{ route('courses') }}" class="btn-card bg-white p-6 rounded-xl shadow-md text-center hover:scale-105 transition-transform">
                    <span class="text-4xl">👨‍🎓</span>
                    <p class="mt-2 font-bold text-xs md:text-sm">Students</p>
                </a>



            </div>
<!-- Next Button: Positioned to the right outside the card with margin -->
<button id="nextBtn" class="bg-white p-3 md:p-4 rounded-lg shadow-md text-center btn-hover ml-2 md:ml-5">
    <span>➡️</span>
</button></div>
        <div class=" max-w-6xl mx-auto grid grid-cols-2 gap-4 mt-4">
            <button class="btn-hover bg-blue-600 text-white p-6 rounded-lg text-center">
                <p class="font-bold">Offered Courses</p>
                <p class="text-3xl font-bold">33</p>
            </button>
            <button class="btn-hover bg-blue-600 text-white p-6 rounded-lg text-center">
                <p class="font-bold">Total Courses</p>
                <p class="text-3xl font-bold">60</p>
            </button>
        </div>
    </div>
    <div class="max-w-6xl mx-auto mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white text-black p-6 rounded-lg">
            <h3 class="text-lg font-bold ">Students</h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <button class="bg-blue-600 p-6 rounded-lg text-center text-white btn-hover">
                    <p class="font-bold">Graduate</p>
                    <p class="text-3xl font-bold">700</p>
                </button>
                <button class="bg-blue-600 p-6 rounded-lg text-white text-center btn-hover">
                    <p class="font-bold">Under-Graduate</p>
                    <p class="text-3xl font-bold">2056</p>
                </button>
            </div>
        </div>
        <div class="bg-white text-black p-6 rounded-lg">
            <h3 class="text-lg font-bold">Teachers</h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <button class="bg-blue-600 p-6 rounded-lg text-center btn-hover">
                    <p class="font-bold text-white">Lecturer</p>
                    <p class="text-3xl font-bold text-white">26</p>
                </button>
                <button class="bg-blue-600 p-6 rounded-lg text-center btn-hover">
                    <p class="font-bold text-white">Junior Lecturer</p>
                    <p class="text-3xl font-bold text-white">12</p>
                </button>
            </div>
        </div>
    </div>
    <footer class="bg-blue-600 p-2 mt-20 shadow-md text-center">
        <h4 class=" font-bold text-2xl mb-4 mt-4 text-white">Learning Management System</h4>
        <p class="text-white text-1xl">&copy; 2025 LMS. All Rights Reserved.</p>
        <p class="text-white text-1xl">Sameer  |  Ali  | Sharjeel</p>
    </footer>
</body>
<script>
    let currentIndex = 0;
    const buttons = document.querySelectorAll(".btn-card");
    const visibleCount = 4;

    function updateVisibility() {
        buttons.forEach((btn, index) => {
            btn.classList.toggle("hidden", index < currentIndex || index >= currentIndex + visibleCount);
        });
    }

    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex -= 1;
            updateVisibility();
        }
    });

    document.getElementById("nextBtn").addEventListener("click", () => {
        if (currentIndex + visibleCount < buttons.length) {
            currentIndex += 1;
            updateVisibility();
        }
    });

    updateVisibility();
</script>
</html>