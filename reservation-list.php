<?php
include 'config\connection.php';
include 'template\header.php';

// Mengambil data reservasi dari database
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);
?>
<body>
<?php 
    include 'template\navbar.php'
  ?>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Reservation List</h1>
            <a href="reservation.php" class="btn btn-primary">New Reservation</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Reservation Date</th>
                    <th scope="col">Duration (days)</th>
                    <th scope="col">Include Breakfast</th>
                    <th scope="col">Total Payment</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $i=1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $i. "</th>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["id_number"] . "</td>";
                        echo "<td>" . $row["room_type"] . "</td>";
                        echo "<td>" . $row["recervation_date"] . "</td>";
                        echo "<td>" . $row["duration"] . "</td>";
                        echo "<td>" . ($row["include_breakfast"] ? 'Yes' : 'No') . "</td>";
                        echo "<td>" . $row["total_payment"] . "</td>";
                        echo "<td>" . ($row["duration"] > 3 ? '10%':'0%'). "</td>";
                         // Kolom Delete dengan tombol "Delete"
                        echo "<td><a href='reservation-delete.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='10' style='text-align:center;font-style: italic'>No reservations found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<?php
include 'template\footer.php';
$conn->close();
?>
