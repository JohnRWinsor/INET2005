<?php
$activePage = 'courses';
$pageName = 'Courses';
include("conn.php");

function getColumnNames($conn, $tableName)
{
    $colNames = array();

    $sql = 'SHOW COLUMNS FROM ' . $tableName; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $colNames[] = $data->Field;
        }
    }
    return $colNames;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href=".sections/style.css">
    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>


</head>

<body class="course-page">
    <?php include './sections/header.php';
    include './sections/nav.php';
    ?>
    <div class="card" style="width: 400px;">
        <form method="post" action="add_record.php">
            <div class="card-body">
                <h5 class="card-title" id="courseName">Add Program</h5>
                <label class="form-label" for="programCode">Code</label>
                <input class="form-control" type="text" name="programCode" id="program-code" size="4" maxlength="4" minlength="4" required>
                <label class="form-label" for="programTitle">Title</label>
                <input class="form-control" type="text" name="programTitle" id="program-title" required>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="btnSubmit" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <?php
    $programs = array();
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    $cols = getColumnNames($conn, "Program");

    $sql = 'SELECT ProgramId, Code, Title FROM NSCCSchedule.Program'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            array_push($programs, $data);
        }
        $conn->close();
    }

    // cols: ProgramId, Code, Title
    $col1 = 'ProgramId';
    $col2 = 'Code';
    $col3 = "Title";
    echo "<table border='1'><tr><th>" . $cols[0] . "</th><th>" . $cols[1] . "</th><th>" . $cols[2] . "</th><th>Actions</th></tr>";
    foreach ($programs as $c) {
        echo "<tr><td>$c->ProgramId</td><td>$c->Code</td><td>$c->Title</td><td>".
        "<form action='edit_program.php' method='get'>".
        "<input type=hidden name=id value=$c->ProgramId>".
        "<button class='btn btn-warning' type=submit >Edit</button>".
        "</form>".
        "<form action='delete_record.php' method='get'>".
        "<input type=hidden name=id value=$c->ProgramId>".
        "<button class='btn btn-danger' type=submit >Delete</button>".
        "</form>".
        "</td></tr>";
    }
    echo "</table>"

    ?>

    <?php
    include './sections/footer.php'
    ?>

    <script>
        const progCode = document.getElementById("program-code");
        progCode.addEventListener("focusout", function(evt) {
            // console.log("Key was pressed: ",evt.target.value);
            evt.target.value = evt.target.value.toUpperCase();
            checkCode(evt.target.value);
        });

        function checkCode(val) {
            if (/[A-Z]{4}/.test(val)) {
                console.log("Looks good!");
                progCode.classList.remove("is-invalid");
            } else {
                console.log("Wrong length!");
                progCode.classList.add("is-invalid");
            }
        }
    </script>
</body>

</html>