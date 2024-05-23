<?php 
include_once("./connection/connection.php");

// Initialize variables to hold appointment data if editing
$appointmentId = "Auto";
$fullName = "";
$date = "";
$about = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $appointmentId = $_GET['id'];
    // Fetch appointment data from the database
    $sql = "SELECT * FROM appointment WHERE Id = $appointmentId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['Names'];
        $date = $row['Date'];
        $about = $row['About'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Appointment' : 'Add New Appointment'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Appointments</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Appointment' : 'Add New Appointment'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="appointmentForm" action="insert_appointment.php" method="POST">
        <div class="form-group">
            <label for="appointmentId">Appointment ID:</label>
            <input type="text" id="appointmentId" name="appointmentId" class="form-control" value="<?php echo $appointmentId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $fullName; ?>">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
        </div>
        <div class="form-group">
            <label for="about">About:</label>
            <textarea id="about" name="about" class="form-control"><?php echo $about; ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("appointmentForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var fullName = document.getElementById("fullName").value.trim();
        var date = document.getElementById("date").value.trim();
        var about = document.getElementById("about").value.trim();

        // Validate full name
        if (fullName === "") {
            alert("Full Name is required");
            isValid = false;
        }

        // Validate date
        if (date === "") {
            alert("Date is required");
            isValid = false;
        }

        // Validate about
        if (about === "") {
            alert("About is required");
            isValid = false;
        }

        return isValid;
    }
</script>
