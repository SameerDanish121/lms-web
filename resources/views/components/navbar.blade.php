<div class="flex items-center bg-white p-4 shadow-md relative z-50">

    <div class="flex items-center space-x-3">
        <button onclick="toggleMenu()" class="text-blue-500 text-2xl md:hidden">&#9776;</button>
        <div class="font-bold text-blue-600 text-xl lg:text-4xl">LMS</div>

    </div>



    <div class="hidden md:flex space-x-10 ml-auto mr-5">
        <a href="#" class="nav-item">Home</a>
        <a href="#" class="nav-item">Courses</a>
        <a href="#" class="nav-item">Teachers</a>
        <a href="#" class="nav-item">Enrollments</a>
    </div>


    <div class="ml-auto md:ml-5 flex items-center space-x-3">
        <img src="{{ asset('images/2021-ARID-4583.png') }}" alt="Profile Picture" class="w-11 h-10 rounded-full border border-gray-300">
        <div class="flex flex-col">
            <span class="text-gray-600 font-semibold">{{ $username }}</span>


            @if ($a === 'dc')
                <span class="text-sm text-gray-400">DataCell Officer</span>
            @elseif ($a === 'ad')
                <span class="text-sm text-gray-400">Admin</span>
            @else
                <span class="text-sm text-gray-400">Role Not Defined</span>
            @endif
        </div>
    </div>

</div>


<div id="mobileMenu" class="hidden fixed inset-0 bg-white z-50 shadow-lg p-4 md:hidden min-h-screen">
    <button onclick="toggleMenu()" class="text-gray-500 text-2xl absolute top-4 right-4">✖</button>
    <div class="flex flex-col space-y-4 mt-10">
        <a href="#" class="block py-2 px-4 text-gray-600 font-semibold hover:bg-gray-100">Homee</a>
        <a href="#" class="block py-2 px-4 text-gray-600 font-semibold hover:bg-gray-100">Courses</a>
        <a href="#" class="block py-2 px-4 text-gray-600 font-semibold hover:bg-gray-100">Teachers</a>
        <a href="#" class="block py-2 px-4 text-gray-600 font-semibold hover:bg-gray-100">Enrollments</a>
    </div>
</div>

<script>
    function toggleMenu() {
        document.getElementById("mobileMenu").classList.toggle("hidden");
    }
</script>