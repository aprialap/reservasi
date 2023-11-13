<?php
include 'template\header.php'
?>
<body>
  <?php 
    include 'template\navbar.php'
  ?>

    <div class="container mt-3">
        <h1>Form Reservation</h1>
        <p>Book your stay with us!</p>

        <!-- Isi konten utama di sini -->

        <!-- Formulir Reservasi Kamar Hotel -->
        <form id="reservationForm" action="reservation-save.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Gender</label>
                </div>
                <div class="form-group col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputGender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                </div>
                <div class="form-group col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputGender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputID">ID Number (16 digits)</label>
                    <input type="text" class="form-control" id="inputID" name="inputID" placeholder="Enter 16-digit ID number"
                        pattern="\d{16}" required>
                    <small id="idHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputRoomType">Room Type</label>
                    <select id="inputRoomType" name="inputRoomType" class="form-control">
                        <option selected>Choose...</option>
                        <option value="standar">Standar</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="family">Family</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCheckIn">Reservation Date</label>
                    <input type="date" class="form-control" id="inputReservationDate" name="inputReservationDate">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDuration">Duration of Stay (in days)</label>
                    <input type="text" class="form-control" id="inputDuration" name="inputDuration" placeholder="Enter duration in days"
                        pattern="\d+" required>
                    <small id="durationHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputBreakfast">Include Breakfast?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inputBreakfast" name="inputBreakfast" value="yes">
                        <label class="form-check-label" for="inputBreakfast">Yes, include breakfast</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTotal">Total Bayar</label>
                    <input type="text" class="form-control" id="inputTotal" name="inputTotal" placeholder="Total Bayar" readonly>
                </div>
            </div>
            <button type="button" class="btn btn-success" onclick="calculateTotal()">Hitung total bayar</button>
            <button type="submit" class="btn btn-primary" >Reserve Now</button>
            <a href="reservation-list.php" type="button" class="btn btn-warning" >Cancel</a>
        </form>
    </div>

</body>

<?php
    include 'template\footer.php';
?>
<script>
        // Objek Harga Kamar
        var roomPrices = {
            standar: 100000,   // Harga standar Room
            deluxe: 150000,   // Harga deluxe Room
            family: 200000   // family Suite
        };

        // Skrip untuk validasi ID Number
        document.getElementById('inputID').addEventListener('keyup', function () {
        var idInput = this;
        var idHelp = document.getElementById('idHelp');

        if (idInput.value.length === 16) {
            idInput.setCustomValidity('');
            idHelp.innerHTML = '';
        } else {
            idInput.setCustomValidity('Please enter a valid 16-digit ID number.');
            idHelp.innerHTML = 'Please enter a valid 16-digit ID number.';
        }
    });

    //Skrip untuk validasi Duration
    document.getElementById('inputDuration').addEventListener('keyup', function () {
            var durationInput = this;
            var durationHelp = document.getElementById('durationHelp');

            if (/^\d+$/.test(durationInput.value)) {
                durationInput.setCustomValidity('');
                durationHelp.innerHTML = '';
            } else {
                durationInput.setCustomValidity('Please enter a valid number for the duration.');
                durationHelp.innerHTML = 'Please enter a valid number for the duration.';
            }
        });

        function updateRoomPrice() {
            var roomTypeInput = document.getElementById('inputRoomType');
            var roomPriceInput = document.getElementById('roomPrice');

            var selectedRoomType = roomTypeInput.value;
            let price = roomPrices[selectedRoomType];
            if(typeof price =="undefined"){
                price = 0;
            }
            return price;
        }

        function calculateTotal() {
            var durationInput = document.getElementById('inputDuration');
            var breakfastCheckbox = document.getElementById('inputBreakfast');
            var totalInput = document.getElementById('inputTotal');
            var duration = parseInt(durationInput.value) || 0;
            var hasBreakfast = breakfastCheckbox.checked;
            var basePrice = updateRoomPrice(); // Harga dasar per hari

            // Diskon 10% jika lama menginap lebih dari 3 hari
            var discount = (duration > 3) ? 0.1 : 0;

            // Tambahan Rp 80.000 jika memilih breakfast
            var breakfastCost = hasBreakfast ? 80000 : 0;

            // Hitung total bayar
            var total = duration * basePrice - (duration * basePrice * discount) + breakfastCost;

            // Tampilkan total bayar
            totalInput.value = total.toLocaleString();
        }

</script>