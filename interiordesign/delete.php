<?php 
include_once("./connection/connection.php");

if (isset($_GET['table']) && isset($_GET['id']) && !isset($_GET['status'])) {
    $table = $_GET['table'];

    if ($table == 'clients') {
        $id = $_GET['id'];
        $sql = "DELETE FROM clients WHERE Id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=clients&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else if ($table == 'designers') {
        $id = $_GET['id'];
        $sql = "DELETE FROM designers WHERE Id  =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=designer&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'appointment') {
        $id = $_GET['id'];
        $sql = "DELETE FROM appointment WHERE Id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=appointment&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }

    else if ($table == 'consultations') {
        $id = $_GET['id'];
        $sql = "DELETE FROM consultations WHERE Id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=consultations&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }
    else if ($table == 'user') {
        $id = $_GET['id'];
        $sql = "DELETE FROM user WHERE Id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=user&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }
    else if ($table == 'moodboard') {
        $id = $_GET['id'];
        $sql = "DELETE FROM moodboard WHERE MoodBoardID=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=moodboard&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }
} else if (isset($_GET['status'])) {
    $table = $_GET['table'];
    $status = $_GET['status'];
   
    if ($status == 'block') {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
} else {
    // Do nothing
}
?>
