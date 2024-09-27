<?php
$request = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');
$segments = explode('/', $path);

// Handle the route
switch ($segments[0]) {
   case 'week':
      if (isset($segments[1])) {
         $weekId = $segments[1];
         include 'week.php';
      } else {

      }
      break;
   default:
      break;
}
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Logbook - Homepage</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="This is meta description">
   <meta name="author" content="Themefisher">

   <!-- theme meta -->
   <meta name="theme-name" content="logbook" />

   <!-- plugins -->
   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2"
      style="font-display: optional;">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet">

   <link rel="stylesheet" href="styles.css">
</head>

<body class="font-google">
   <!-- navigation -->
   <header class=" bg-white py-6 items-center flex justify-center fixed w-screen shadow-lg">
      <p class="text-3xl font-semibold pb-3 items-center ">E - Students Industrial Work Experience Logbook</p>
   </header>

   <div class=" flex flex-row-reverse justify-between pt-36 items-center px-7">

      <div class=" px-7">
         <img src="./images/Lasu_logo.jpg" alt="" class=" w-[25rem]">

      </div>


      <div class="nav-button text-white pl-9 flex flex-col">
         <!-- Register Dropdown -->
         <div class="relative inline-block text-left">
            <button type="button"
               class=" text-white no-underline bg-gray-700 py-4 rounded-lg mb-4 hover:bg-gray-500 px-36 text-lg flex items-center"
               onclick="document.getElementById('register-dropdown').classList.toggle('hidden');">
               Register <i class="fa-solid fa-caret-down pl-3"></i>
            </button>
            <ul class="absolute right-0 z-10 w-[24rem] rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5  hidden divide-y divide-gray-100"
               id="register-dropdown">
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100"
                     href="./register?type=student">Student</a>
               </li>
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100"
                     href="./register?type=supervisor">Supervisor</a>
               </li>
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100"
                     href=" ">Admin</a>
               </li>
            </ul>
         </div>

         <!-- Login Dropdown -->
         <div class="relative inline-block text-left mt-12">
            <button type="button"
               class="bg-purple-600 hover:bg-purple-500 py-4 rounded-lg mb-4 px-[9.7rem] text-lg flex items-center"
               onclick="document.getElementById('login-dropdown').classList.toggle('hidden');">
               Login <i class="fa-solid fa-caret-down pl-3"></i>
            </button>
            <ul class="absolute right-0 z-10 w-[24rem] rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5  hidden divide-y divide-gray-100"
               id="login-dropdown">
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100" href="./login">Student</a>
               </li>
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100"
                     href="./supervisor_login">Supervisor</a>
               </li>
               <li>
                  <a class="text-black block px-4 py-2 text-sm hover:bg-gray-100"
                     href="./admin_login ">Admin</a>
               </li>
            </ul>
         </div>

         <div class=" flex justify-between mt-24">
            <a href="https://lasu.edu.ng/home/" class=" underline text-blue-900">About Lasu</a>
            <a href="https://siwes.itf.gov.ng/Identity/LandingPage/siwes" class=" text-blue-900 underline">About SIWES
</a>
         </div>

      </div>


</div>



      <!-- JS Plugins -->
      <script src="plugins/jQuery/jquery.min.js"></script>
      <!-- <script src="plugins/slick/slick.min.js"></script> -->

      <!-- Main Script -->
      <script src="js/script.js"></script>

</body>

</html>