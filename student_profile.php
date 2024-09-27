<?php
session_start();
if (!isset($_SESSION["matric_no"])) {
    // If user is not logged in, redirect to login page
    header("location: login.php");
    exit();
}

include_once "conn.php";

// Fetch student details using matric number stored in session
$matricnumber = $_SESSION["matric_no"];
$stmt = $conn->prepare("SELECT first_name, last_name, middle_name, matric_number, name_of_company, address FROM users WHERE matric_number = ?");
$stmt->bind_param("i", $matricnumber);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($first_name, $last_name, $middle_name, $matric_no, $name_of_company, $address);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="font-google">
<header class=" bg-white py-6 items-center flex justify-between fixed w-screen shadow-lg">
        <a href=""></a>
        <p class="text-3xl font-semibold pb-3 items-center text-center">E - Students Industrial Work Experience Logbook (Student)
        </p>
        <div class=" relative inline-block mr-7">
            <img src="./images/person.png" alt="" class=" w-12 hover:cursor-pointer "
                onclick="document.getElementById('dropdown').classList.toggle('hidden');">
            <ul class=" absolute right-0 z-10 w-[50rem] rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden divide-y divide-gray-100"
                id="dropdown">
                <li><a href="student_profile.php" class=" block text-black px-4 py-2">Profile</a></li>
                <li><a href="./student_announcement.php" class=" block text-black px-4 py-2">View Announcements</a></li>
                <li><a href="./logout" class=" block text-black px-4 py-2">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="container flex justify-center pt-36">
     
           
            <div class=" formm flex flex-col bg-white w-[35rem] px-16 py-5  border border-gray-200 rounded-lg">
                <h1 class="text-xl font-bold text-center pb-5">Student Profile</h1>
                
                <div class="profile-details">
                    <p class=" pb-3"><strong>First Name:</strong> <span class=" pl-4"> <?php echo $first_name; ?> </span></p>
                    <p class=" pb-3"><strong>Last Name:</strong> <span class=" pl-4"><?php echo $last_name; ?></span></p>
                    <p class=" pb-3"><strong>Middle Name:</strong> <span class=" pl-4"><?php echo !empty($middle_name) ? $middle_name : 'N/A'; ?></span></p>
                    <p class=" pb-3"><strong>Matric Number:</strong> <span class=" pl-4"><?php echo $matric_no; ?></span></p>
                    <p class=" pb-3"><strong>Company Name:</strong> <span class=" pl-4"><?php echo $name_of_company; ?></span></p>
                    <p class=" pb-3"><strong>Company Address:</strong> <span class=" pl-4"> <?php echo !empty($address) ? $address : 'N/A'; ?> </span></p>
                </div>

           
            </div>
     
    </div>
</body>

</html>
