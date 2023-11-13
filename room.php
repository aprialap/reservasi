<?php
include 'template\header.php'
?>
<body>
  <?php 
    include 'template\navbar.php'
  ?>

    <div class="container mt-3">
        <h1>Our Rooms</h1>

        <!-- Daftar Kamar -->
        <div class="row">
            <!-- Kamar 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Room 1">
                    <div class="card-body">
                        <h5 class="card-title">Standar Room</h5>
                        <p class="card-text">A cozy single room with a comfortable bed.</p>
                        <a href="reservation.php" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Kamar 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Room 2">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Spacious double room with a view.</p>
                        <a href="reservation.php" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Kamar 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Room 3">
                    <div class="card-body">
                        <h5 class="card-title">Family Room</h5>
                        <p class="card-text">Luxurious with all the amenities you need.</p>
                        <a href="reservation.php" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    include 'template\footer.php'
?>