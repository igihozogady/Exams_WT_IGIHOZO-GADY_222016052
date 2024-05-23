<?php 
include_once("./connection/connection.php");

// Initialize variables to hold client data if editing
$clientId = "Auto";
$fullName = "";
$email = "";
$password = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $clientId = $_GET['id'];
    // Fetch client data from the database
    $sql = "SELECT * FROM clients WHERE id = $clientId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['Names'];
        $email = $row['Email'];
        $password = $row['Password'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Client' : 'Add New Client'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Clients</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Client' : 'Add New Client'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="clientForm" action="insert_client.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="clientId">Client ID:</label>
            <input type="text" id="clientId" name="clientId" class="form-control" value="<?php echo $clientId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $fullName; ?>">
            <div id="fullNameError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <div id="emailError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <div id="passwordError" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("clientForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var fullName = document.getElementById("fullName").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value.trim();

        // Validate full name
        if (fullName === "") {
            document.getElementById("fullNameError").innerText = "Full Name is required";
            document.getElementById("fullName").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("fullNameError").innerText = "";
            document.getElementById("fullName").style.borderColor = "";
        }

        // Validate email
        if (email === "") {
            document.getElementById("emailError").innerText = "Email is required";
            document.getElementById("email").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("emailError").innerText = "";
            document.getElementById("email").style.borderColor = "";
        }

        // Validate password
        if (password === "") {
            document.getElementById("passwordError").innerText = "Password is required";
            document.getElementById("password").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("passwordError").innerText = "";
            document.getElementById("password").style.borderColor = "";
        }

        return isValid;
    }
</script>
