<?php
include_once 'connect.php';

$conn = new mysqli($servername,$username,$password,$dbname);
$sql="CREATE EVENT removeOldContent ON SCHEDULE EVERY 1 HOUR DO DELETE FROM images WHERE date<=NOW();"
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>