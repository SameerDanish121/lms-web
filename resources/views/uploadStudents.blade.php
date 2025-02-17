<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Student Enrollment</title>

    @vite('resources/css/app.css')
    <style>
        .btn {
            transition: transform 0.3s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 min-h-screen p-0 m-0">
    @include('components.navbar', ['username' => ' M Sharjeel', 'profileImage' => 'images/2021-ARID-4583.png', 'a'=>'dc'])

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6 text-center">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Upload Student Enrollment File</h2>
        <div class="flex justify-center space-x-4">
            <label for="fileUpload" class="btn cursor-pointer bg-orange-500 text-white w-64 py-3 rounded-lg hover:bg-orange transition text-center">
                Select File
            </label>
            <input type="file" id="fileUpload" class="hidden" accept=".pdf, .xls, .xlsx">
            <button id="submitButton" class="btn bg-blue-500 text-white w-64 py-3 rounded-lg hover:bg-blue transition" disabled>
                Submit
            </button>
        </div>
        <p id="fileNameDisplay" class="text-gray-600 mt-4"></p>
    </div>

    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Student Enrollment Information</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-gray-700">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="border border-gray-300 p-2">Reg No</th>
                        <th class="border border-gray-300 p-2">Student Name</th>
                        <th class="border border-gray-300 p-2">Enrollment Course</th>
                        <th class="border border-gray-300 p-2">Section</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody"></tbody>
            </table>
        </div>
    </div>



    <footer class="bg-blue-600 p-2 mt-20 shadow-md text-center text-white">
        <h4 class="font-bold text-2xl mb-4 mt-4">Learning Management System</h4>
        <p>&copy; 2025 LMS. All Rights Reserved.</p>
        <p>Sameer | Ali | Sharjeel</p>
    </footer>

    <script>
        document.getElementById("fileUpload").addEventListener("change", function () {
            let file = this.files[0];
            let fileNameDisplay = document.getElementById("fileNameDisplay");
            if (file) {
                fileNameDisplay.textContent = "Selected File: " + file.name;
                document.getElementById("submitButton").disabled = false;
            }
        });
        let students = [
            { regNo: '2021-Arid-4538', name: 'Amir Sahab', courses: ['CS101', 'CS102'], section: 'A' },
            { regNo: '2021-Arid-4538', name: 'Amir Sahab', courses: ['SE101', 'SE102'], section: 'B' },
            { regNo: '2021-Arid-4538', name: 'CH G', courses: ['CS201', 'CS202', 'CS203'], section: 'A' },
            { regNo: '2021-Arid-4538', name: 'CH G', courses: ['IT101', 'IT102'], section: 'C' },
            { regNo: '2021-Arid-4538', name: 'Bhatti G', courses: ['DS101', 'DS102'], section: 'B' }
        ];

        let tableBody = document.getElementById("studentTableBody");
        students.forEach(student => {
            student.courses.forEach(course => {
                let row = `<tr class="text-center">
                    <td class="border p-2">${student.regNo}</td>
                    <td class="border p-2">${student.name}</td>
                    <td class="border p-2">${course}</td>
                    <td class="border p-2">${student.section}</td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        });

        document.getElementById("submitButton").addEventListener("click", function () {
            alert("Submitted Successfully");
        });
    </script>
</body>
</html>