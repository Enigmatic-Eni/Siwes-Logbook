<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

    <title>Siwes Logbook Login</title>
</head>

<body class=" font-google">
    <?php
    include_once "conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricnumber = $_POST['matric-number'];
        $password = $_POST['st-password'];

        if (empty($matricnumber) || empty($password)) {
            die("Matric number and password are required.");
        }

        $stmt = $conn->prepare("SELECT password_hash,id FROM users WHERE matric_number = ?");
        $stmt->bind_param("i", $matricnumber);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($password_hash, $id);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $_SESSION["matric_no"] = $matricnumber;
            header("location: dashboard");
            exit();
        } else {
            $login_err = "Invalid username or password.";
        }

        $stmt->close();
    }
    $conn->close();
    ?>
    <div class=" ">

        <?php echo (!empty($login_err)) ?
            '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $login_err . '</div>'
            : ''; ?>

        <div class=" flex items-center">

            <div>
                <img src="./Lasu_logo.jpg" alt="" class=" pl-9 w-[25rem]">
            </div>
            <div class=" formm  iflex flex-col bg-white shadow-lg w-[35rem] h-[34.2rem] px-16  ml-auto justify-end">
                <div>                
                    <p class="text-xl font-bold text-center pt-10 pb-7">Continue as Student</p>
                <form id="login-form" action="" method="POST" class=" flex flex-col">
                   
                        <input type="number" id="matric-number" name="matric-number" required placeholder=" Matric Number" e" required
                        class=" border-black border-2 py-2 rounded-md px-2 mb-7">
                 
                  
                        <input type="password" id="st-password" name="st-password" required placeholder=" Password" e" required
                        class=" border-black border-2 py-2 rounded-md px-2 mb-7">
                  

                    <a href="" class="forget-password underline text-blue-800 pb-9">
                        <p>Forgot password?</p>
                    </a>
                    <button type="submit" id="login" name="student-login" class=" bg-purple-600 hover:bg-purple-500 py-4 rounded-lg text-white">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>