<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $description = $_POST["description"];
    $imageURL = $_POST["imageURL"];

    // Check if ID is provided for updating
    if ($_POST['moodBoardId'] != 'Auto') {
        $id = $_POST['moodBoardId'];
        // Update data in the moodboard table
        $sql = "UPDATE moodboard SET Name='$name', Description='$description', ImageURL='$imageURL' WHERE MoodBoardID=$id";
    } else {
        // Insert data into the moodboard table
        $sql = "INSERT INTO moodboard (Name, Description, ImageURL) 
                VALUES ('$name', '$description', '$imageURL')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the moodboard page
        if ($_POST['moodBoardId'] != 'Auto') {
            header('location:./?page=moodboard&message=edit');
        } else {
            header('location:./?page=moodboard&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
