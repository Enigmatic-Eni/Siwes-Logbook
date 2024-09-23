<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
    include_once "conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pf_no = $_POST['pf-number'];
        $password = $_POST['password'];

        if (empty($pf_no) || empty($password)) {
            die("PF number and password are required.");
        }

        $stmt = $conn->prepare("SELECT password_hash,id FROM supervisors WHERE pf_number = ?");
        $stmt->bind_param("i", $pf_no);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($password_hash, $id);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $_SESSION["pf_number"] = $pf_no;
            header("location: supervisor");
            exit();
        } else {
            $login_err = "Invalid username or password.";
        }

        $stmt->close();
    }
    $conn->close();
    ?>
    <div class="login-container supervisor-login">
    <?php echo (!empty($login_err)) ?
            '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $login_err . '</div>'
            : ''; ?>
        <h2> Supervisor Login</h2>
        <form id="supervisor-login" method="POST">
            <div class="form-group">
                <label for="pf-number">PF-Number</label>
                <input type="number" id="pf-number" name="pf-number"  required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="" class="forget-password"><p>Forgot password?</p></a>
            <button type="submit">Login</button>
        </form>
    </div> 
   
</body>
</html>