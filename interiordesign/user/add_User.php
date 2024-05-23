<?php 
include_once("./connection/connection.php");

// Initialize variables to hold user data if editing
$userId = "Auto";
$fullName = "";
$email = "";
$gender = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    // Fetch user data from the database
    $sql = "SELECT * FROM `user` WHERE Id = $userId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['Names'];
        $email = $row['Email'];
        $gender = $row['Gender'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit User' : 'Add New User'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Users</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit User' : 'Add New User'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="userForm" action="insert_user.php" method="POST">
        <div class="form-group">
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" class="form-control" value="<?php echo $userId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $fullName; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("userForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var fullName = document.getElementById("fullName").value.trim();
        var email = document.getElementById("email").value.trim();

        // Validate full name
        if (fullName === "") {
            alert("Full Name is required");
            isValid = false;
        }

        // Validate email
        if (email === "") {
            alert("Email is required");
            isValid = false;
        }

        return isValid;
    }
</script>
