<?php
include('config\connection.php');

if (isset($_GET['id'])) {
    $reservationId = $_GET['id'];

    // Hapus reservasi dari tabel
    $sql = "DELETE FROM reservations WHERE id = $reservationId";
    if ($conn->query($sql) === TRUE) {
        echo "Reservation deleted successfully!";
       // Redirect ke page lain
        header("Location: reservation-list.php");
    } else {
        echo "Error deleting reservation: " . $conn->error;
    }
}

$conn->close();
?>