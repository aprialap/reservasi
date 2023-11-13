<?php
include('config\connection.php');

// Menerima data dari formulir
$name = $_POST['inputName'];
$gender = $_POST['inputGender'];
$idNumber = $_POST['inputID'];
$reservationDate = $_POST['inputReservationDate'];
$roomType = $_POST['inputRoomType'];
$duration = $_POST['inputDuration'];
$includeBreakfast = isset($_POST['inputBreakfast']) ? 1 : 0;
$totalPayment = (float)$_POST['inputTotal'];


//Memasukkan data ke dalam tabel reservasi
$sql = "INSERT INTO reservations (name, gender,id_number, recervation_date, room_type,  duration, include_breakfast, total_payment)
        VALUES ('$name', '$gender','$idNumber', '$reservationDate', '$roomType', $duration, $includeBreakfast, $totalPayment)";

if ($conn->query($sql) === TRUE) {
    echo "Reservation saved successfully!";
    // Redirect ke page lain
    header("Location: reservation-list.php");
    exit(); // Ensure that no further code is executed after the header
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
