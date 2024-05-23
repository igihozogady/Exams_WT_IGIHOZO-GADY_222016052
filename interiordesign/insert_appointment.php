<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullName = $_POST["fullName"];
    $date = $_POST["date"];
    $about = $_POST["about"];

    // Check if ID is provided for updating
    if ($_POST['appointmentId'] != 'Auto') {
        $id = $_POST['appointmentId'];
        // Update data in the appointment table
        $sql = "UPDATE appointment SET Names='$fullName', Date='$date', About='$about' WHERE Id=$id";
    } else {
        // Insert data into the appointment table
        $sql = "INSERT INTO appointment (Names, Date, About) 
                VALUES ('$fullName', '$date', '$about')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the appointment page
        if ($_POST['appointmentId'] != 'Auto') {
            header('location:./?page=appointment&message=edit');
        } else {
            header('location:./?page=appointment&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
