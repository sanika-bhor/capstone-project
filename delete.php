<?php
include("config2.php");
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']); // Sanitize ID
    $query = "DELETE FROM book_App WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='showapp.php';</script>"; // Redirect back to the main page
    } else {
        echo "Error deleting record.";
    }
}
?>