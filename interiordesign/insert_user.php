<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    // Check if ID is provided for updating
    if ($_POST['userId'] != 'Auto') {
        $id = $_POST['userId'];
        // Update data in the user table
        $sql = "UPDATE `user` SET Names='$fullName', Email='$email', Gender='$gender', Password='$password' WHERE Id=$id";
    } else {
        // Insert data into the user table
        $sql = "INSERT INTO `user` (Names, Email, Gender, Password) 
                VALUES ('$fullName', '$email', '$gender', '$password')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the user page
        if ($_POST['userId'] != 'Auto') {
            header('location:./?page=user&message=edit');
        } else {
            header('location:./?page=user&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
