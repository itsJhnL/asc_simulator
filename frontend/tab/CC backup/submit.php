<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rx_numbers";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define state mappings
$state_mapping = [
    2 => "Kentucky",
    4 => "New York",
    5 => "Illinois",
    6 => "New Jersey",
    7 => "Massachusetts"
];


do {
    $first_digit_options = array_keys($state_mapping); 
    $first_digit = $first_digit_options[array_rand($first_digit_options)];
    $remaining_digits = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
    
    $rx_number = $first_digit . $remaining_digits;
    $state = $state_mapping[$first_digit];

    $checkQuery = "SELECT * FROM rx_table WHERE rx_number = '$rx_number'";
    $result = $conn->query($checkQuery);
} while ($result->num_rows > 0);


$sql = "INSERT INTO rx_table (rx_number, state) VALUES (?, ?)";
$insertQuery = $conn->prepare($sql);
$insertQuery->bind_param("ss", $rx_number, $state);

if ($insertQuery->execute()) {
    $_SESSION['rx_number'] = $rx_number;
    $_SESSION['state'] = $state;

    $redirectPage = "prescription.php";

    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'RX Number Generated!',
                text: 'RX Number: $rx_number (State: $state)',
                confirmButtonText: 'Go to Page'
            }).then(() => {
                window.location.href = '$redirectPage';
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
