<?php

include "view_koneksi.php";

$Id = $_GET['Id'];

$query = "DELETE FROM komen WHERE Id = $Id";

if (mysqli_query($mysqli, $query)) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
