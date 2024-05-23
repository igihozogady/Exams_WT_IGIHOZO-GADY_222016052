<?php 
include_once("./connection/connection.php");

function validate_image($file){
    $ex_file = explode("?",$file)[0];
    if(!empty($ex_file)){
        if(is_file('allImages/'.$ex_file)){
            return 'allImages/'.$file;
        } else {
            return 'allImages/no-image-available.png';
        }
    } else {
        return 'allImages/no-image-available.png';
    }
}
?>

<div class="page">
    <div class="left">
        <h1>Appointment</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Appointments</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_Appointment" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Appointment</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable">
    <div class="cardHeader">
        <h2>All Appointments</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Full Name</td>
                <td>Date</td>
                <td>About</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the appointment table
            $sql = "SELECT * FROM appointment";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["Names"]."</td>";
                    echo "<td>".$row["Date"]."</td>";
                    echo "<td>".$row["About"]."</td>";
                    echo "<td><a href='./?page=add_Appointment&id=".$row["Id"]."'>Update</a> | <a href='delete.php?table=appointment&id=".$row["Id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .success-message {
        opacity: 1;
        background-color: lightgreen;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
</style>

<script>
    // JavaScript to hide success message after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    }, 3000);
</script>
