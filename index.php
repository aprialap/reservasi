<?php
include 'template\header.php'
?>
<style>
    #videoCarousel {
        margin-top: 20px;
    }

    #videoCarousel video {
        max-height: 500px; /* Sesuaikan dengan kebutuhan Anda */
        width: 100%;
    }
</style>
<body>
  <?php 
    include 'template\navbar.php'
  ?>

    <div class="container mt-3">
        <h1>Welcome to Hotel XYZ</h1>
        <p>Book your stay with us!</p>

        <!-- Isi konten utama di sini -->
            <!-- Carousel Video -->
    <div id="videoCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Ganti URL video dengan URL video yang sesuai -->
                <video class="d-block w-100" controls>
                    <source src="your-video-url.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <!-- Tambahkan carousel-item untuk video lain jika diperlukan -->
        </div>
        <a class="carousel-control-prev" href="#videoCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#videoCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</body>

<?php
    include 'template\footer.php';
?>
