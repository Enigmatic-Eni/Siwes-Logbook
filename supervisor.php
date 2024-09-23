<?php
    include("supervisor_auth.php");
    require_once 'conn.php';    

    $pf = $_SESSION["pf_number"];

if (isset($_GET['matric_no'])) {
    $matric_no = $_GET['matric_no'];

    $stmt = $conn->prepare("SELECT * FROM weekly_report WHERE matric_number = ?");
    
    if ($stmt == false) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("i", $matric_no);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
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
   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
   <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

   <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
   <link rel="stylesheet" href="plugins/slick/slick.css">
   <link rel="stylesheet" href="supervisor.css">

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="style.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">

   <style>
        .form-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
        }

        h5 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        textarea, select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        #s-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #commentSection {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fafafa;
            display: none; /* Initially hide the comment section */
        }

        #commentDisplay {
            margin: 0;
            color: #333;
        }
   </style>
</head>
</head>
<body>
    <header class="sticky-top bg-white border-bottom border-default">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand" href="">
                <img class="lasu-logo" width="75px" height="75px" src="Lasu_logo.jpg" alt="LogBook">
            </a> <h4>Student Industrial Work Experience Scheme Logbook</h4>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-menu"></i>
            </button>
            <div class="nav-button">
                <button onclick="location.href='index'">Home</button>
                <button onclick="location.href='logout'">Logout</button>
            </div>

            </div>
        </nav>
    </div>
    </header>

    <div class="report-container">
        <h4>
            Check Student Report
        </h4>
        <h6>Student matric number</h6>
        <form action="" method="GET" >
            <label for="matric_no">Matric No</label>
            <input type="text" name="matric_no" id="matric_no" required minlength="8">
            <button class="fetch-report" >Fetch Report</button>
        </form>

        <div class="table-container">
    <?php
        if (isset($_GET['matric_no']) AND $result->num_rows > 0):
    ?>
    <table id="myTable" border="2" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;margin-top:10px;">
        <thead style="background-color: #f2f2f2; color: #333; font-weight: bold;">
            <tr>
                <th style="padding: 8px; border: 1px solid #ddd;">Week</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Monday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Tuesday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Wednesday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Thursday</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Friday</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['week_id']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['monday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['tuesday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['wednesday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['thursday']) . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['friday']) . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="form-container">
        <h5>Submit a comment about this report</h5>
        <form id="commentForm"
            action="comment.php"
            method="POST"
            style="margin-top: 10px;"
        >
            <input type="hidden" name="matric_no" value="<?php echo $matric_no; ?>">
            <div>
                <label for="week">Select Week</label>
                <select name="week" id="week" style="width: 100%; padding: 5px;">
                    <?php 
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='$i'>Week $i</option>";
                        }
                    ?>
                </select>
            </div>
            <div>      
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
            </div>
            <br>
            <button id="s-btn">submit</button>
        </form>
    </div>
    <?php endif; ?>
</div>
</body>
</html>