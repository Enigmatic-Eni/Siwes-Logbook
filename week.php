<?php

include ("student_auth.php");
require_once "conn.php";
$week_id;
$matric_no = $_SESSION["matric_no"];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $week_id = $id;
} else {
    echo "No ID parameter provided.";
    $week_id = null;
    header("location: index"); 
    exit();
}

if ($week_id < 1 OR $week_id > 18) {
    header("location: index");
    exit();
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM weekly_report WHERE matric_number = ? AND week_id = ?");
$stmt->bind_param("ii", $matric_no, $week_id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    $stmt = $conn->prepare("INSERT INTO weekly_report (week_id, matric_number) VALUES (?, ?)");
    $stmt->bind_param("ii", $week_id, $matric_no);
    $stmt->execute();
    $stmt->close();
} 

$stmt = $conn->prepare("SELECT monday, tuesday, wednesday, thursday, friday FROM weekly_report WHERE week_id = ? AND matric_number = ?");
$stmt->bind_param("ii", $week_id, $matric_no);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

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

    <!-- theme meta -->
    <meta name="theme-name" content="logbook" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="./week.css">

</head>

<body class=" font-google">
<header class=" bg-white py-6 items-center flex justify-between fixed w-screen shadow-lg">
        <a href=""></a>
        <p class="text-3xl font-semibold pb-3 items-center text-center text-black">E - Students Industrial Work Experience Logbook
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
    <div class=" pt-36">
    <h3 class=" text-lg font-semibold mb-6 text-center">Student Weekly Report</h3>
   
    <div class="table-container">
        <table id=myTable>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Summary Of Work Done</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Monday</p>
                    </td>
                    <td>
                <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=monday&matric_no=<?php echo $matric_no; ?>">
                        <div style="display: flex; gap: 10px;">
                            <textarea id="monday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""   <?php if ($row["monday"] != ''){ ?> readonly <?php   } ?> name="monday">
                                <?php echo trim($row["monday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class=" bg-blue-400 text-white"
                            <?php if ($row["monday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Tuesday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=tuesday&matric_no=<?php echo $matric_no; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="tuesday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""  <?php if ( $row["tuesday"] != ""){ ?> readonly <?php   } ?> name="tuesday">
                                <?php echo trim($row["tuesday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-blue-400 text-white"
                            <?php if ($row["tuesday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Wednesday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=wednesday&matric_no=<?php echo $matric_no; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="wednesday" class="report" style="border: 1px solid black; border-radius: 5px; padding: 10px;"
                                placeholder=""  <?php if ($row["wednesday"] != ''){ ?> readonly <?php   } ?>  name="wednesday">
                                <?php echo trim($row["wednesday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-blue-400 text-white"
                            <?php if ($row["wednesday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Thursday</p>
                    </td>
                    <td>

                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=thursday&matric_no=<?php echo $matric_no; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="thursday" class="report" style="border: 1px solid black; border-radius: 5px;" 
                            rows="3"
                            <?php if ($row["thursday"] != ''){ ?> readonly <?php   } ?>
                                placeholder="" name="thursday"
                                >
                                <?php echo trim($row["thursday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-blue-400 text-white"
                            <?php if ($row["thursday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="" style="font-weight: bold; font-size: 15px;"> Friday</p>
                    </td>
                    <td>
                
                    <form method="POST" action="process_week.php?week_id=<?php echo $week_id; ?>&day=friday&matric_no=<?php echo $matric_no; ?>">
                    <div style="display: flex; gap: 10px;">
                            <textarea id="friday" class="report" style="border: 1px solid black; border-radius: 5px; text-align: left;" 
                            rows="3"
                                placeholder="" name="friday"
                                <?php if ($row["friday"] != ''){ ?> readonly <?php   } ?>
                                >
                                <?php echo trim($row["friday"]) ?>
                            </textarea>
                            <button style="margin: 0; padding: 5px 10px; border-radius: 5px;" name="submit" class="bg-blue-400 text-white"
                            <?php if ($row["friday"] != ''){ ?> disabled <?php   } ?>
                            >save</button>
                        </div>
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>
