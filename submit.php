<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rx_numbers";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


do {
    $rx_number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $checkQuery = "SELECT * FROM rx_table WHERE rx_number = '$rx_number'";
    $result = $conn->query($checkQuery);
} while ($result->num_rows > 0);


$sql = "INSERT INTO rx_table (rx_number) VALUES ('$rx_number')";
if ($conn->query($sql) === TRUE) {

    $pages = ["../asc_simulator/frontend/tab/prescription.php", "../asc_simulator/frontend/tab/prescription.php", "../asc_simulator/frontend/tab/prescription.php"];
    $randomPage = $pages[array_rand($pages)];


    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'RX Number Generated!',
                text: 'RX Number: $rx_number',
                confirmButtonText: 'Go to Page'
            }).then(() => {
                window.location.href = '$randomPage';
            });
        });
    </script>";
} else {

    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Failed to generate RX number.'
        });
    </script>";
}

$conn->close();
?>