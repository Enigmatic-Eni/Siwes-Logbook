<?php
include("student_auth.php");
require_once "conn.php";

$matric_no = $_SESSION["matric_no"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-logbook</title>
    <meta charset="utf-8">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">

    <meta name="theme-name" content="logbook" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <!-- <link rel="stylesheet" href="dashboard.css"> -->
 
</head>

<body class=" font-google">
    <header class=" bg-white py-6 items-center flex justify-between fixed w-screen shadow-lg">
        <a href=""></a>
        <p class="text-3xl font-semibold pb-3 items-center text-center">E - Students Industrial Work Experience Logbook
        </p>
        <div class=" relative inline-block mr-7">
            <img src="./images/person.png" alt="" class=" w-12 hover:cursor-pointer "
                onclick="document.getElementById('dropdown').classList.toggle('hidden');">
            <ul class=" absolute right-0 z-10 w-20 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100"
                id="dropdown">
                <li><a href="" class=" block text-black px-4 py-2">Profile</a></li>
                <li><a href="./logout" class=" block text-black px-4 py-2">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class=" pt-36 px-10">
        <h3 class=" text-2xl font-semibold mb-6">Student Weekly Report</h3>
        <div class=" flex  ">
            <div class="weeks">
                <!-- <?php
                for ($i = 1; $i <= 18; $i++) {
                    echo "";
                }
                ?> -->
                <div class=" mr-20 w-36">
                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list').classList.toggle('hidden')">Month 1</div>
                    <ul id="week-list" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=1'>Week 1</a></li>
                        <li><a href='week?id=2'>Week 2</a></li>
                        <li><a href='week?id=3'>Week 3</a></li>
                        <li><a href='week?id=4'>Week 4</a></li>
                    </ul>
                </div>
                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list-2').classList.toggle('hidden')">Month 2</div>
                    <ul id="week-list-2" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=5' class=" ">Week 1</a></li>
                        <li><a href='week?id=6'>Week 2</a></li>
                        <li><a href='week?id=7'>Week 3</a></li>
                        <li><a href='week?id=8'>Week 4</a></li>
                    </ul>
                </div>

                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list-3').classList.toggle('hidden')">Month 3</div>
                    <ul id="week-list-3" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=9'>Week 1</a></li>
                        <li><a href='week?id=10'>Week 2</a></li>
                        <li><a href='week?id=11'>Week 3</a></li>
                        <li><a href='week?id=12'>Week 4</a></li>
                    </ul>
                </div>
                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list-4').classList.toggle('hidden')">Month 4</div>
                    <ul id="week-list-4" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=13'>Week 1</a></li>
                        <li><a href='week?id=14'>Week 2</a></li>
                        <li><a href='week?id=15'>Week 3</a></li>
                        <li><a href='week?id=16'>Week 4</a></li>
                    </ul>
                </div>
                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list-5').classList.toggle('hidden')">Month 5</div>
                    <ul id="week-list-5" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=17'>Week 1</a></li>
                        <li><a href='week?id=18'>Week 2</a></li>
                        <li><a href='week?id=19'>Week 3</a></li>
                        <li><a href='week?id=20'>Week 4</a></li>
                    </ul>
                </div>
                <div class=" pb-5">
                    <div class="cursor-pointer text-lg font-semibold py-4 bg-gray-200 rounded-lg text-black text-center" onclick="document.getElementById('week-list-6').classList.toggle('hidden')">Month 6</div>
                    <ul id="week-list-6" class="mt-2 right-0 z-10 w-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100 px-2 py-2">
                        <li><a href='week?id=21'>Week 1</a></li>
                        <li><a href='week?id=22'>Week 2</a></li>
                        <li><a href='week?id=23'>Week 3</a></li>
                        <li><a href='week?id=24'>Week 4</a></li>
                    </ul>
                </div>
                </div>
            </div>
       
             <div class="  border-gray-700 border mr-5">
            
             </div>
            <div class=" w-full">
                <h5>Comments</h5>
                <table border="2" style="border-collapse: collapse; width:80%">
                    <thead style="background-color: #f2f2f2; color: #333; font-weight: bold;">
                        <tr>
                            <th style="padding: 8px; border: 1px solid #ddd;">Week</th>
                            <th style="padding: 8px; border: 1px solid #ddd;">Comment</th>
                        </tr>
                    </thead>
                    <tbody class=" pl-3">
                        <?php
                        $stmt = $conn->prepare("SELECT week, comment FROM comments WHERE matric_number = ?");
                        $stmt->bind_param("i", $matric_no);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['week']) . "</td>";
                            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['comment']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>