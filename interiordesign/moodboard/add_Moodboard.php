<?php 
include_once("./connection/connection.php");

// Initialize variables to hold mood board data if editing
$moodBoardId = "Auto";
$name = "";
$description = "";
$imageURL = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $moodBoardId = $_GET['id'];
    // Fetch mood board data from the database
    $sql = "SELECT * FROM moodboard WHERE MoodBoardID = $moodBoardId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $name = $row['Name'];
        $description = $row['Description'];
        $imageURL = $row['ImageURL'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Mood Board' : 'Add New Mood Board'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Mood Boards</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Mood Board' : 'Add New Mood Board'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="moodBoardForm" action="insert_moodboard.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="moodBoardId">Mood Board ID:</label>
            <input type="text" id="moodBoardId" name="moodBoardId" class="form-control" value="<?php echo $moodBoardId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="imageURL">Image URL:</label>
            <input type="text" id="imageURL" name="imageURL" class="form-control" value="<?php echo $imageURL; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("moodBoardForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var name = document.getElementById("name").value.trim();
        var description = document.getElementById("description").value.trim();
        var imageURL = document.getElementById("imageURL").value.trim();

        // Validate name
        if (name === "") {
            alert("Name is required");
            isValid = false;
        }

        // Validate description
        if (description === "") {
            alert("Description is required");
            isValid = false;
        }

        // Validate imageURL
        if (imageURL === "") {
            alert("Image URL is required");
            isValid = false;
        }

        return isValid;
    }
</script>
