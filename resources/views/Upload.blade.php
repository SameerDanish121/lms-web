<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Timetable</title>
    @vite('resources/css/app.css')
    <style>
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
        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const timetableData = [
                {
                    section: "BCS 7A",
                    schedule: [
                        { time: "8:30 - 9:30", Monday: "Math (Dr. A) - R101", Tuesday: "", Wednesday: "Physics - R202", Thursday: "Chemistry - R303", Friday: "English - R404" },
                        { time: "10:30 - 11:30", Monday: "", Tuesday: "Biology - R105", Wednesday: "", Thursday: "", Friday: "History - R106" },
                        { time: "2:00 - 3:00", Monday: "CS - R201", Tuesday: "Math - R101", Wednesday: "", Thursday: "", Friday: "" },
                    ]
                },
                {
                    section: "BCS 7B",
                    schedule: [
                        { time: "8:30 - 9:30", Monday: "English - R404", Tuesday: "", Wednesday: "Physics - R202", Thursday: "", Friday: "CS - R201" },
                        { time: "10:30 - 11:30", Monday: "Math - R101", Tuesday: "", Wednesday: "", Thursday: "History - R106", Friday: "" },
                        { time: "2:00 - 3:00", Monday: "", Tuesday: "CS - R201", Wednesday: "", Thursday: "Math - R101", Friday: "" },
                    ]
                },
                {
                    section: "BCS 7C",
                    schedule: [
                        { time: "8:30 - 9:30", Monday: "Physics - R202", Tuesday: "", Wednesday: "Math - R101", Thursday: "", Friday: "English - R404" },
                        { time: "10:30 - 11:30", Monday: "", Tuesday: "Chemistry - R303", Wednesday: "", Thursday: "CS - R201", Friday: "" },
                        { time: "2:00 - 3:00", Monday: "History - R106", Tuesday: "", Wednesday: "Math - R101", Thursday: "", Friday: "Physics - R202" },
                    ]
                }
            ];

            const container = document.getElementById("timetableContainer");

            timetableData.forEach(({ section, schedule }) => {
                const tableHTML = `
                    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Class Timetable - ${section}</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse border border-gray-300 text-gray-700">
                                <thead>
                                    <tr class="bg-blue-500 text-white">
                                        <th class="border border-gray-300 p-2 w-[120px] h-[50px]">Time</th>
                                        <th class="border border-gray-300 p-2 w-[180px] h-[50px]">Monday</th>
                                        <th class="border border-gray-300 p-2 w-[180px] h-[50px]">Tuesday</th>
                                        <th class="border border-gray-300 p-2 w-[180px] h-[50px]">Wednesday</th>
                                        <th class="border border-gray-300 p-2 w-[180px] h-[50px]">Thursday</th>
                                        <th class="border border-gray-300 p-2 w-[180px] h-[50px]">Friday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${schedule.map(row => `
                                        <tr>
                                            <td class="border p-2 text-center w-[120px] h-[50px]">${row.time}</td>
                                            <td class="border p-2 text-center w-[180px] h-[50px]">${row.Monday}</td>
                                            <td class="border p-2 text-center w-[180px] h-[50px]">${row.Tuesday}</td>
                                            <td class="border p-2 text-center w-[180px] h-[50px]">${row.Wednesday}</td>
                                            <td class="border p-2 text-center w-[180px] h-[50px]">${row.Thursday}</td>
                                            <td class="border p-2 text-center w-[180px] h-[50px]">${row.Friday}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
                container.innerHTML += tableHTML;
            });
        });
    </script>
</head>

        <body class="bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 min-h-screen p-0 m-0">
            @include('components.navbar', ['username' => ' M Sharjeel', 'profileImage' => 'images/2021-ARID-4583.png', 'a'=>'ad'])


    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6 text-center">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Upload Timetable</h2>


        <div class="flex justify-center space-x-4 ">

            <label for="timetableUpload" class=" btn cursor-pointer bg-orange-500 text-white w-64 py-3 rounded-lg hover:bg-orange transition text-center">
                Select File
            </label>
            <input type="file" id="timetableUpload" class="hidden" accept="image/*, application/pdf, .xls, .xlsx">


            <button id="submitButton" class="btn bg-blue-500 text-white w-64 py-3 rounded-lg hover:bg-blue transition" disabled>
                Submit
            </button>
        </div>


        <p id="fileNameDisplay" class="text-gray-600 mt-4"></p>
    </div>




    <div id="timetableContainer"></div>
    <footer class="bg-blue-600 p-2 mt-20 shadow-md text-center">
        <h4 class=" font-bold text-2xl mb-4 mt-4 text-white">Learning Management System</h4>
        <p class="text-white text-1xl">&copy; 2025 LMS. All Rights Reserved.</p>
        <p class="text-white text-1xl">Sameer  |  Ali  | Sharjeel</p>
    </footer>
</body>
<script>
        document.getElementById("timetableUpload").addEventListener("change", function () {
        let file = this.files[0];
        let fileNameDisplay = document.getElementById("fileNameDisplay");

        if (file) {
            fileNameDisplay.textContent = "Selected File: " + file.name;
            document.getElementById("submitButton").disabled = false; // Enable Submit Button
        }
    });

    document.getElementById("submitButton").addEventListener("click", function () {
        alert("Submitted");
    });
</script>
</html>