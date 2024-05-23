<?php 
include_once("./connection/connection.php");

?>

<div class="page">
    <div class="left">
        <h1>User</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Users</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_User" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New User</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable">
    <div class="cardHeader">
        <h2>All Users</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Full Name</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the user table
            $sql = "SELECT * FROM `user`";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["Names"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "<td>".$row["Gender"]."</td>";
                    echo "<td><a href='./?page=add_User&id=".$row["Id"]."'>Update</a> | <a href='delete.php?table=user&id=".$row["Id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
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
