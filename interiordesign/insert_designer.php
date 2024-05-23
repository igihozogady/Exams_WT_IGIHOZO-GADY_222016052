<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $designerName = $_POST["fullName"];
    $designerEmail = $_POST["email"];
    $designerPassword = $_POST["password"];
    $speciality = $_POST["speciality"];

    // Check if ID is provided for updating
    if ($_POST['designerId'] != 'Auto') {
        $id = $_POST['designerId'];
        // Update data in the designers table
        $sql = "UPDATE designers SET Names='$designerName', Email='$designerEmail', Password='$designerPassword', Speciality='$speciality' WHERE Id=$id";
    } else {
        // Insert data into the designers table
        $sql = "INSERT INTO designers (Names, Email, Password, Speciality) 
                VALUES ('$designerName', '$designerEmail', '$designerPassword', '$speciality')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the designers page
        if ($_POST['designerId'] != 'Auto') {
            header('location:./?page=designer&message=edit');
        } else {
            header('location:./?page=designer&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
