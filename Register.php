<?php
include_once "conn.php";
$user_type;
if (isset($_GET['type'])) {
    $val = $_GET['type'];
    switch ($val) {
        case 'student':
            $user_type = 1;
            break;
        case 'supervisor':
            $user_type = 2;
            break;

        default:
            header("location: ./");
            exit();
    }
} else {
    header("location: ");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["student-reg"]) ) {
    $first_name = htmlspecialchars(trim($_POST["firstname"] ?? ''));
    $last_name = htmlspecialchars(trim($_POST["lastname"] ?? ''));
    $middle_name = htmlspecialchars(trim($_POST["middlename"] ?? ''));
    $matric_no = isset($_POST["matric-number"]) ? (int) $_POST["matric-number"] : 0;
    $password = $_POST["password"] ?? '';
    $name_of_company = htmlspecialchars(trim($_POST["name_of_company"] ?? ''));
    $address = htmlspecialchars(trim($_POST["address"] ?? ''));

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // echo "First Name: $first_name <br>";
    // echo "Last Name: $last_name <br>";
    // echo "Middle Name: $middle_name <br>";
    // echo "Matric Number: $matric_no <br>";
    // echo "Password: $hashed_password <br>";
    // echo "Name of Company: $name_of_company <br>";
    // echo "Address: $address <br>";
    // echo "User Type: $user_type <br>";

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE matric_number = ?");
    $stmt->bind_param("i", $matric_no);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, middle_name, matric_number, password_hash, name_of_company, address, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssisssi", $first_name, $last_name, $middle_name, $matric_no, $hashed_password, $name_of_company, $address, $user_type);
            if ($stmt->execute()) {
                echo "Registration successful!";
                sleep(1);
                header("location: login.php");
            } else {
                echo "Error: running statement ";
            }

        } else {
            echo "Error preparing statement: ";
        }

        $stmt->close();
    } else {
        $user_exists_err = "User with matric number <b> $matric_no </b> already exists.";
    }

} elseif (isset($_POST["supervisor-reg"])) {
    $first_name = htmlspecialchars(trim($_POST["firstname"] ?? ''));
    $last_name = htmlspecialchars(trim($_POST["lastname"] ?? ''));
    $middle_name = htmlspecialchars(trim($_POST["middlename"] ?? ''));
    $reg_no = isset($_POST["reg-number"]) ? (int) $_POST["reg-number"] : 0;
    $password = $_POST["password"] ?? '';

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM supervisors WHERE reg_number = ?");
    $stmt->bind_param("i", $reg_no);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        $stmt = $conn->prepare("INSERT INTO supervisors (first_name, last_name, middle_name, reg_number, password_hash, user_type) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssisi", $first_name, $last_name, $middle_name, $reg_no, $hashed_password, $user_type);
            if ($stmt->execute()) {
                echo "Registration successful!";
                sleep(1);
                header("location: supervisor_login");
            } else {
                echo "Error: running statement ";
            }

        } else {
            echo "Error preparing statement: ";
        }

        $stmt->close();
    } else {
        $supervisor_exists_err = "User with Registration number <b> $reg_no </b> already exists.";
    }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

</head>

<body class="font-google">
    <?php
        if ($user_type == 1):
        ?>
            <div class="container">
                <div>
                    <?php echo (!empty($user_exists_err)) ?
                        '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $user_exists_err . '</div>'
                        : ''; ?>
                </div>
        
                <div class=" flex items-center justify-end">
        
                    <div>
                        <img src="./images/Lasu_logo.jpg" alt="" class=" pl-4 w-[25rem]">
                    </div>
                    <div class=" formm flex flex-col bg-white shadow-lg w-[35rem] px-16 py-5 ml-auto justify-end">
                        <h1 class=" text-xl font-bold text-center pb-5">Create account</h1>
                        <form action="" method="post" class=" flex flex-col">
        
                            <input type="text" id="firstname" name="firstname" placeholder="First Name" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="text" id="lastname" name="lastname" placeholder="Last Name" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="text" id="middlename" name="middlename" placeholder="Middle Name (Optional)"
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="number" id="matric-number" name="matric-number" placeholder="Matric Number" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="password" id="password" name="password" placeholder="Password" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="text" id="name_of_company" name="name_of_company" placeholder="Company Name" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input id="address" name="address" placeholder="Company Address (Optional)"
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4" />
        
                            <button type="submit" class=" bg-gray-700 py-4 rounded-lg text-white mt-2" name="student-reg">Register</button>
                        </form>
                    </div>
        
                </div>
        
            </div>
            <?php elseif ($user_type == 2):  ?>
                <div class="container">
                <div>
                    <?php echo (!empty($supervisor_exists_err)) ?
                        '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $supervisor_exists_err . '</div>'
                        : ''; ?>
                </div>
        
                <div class=" flex items-center ">
        
                    <div>
                        <img src="./images/Lasu_logo.jpg" alt="" class=" pl-4 w-[25rem]">
                    </div>
                    <div class=" formm flex flex-col bg-white shadow-lg w-[35rem] py-12 h-[34.2rem] px-16  ml-auto justify-end">
                        <h1 class=" text-xl font-bold text-center pb-5">Create account</h1>
                        <form action="" method="post" class=" flex flex-col">
        
                            <input type="text" id="firstname" name="firstname" placeholder="First Name" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="text" id="lastname" name="lastname" placeholder="Last Name" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="text" id="middlename" name="middlename" placeholder="Middle Name (Optional)"
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="number" id="reg-number" name="reg-number" placeholder="Registration Number" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <input type="password" id="password" name="password" placeholder="Password" required
                                class=" border-black border-2 py-2 rounded-md px-2 mb-4">
        
                            <button type="submit" class=" bg-gray-700 py-4 rounded-lg text-white mt-2" name="supervisor-reg">Register</button>
                        </form>
                    </div>
        
                </div>
        
            </div>
            <?php endif; ?>
</body>

</html>