<?php 
include_once("./connection/connection.php");

// Initialize variables to hold consultation data if editing
$consultationId = "Auto";
$fullName = "";
$date = "";
$about = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $consultationId = $_GET['id'];
    // Fetch consultation data from the database
    $sql = "SELECT * FROM consultations WHERE Id = $consultationId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['Names'];
        $date = $row['Dates'];
        $about = $row['About'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Consultation' : 'Add New Consultation'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Consultations</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Consultation' : 'Add New Consultation'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="consultationForm" action="insert_consultation.php" method="POST">
        <div class="form-group">
            <label for="consultationId">Consultation ID:</label>
            <input type="text" id="consultationId" name="consultationId" class="form-control" value="<?php echo $consultationId; ?>" readonly>
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
    document.getElementById("consultationForm").addEventListener("submit", function(event) {
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
