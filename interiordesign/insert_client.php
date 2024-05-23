<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $clientName = $_POST["fullName"];
    $clientEmail = $_POST["email"];
    $clientPassword = $_POST["password"];

    // Check if ID is provided for updating
    if ($_POST['clientId'] != 'Auto') {
        $id = $_POST['clientId'];
        // Update data in the clients table
        $sql = "UPDATE clients SET Names='$clientName', Email='$clientEmail', Password='$clientPassword' WHERE id=$id";
    } else {
        // Insert data into the clients table
        $sql = "INSERT INTO clients (Names, Email, Password) VALUES ('$clientName', '$clientEmail', '$clientPassword')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the clients page
        if ($_POST['clientId'] != 'Auto') {
            header('location:./?page=clients&message=edit');
        } else {
            header('location:./?page=clients&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
