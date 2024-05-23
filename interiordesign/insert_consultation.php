<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $consultantName = $_POST["fullName"];
    $consultantDate = $_POST["date"];
    $about = $_POST["about"];
    $consultantId = isset($_POST['consultantId']) ? $_POST['consultantId'] : 'Auto';

    // Check if ID is provided for updating
    if ($consultantId != 'Auto') {
        $id = $consultantId;
        // Update data in the consultations table
        $sql = "UPDATE consultations SET Names='$consultantName', Dates='$consultantDate', About='$about' WHERE Id=$id";
    } else {
        // Insert data into the consultations table
        $sql = "INSERT INTO consultations (Names, Dates, About) 
                VALUES ('$consultantName', '$consultantDate', '$about')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the consultations page
        if ($consultantId != 'Auto') {
            header('location:./?page=consultations&message=edit');
        } else {
            header('location:./?page=consultations&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
