<<<<<<< HEAD
<?php
include("conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Output $_POST data for debugging
    var_dump($_POST);

    // Set parameters and execute
    $code = $_POST["programCode"];
    $program = $_POST["programTitle"];
    $programId = $_POST["ProgramId"];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE NSCCSchedule.Program SET Code = ?, Title = ? WHERE ProgramId = ?");
    $stmt->bind_param("ssi", $code, $program, $programId);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        echo "Query executed successfully.";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    echo "<p>Record updated successfully.</p>";
    echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
} else {
    echo "No record ID specified for update.";
    echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
}
=======
<?php
include("conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Output $_POST data for debugging
    var_dump($_POST);

    // Set parameters and execute
    $code = $_POST["programCode"];
    $program = $_POST["programTitle"];
    $programId = $_POST["ProgramId"];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE NSCCSchedule.Program SET Code = ?, Title = ? WHERE ProgramId = ?");
    $stmt->bind_param("ssi", $code, $program, $programId);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        echo "Query executed successfully.";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    echo "<p>Record updated successfully.</p>";
    echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
} else {
    echo "No record ID specified for update.";
    echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
}
>>>>>>> ff4bc40315ca16dd861a563f88dae83fc389895b
?>