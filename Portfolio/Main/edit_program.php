<?php
$activePage = 'editprogram';
$pageName = 'Edit Program';
include("conn.php");

function getColumnNames($conn, $tableName)
{
    $colNames = array();

    $sql = 'SHOW COLUMNS FROM ' . $tableName;
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

<body>
    <?php include './sections/header.php';
    include './sections/nav.php';
    ?>
     < <div class="card" style="width: 400px;">
        <form method="post" action="update_record.php">
        
            <div class="card-body">
                <?php
                include("conn.php");
                // Check if the ID is set in the URL
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Attempt to establish a database connection
                    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data for the selected program
                    $stmt = $conn->prepare('SELECT ProgramId, Code, Title FROM NSCCSchedule.Program WHERE ProgramId = ?');
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->bind_result($programId, $code, $title);
                    $stmt->fetch();
                    $stmt->close();
                    $conn->close();

                    // Display the fetched data in the form fields
                    ?>
                    <input type="hidden" name="ProgramId" value="<?php echo $programId; ?>">
                    <h5 class="card-title" id="courseName">Edit Program</h5>
                    <label class="form-label" for="programCode">Code</label>
                    <input class="form-control" type="text" name="programCode" id="program-code" size="4" maxlength="4" minlength="4" value="<?php echo $code; ?>" required>
                    <label class="form-label" for="programTitle">Title</label>
                    <input class="form-control" type="text" name="programTitle" id="program-title" value="<?php echo $title; ?>" required>
                <?php
                } else {
                    // If no ID is specified, display the form for adding a new program
                    ?>
                    <h5 class="card-title" id="courseName">Add Program</h5>
                    <label class="form-label" for="programCode">Code</label>
                    <input class="form-control" type="text" name="programCode" id="program-code" size="4" maxlength="4" minlength="4" required>
                    <label class="form-label" for="programTitle">Title</label>
                    <input class="form-control" type="text" name="programTitle" id="program-title" required>
                
                    
                <?php
                }
                ?>
            </div>
            
            <div class="card-footer">
                <button class="btn btn-primary" id="btnSubmit" type="submit">Update</button>
            </div>

        </form>
    </div>


    <?php
    if (isset($_GET['id'])) { //Check to see if URL has id like ...php?id=###
        $id = $_GET['id'];

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare('SELECT ProgramId, Code, Title FROM NSCCSchedule.Program where ProgramId = ?');
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        echo $result;

        // if ($result = $conn->query($sql)) {
        //     while ($data = $result->fetch_object()) {
        //         array_push($programs, $data);
        //     }
        $conn->close();
        echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
    } else {
        echo "No record ID specified for update.";
        echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
    }


    ?>

    <?php
    include './sections/footer.php'
    ?>

<script>
    const progCode = document.getElementById("program-code");
    const progTitle = document.getElementById("program-title");

    progCode.addEventListener("focusout", function(evt) {
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
