<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    @vite('resources/css/app.css')

    <style>
        /* Laptop view: Larger table & text */
        @media (min-width: 1024px) {
            table {
                font-size: 18px;
                width: 98%;
            }
            th, td {
                padding: 12px;
            }
        }

        /* Mobile view: Fixed width, prevent content overflow */
        @media (max-width: 768px) {
            .table-container {
                width: 100%;
                overflow-x: auto;
            }
            table {
                width: 100%;
                font-size: 14px;
                min-width: 600px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    @include('components.navbar', ['username' => 'Sharjeel', 'profileImage' => 'images/2021-ARID-4583.png','a'=>'dp'])

    <!-- Course List -->
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-700 text-center mb-4">Course List</h2>

        <div class="table-container mx-auto">
            <table class="border border-gray-300 shadow-lg bg-white">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left italic">Id</th>
                        <th class="px-4 py-2 text-left italic">Course Name</th>
                        <th class="px-4 py-2 text-left italic">Course Code</th>
                        <th class="px-4 py-2 text-left italic">Pre Req</th>
                        <th class="px-4 py-2 text-left italic">Credit Hour</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $courses = [
    ['id' => 1, 'name' => 'Introduction to Computer Science', 'code' => 'CS101', 'prereq' => 'None', 'credit' => '3 (2-1)'],
    ['id' => 2, 'name' => 'Programming Fundamentals', 'code' => 'CS102', 'prereq' => 'CS101', 'credit' => '3 (2-1)'],
    ['id' => 3, 'name' => 'Object-Oriented Programming', 'code' => 'CS103', 'prereq' => 'CS102', 'credit' => '4 (3-1)'],
    ['id' => 4, 'name' => 'Data Structures', 'code' => 'CS104', 'prereq' => 'CS103', 'credit' => '3 (2-1)'],
    ['id' => 5, 'name' => 'Database Systems', 'code' => 'CS105', 'prereq' => 'CS104', 'credit' => '3 (2-1)'],
    ['id' => 6, 'name' => 'Computer Architecture', 'code' => 'CS106', 'prereq' => 'CS104', 'credit' => '3 (2-1)'],
    ['id' => 7, 'name' => 'Operating Systems', 'code' => 'CS107', 'prereq' => 'CS106', 'credit' => '3 (2-1)'],
    ['id' => 8, 'name' => 'Software Engineering', 'code' => 'CS108', 'prereq' => 'CS104', 'credit' => '3 (2-1)'],
    ['id' => 9, 'name' => 'Computer Networks', 'code' => 'CS109', 'prereq' => 'CS107', 'credit' => '3 (2-1)'],
    ['id' => 10, 'name' => 'Web Development', 'code' => 'CS110', 'prereq' => 'CS102', 'credit' => '3 (2-1)'],
    ['id' => 11, 'name' => 'Artificial Intelligence', 'code' => 'AI201', 'prereq' => 'CS109', 'credit' => '3 (2-1)'],
    ['id' => 12, 'name' => 'Machine Learning', 'code' => 'AI202', 'prereq' => 'AI201', 'credit' => '3 (2-1)'],

    ['id' => 30, 'name' => 'Quantum Computing', 'code' => 'CS120', 'prereq' => 'CS118', 'credit' => '3 (2-1)'],
];

                    @endphp

                    @foreach ($courses as $course)
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-2">{{ $course['id'] }}</td>
                            <td class="px-4 py-2">{{ $course['name'] }}</td>
                            <td class="px-4 py-2">{{ $course['code'] }}</td>
                            <td class="px-4 py-2">{{ $course['prereq'] }}</td>
                            <td class="px-4 py-2">{{ $course['credit'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>