<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Admin Logbook - Homepage</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="This is meta description">
   <meta name="author" content="Themefisher">
 
   <!-- theme meta -->
   <meta name="theme-name" content="logbook" />

 
   <link rel="stylesheet" href="supervisor.css">

   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
</head>
<body class=" font-google">


    <header class=" bg-white py-6 items-center flex justify-between fixed w-screen shadow-lg">
        <a href=""></a>
        <p class="text-3xl font-semibold pb-3 items-center text-center text-black">E - Students Industrial Work Experience Logbook (Admin)
        </p>
        <div class=" relative inline-block mr-7">
            <img src="./images/person.png" alt="" class=" w-12 hover:cursor-pointer "
                onclick="document.getElementById('dropdown').classList.toggle('hidden');">
            <ul class=" absolute right-0 z-10 w-[50rem] rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100"
                id="dropdown">
                <li><a href=" " class=" block text-black px-4 py-2">Profile</a></li>
                <li><a href="./admin_dashboard.php" class=" block text-black px-4 py-2">Dashboard</a></li>
                <li><a href="./admin_announcement.php" class=" block text-black px-4 py-2">Post Announcement</a></li>
                <li><a href="./logout" class=" block text-black px-4 py-2">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class=" pt-24">
        <div class=" bg-slate-400 my-10 py-10 px-14 mx-8">
        <h4 class=" font-bold text-lg pb-4">
            Check Student Report
        </h4>
        <form action="" method="GET" class=" flex items-center">
            <div class=" items-center">
            <input type="text" name="matric_no" id="matric_no" required minlength="8" placeholder=" Enter Student Matric Number" class=" border-black border-2 py-2 rounded-md px-7 w-80 mb-4 mr-5">
            <button class=" w-48 bg-gray-700 py-3 text-white ml-3 rounded-lg hover:bg-gray-400" >Fetch Report</button>
            </div>
        </form>

        
        <div class="table-container">
 
    <table id="myTable" border="2" style="border-collapse: collapse; width: 100%; margin-top:10px;" class=" border-black">
        <thead style="background-color: #f2f2f2; color: #000; font-weight: bold;">
            <tr>
                <th style="padding: 8px; border: 1px solid #ddd;">Week</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Monday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Tuesday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Wednesday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Thursday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Friday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Supervisor's comment</th>
            </tr>
        </thead>
        <tbody class=" text-center">
            <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['week_id']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['monday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['tuesday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['wednesday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['thursday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['friday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['friday']) . "</td>";
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
