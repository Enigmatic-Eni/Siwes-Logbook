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

    <div class=" flex justify-center items-center">
        <div class="pt-36 flex flex-col justify-center items-center">
            <div>
        <h1 class=" text-xl font-bold">Post an Announcement</h1>
        </div>
        <div class=" bg-white shadow-lg flex flex-col px-16 " style=" width: 200%;">
            <input type="text" class=" border-gray-400 border-2 h-16">
            <button>Post</button>
        </div>
    </div>
    </div>

    </body>
    </html>