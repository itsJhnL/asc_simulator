<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <title>Prescription Entry</title>
    <link rel="stylesheet" href="framework.css">
    <!-- Bootstrap 4.5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript (Required for Modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- I hide this line, conflict to 4.5.3 css version. -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 (For Popups) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Slim version of jQuery -->
    <!-- Bootstrap JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tab 2 css -->
    <style>
        .height {
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container col-md-10" style="max-width: 69rem;">
        <header class="d-flex justify-content-between">
            <h5>Rx Entry - Batch Reject - Reject</h5>
            <div class="px-1">
                <!-- GenerateRX and clearLocalStorage -->
                <button type="button" class="btn btn-primary" onclick="generateRX()" id="clearLocalStorage">
                    Next RX
                </button>
                <script>
                    document.getElementById('clearLocalStorage').addEventListener('click', function () {
                        // Clear Local Storage
                        localStorage.clear();
                        // Clear Session Storage
                        sessionStorage.clear();
                        console.log("Local Storage Cleared")
                    })
                    /* Link to other tab */
                    function generateRX() {
                        window.location.href = "submit.php";
                    };
                </script>
            </div>
        </header>
        <!-- Header buttons // Edit, Save, Undo etc. -->
        <?php include('header_buttons.php') ?>
        <!-- to keep show tab list -->
        <?php include('active.php') ?>

        <!-- This is the header of framework -->
        <!-- It display RX information -->
        <!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
        <form action="">
            <div>
                <div class="row mx-auto justify-content-between">
                    <div class="pb-1 d-flex">
                        <div class="mr-md-2">
                            <label>Reorder #</label>
                            <input class="input-field" style="max-width: 5rem;" type="text" value="26647" readonly>
                        </div>


                        <div class="mr-md-2">
                            <label>Prescription #</label>
                            <input class="input-field" style="max-width: 6rem;" type="text"
                                value="<?php echo isset($_SESSION['rx_number']) ? htmlspecialchars($_SESSION['rx_number']) : ''; ?>"
                                readonly>



                        </div>


                        <div class="mr-md-2">
                            <label>Dispensed</label>
                            <input class="input-field" style="max-width: 7rem;" type="text" value="03/22/2025" readonly>
                        </div>


                        <div class="mr-md-2">
                            <label>Written</label>
                            <input class="input-field" style="max-width: 7rem;" type="text" value="1/14/2024" readonly>
                        </div>
                    </div>
                    <div class=" justify-content-end">
                        <label>Orig</label>
                        <input class="input-field" style="max-width: 7rem;" type="text" value="11/14/2024" readonly>
                    </div>
                </div>
                <div class="d-flex justify-content-between mx-auto">

                    <!-- buttons -->
                    <div class="d-flex flex-column">
                        <button class="rounded-lg text-dark border border-dark" id="button-gradient">Active
                            Reorders</button>
                        <button class="rounded-lg text-dark border border-dark" id="button-gradient">Add to
                            Profile</button>
                        <button class="rounded-lg text-dark border border-dark" id="button-gradient">New Rx
                            for Pat</button>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="col flex-column">
                            <div class="">
                                <label>Patient</label>
                                <input class="input-field" style="min-width: 19.7rem;" type="text"
                                    value="DAVID PAUL, BRUNO JR.">
                            </div>
                            <div class="d-flex">
                                <div class="mr-md-2" style="max-width: 9rem;">
                                    <label for="">Station</label>
                                    <input class="input-field" style="max-width: 4rem;" type="text" value="FAC113">
                                </div>
                                <div class="mr-md-2" style="max-width: 9rem;">
                                    <label for="">Room</label>
                                    <input class="input-field" style="max-width: 4rem;" type="text" value="304">
                                </div>
                                <div class="mr-md-2" style="max-width: 9rem;">
                                    <label for="">Floor</label>
                                    <input class="input-field" style="max-width: 4rem;" type="text" value="38">
                                </div>
                            </div>
                            <br>
                            <div class="row pt-5">
                                <div class="col align-items-end">
                                    <label for="">Last Disp.</label>
                                    <input class="input-field" style="max-width: 7rem;" type="text" value="12/29/1964">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="col">
                                <button class="input-field rounded-lg border " id="button-gradient" readonly>
                                    <img src="images/play-button.png" style="height: 15px" alt="Patient Profile">
                                </button>

                                <button class="input-field rounded-lg border " id="button-gradient" readonly>
                                    <img src="images/hospital-button.png" style="height: 15px" alt="Patient Profile">
                                </button>

                                <label>ID</label>
                                <input class="input-field" style="max-width: 7rem;" type="text" value="01/31/1958">

                                <button class="input-field rounded-lg border text-black-50 border-white "
                                    style="cursor: no-drop" id="button-gradient" readonly>Find
                                    ID</button>
                            </div>
                            <div class="col">
                                <label>Sex</label>
                                <input class="input-field" style="max-width: 2rem;" type="text" value="M">

                                <label>DOB</label>
                                <input class="input-field" type="text" style="max-width: 7rem;" value="12/29/1964">

                                <button class="input-field rounded-lg border " id="button-gradient" readonly>
                                    <img src="images/docs.png" style="height: 15px" alt="Patient Profile">
                                </button>
                            </div>
                        </div>

                        <div class="flex-column">
                            <div class="justify-between-end">
                                <label>Start</label>
                                <input class="input-field" style="max-width: 7rem;" type="text" value="11/14/2024"
                                    readonly>
                            </div>
                            <div>
                                <label>Available Payment</label>
                                <div class="border border-dark rounded-lg">
                                    <div class="border border-dark rounded-sm m-1">
                                        <ul class="col" style="list-style-type: none;">
                                            <li class="border-bottom border-white"><input type="checkbox" checked
                                                    disabled>
                                                ADV
                                                1
                                            </li>
                                            <li class="border-bottom border-white"><input type="checkbox" disabled> HMRK
                                            </li>
                                            <!-- <li class="border-bottom border-white"><input type="checkbox" disabled> GAINWELL
                                        </li>
                                        <li class="border-bottom border-white"><input type="checkbox" disabled> PRIV
                                        </li> -->
                                            <li class="border-bottom border-white"><input type="checkbox" disabled> FACI
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-2 row mx-auto justify-content-between">
                    <div class="pb-1 d-flex">
                        <div class="mr-md-2">
                            <label readonly>Prescriber</label>
                            <input class="input-field" type="text" value="MUHAMMAD, ALI" readonly>

                            <button class="input-field rounded-lg border " id="button-gradient" readonly>
                                <img src="images/play-button.png" style="height: 15px" alt="Patient Profile">
                            </button>

                        </div>

                        <div class="mr-md-2">
                            <label>DEA #</label>
                            <input class="input-field" style="max-width: 6rem;" type="text" value="1120607" readonly>
                        </div>


                        <div class="mr-md-2">
                            <label>NPI #</label>
                            <input class="input-field" style="max-width: 7rem;" type="text" value="123456489935"
                                readonly>
                        </div>


                        <div class="mr-md-2">
                            <label>SPI</label>
                            <input class="input-field" type="text" value="45648943232" readonly>
                            <button class="input-field rounded-lg border " id="button-gradient" readonly>
                                <img src="images/play-button.png" style="height: 15px" alt="Patient Profile">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <!--section 2-->