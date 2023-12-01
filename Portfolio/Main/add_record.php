<<<<<<< HEAD
<?php
include("conn.php");
// TODO
// - Determine parameters for get in URL or could use POST?
// - Validate the data server side
// - Run the add query
// - Display the results or return back to addPrograms.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Program (Code, Title) VALUES (?, ?)");
        $stmt->bind_param("ss", $code, $program);

        // set parameters and execute
        $code = $_POST["programCode"];
        $program = $_POST["programTitle"];
        $stmt->execute();
        $conn->close();
        echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
    }
=======
<?php
include("conn.php");
// TODO
// - Determine parameters for get in URL or could use POST?
// - Validate the data server side
// - Run the add query
// - Display the results or return back to addPrograms.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Program (Code, Title) VALUES (?, ?)");
        $stmt->bind_param("ss", $code, $program);

        // set parameters and execute
        $code = $_POST["programCode"];
        $program = $_POST["programTitle"];
        $stmt->execute();
        $conn->close();
        echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";
    }
>>>>>>> ff4bc40315ca16dd861a563f88dae83fc389895b
