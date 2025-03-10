<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <title>Prescription Entry</title>
    <link rel="stylesheet" href="styles/framework.css">
    <!-- Bootstrap 4.5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Slim version of jQuery -->
    <!-- Bootstrap JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container col-md-10" style="max-width: 69rem;">
        <div>
            <!-- This is the header of framework -->
            <!-- It display RX information -->
            <!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
            <?php include 'header.php'; ?>
            <!-- to keep show tab list -->
            <?php include('includes/active.php') ?>
        </div>

        <hr>
        <!--section 2-->

        <!-- Drug section -->
        <div>
            <!-- footer tab pane -->
            <?php include 'footer-tab.php'; ?>
        </div>
    </div>
</body>

</html>