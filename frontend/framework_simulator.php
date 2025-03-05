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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS (includes Popper) -->
</head>

<body>
    <div class="container  col-md-10" style="max-width: 69rem;">
        <div>
            <header>
                <h3 style="background-color: ;">Rx Entry - Batch Reject - Reject</h3>
            </header>
            <div class="row mx-auto justify-content-between">
                <div class="pb-1 d-flex">
                    <div class="mr-md-2">
                        <label>Reorder #</label>
                        <input class="input-field" style="max-width: 5rem;" type="text" value="26647" readonly>
                    </div>


                    <div class="mr-md-2">
                        <label>Prescription #</label>
                        <input class="input-field" style="max-width: 6rem;" type="text" value="1120607" readonly>
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
                    <button class="rounded-lg text-dark border border-dark" id="button-gradient">Add to Profile</button>
                    <button class="rounded-lg text-dark border border-dark" id="button-gradient">New Rx for Pat</button>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="col flex-column">
                        <div class="">
                            <label>Patient</label>
                            <input class="input-field" style="min-width: 19.7rem;" type="text" value="LEO,DAVID">
                        </div>
                        <div class="d-flex">
                            <div class="mr-md-2" style="max-width: 9rem;">
                                <label for="">Station</label>
                                <input class="input-field" style="max-width: 4rem;" type="text" value="Cabsy">
                            </div>
                            <div class="mr-md-2" style="max-width: 9rem;">
                                <label for="">Room</label>
                                <input class="input-field" style="max-width: 4rem;" type="text" value="Cabsy">
                            </div>
                            <div class="mr-md-2" style="max-width: 9rem;">
                                <label for="">Floor</label>
                                <input class="input-field" style="max-width: 4rem;" type="text" value="Cabsy">
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
                            <button class="input-field rounded-lg border" id="button-gradient" readonly>
                                <img src="assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                            </button>

                            <button class="input-field rounded-lg border" id="button-gradient" readonly>
                                <img src="assets/images/hospital-button.png" style="height: 15px" alt="Patient Profile">
                            </button>

                            <label>ID</label>
                            <input class="input-field" style="max-width: 7rem;" type="text" value="01/31/1958">

                            <button class="input-field rounded-lg border text-black-50 border-white"
                                style="cursor: no-drop" id="button-gradient" readonly>Find
                                ID</button>
                        </div>
                        <div class="col">
                            <label>Sex</label>
                            <input class="input-field" style="max-width: 2rem;" type="text" value="F">

                            <label>DOB</label>
                            <input class="input-field" type="text" style="max-width: 7rem;" value="12/29/1964">

                            <button class="input-field rounded-lg border" id="button-gradient" readonly>
                                <img src="assets/images/docs.png" style="height: 15px" alt="Patient Profile">
                            </button>
                        </div>
                    </div>

                    <div class="flex-column">
                        <div class="justify-between-end">
                            <label>Start</label>
                            <input class="input-field" style="max-width: 7rem;" type="text" value="11/14/2024" readonly>
                        </div>
                        <div class="">
                            <label>Available Payment</label>
                            <div class="border border-dark ">
                                <ul class="col" style="list-style-type: none;">
                                    <li class="border-bottom border-white"><input type="checkbox" checked disabled> ADV
                                        1
                                    </li>
                                    <li class="border-bottom border-white"><input type="checkbox" disabled> HMRK</li>
                                    <li class="border-bottom border-white"><input type="checkbox" disabled> FACI</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="pt-2 row mx-auto justify-content-between">
                <div class="pb-1 d-flex">
                    <div class="mr-md-2">
                        <label readonly>Prescriber</label>
                        <input class="input-field" type="text" value="26647" readonly>

                        <button class="input-field rounded-lg border" id="button-gradient" readonly>
                            <img src="assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                        </button>

                    </div>

                    <div class="mr-md-2">
                        <label>DEA #</label>
                        <input class="input-field" style="max-width: 6rem;" type="text" value="1120607" readonly>
                    </div>


                    <div class="mr-md-2">
                        <label>NPI #</label>
                        <input class="input-field" style="max-width: 7rem;" type="text" value="03/22/2025" readonly>
                    </div>


                    <div class="mr-md-2">
                        <label>SPI</label>
                        <input class="input-field" type="text" value="1/14/2024" readonly>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <!--section 2-->

        <!-- Drug section -->
        <div>
            <div class="tab-content" id="Prescription">
                <div class="tab-pane fade show active" id="prescription" role="tabpanel"
                    aria-labelledby="prescription-tab">

                    <!-- Tab 1 Prescription -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content" id="Prescription">

                                <div class="form-group">
                                    <label>Drug</label>
                                    <input type="text" value="54654823948" class="form-control" style="height: 30px;">
                                    &nbsp;
                                    <button class="btn btn-info btn-sm">Info</button>
                                    <input type="text" value="METFORMIN TAB 500MG" class="form-control"
                                        style="height: 30px;">
                                    <button class="btn btn-light btn-sm">
                                        <img src="assets/images/play-button.png" style="height: 15px"
                                            alt="Patient Profile">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>IV</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <button class="btn btn-light btn-sm">
                                        <img src="assets/images/play-button.png" style="height: 15px"
                                            alt="Patient Profile">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>Compound</label>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <button class="btn btn-light btn-sm">
                                        <img src="assets/images/play-button.png" style="height: 15px"
                                            alt="Patient Profile">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>Associated DX</label>
                                    <input type="text" value="I10 - Essential (primary) hypertension"
                                        class="form-control" style="height: 30px;">
                                </div>

                                <div class="form-group">
                                    <label>DAW</label>
                                    <input type="text" value="No product selection indicated." class="form-control"
                                        style="height: 30px;">
                                </div>

                                <div class="form-group">
                                    <label>MOP #1</label>
                                    <input type="text" class="form-control" style="height: 30px; max-width: 12rem;"
                                        value="ADV1">
                                    <label>Price Code</label>
                                    <input type="text" class="form-control" style="height: 30px; max-width: 12rem;"
                                        value="ADV1">
                                    <label>MOP #2</label>
                                    <input type="text" class="form-control" style="height: 30px; max-width: 12rem;">
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-1">
                            <div class="tab-content" id="Prescription">

                                <div class="form-group" style="width:150px">
                                    <label>Cost</label>
                                    <input type="text" value="42.3" class="form-control"> &nbsp;
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Fee</label>
                                    <input type="text" value="74.35" class="form-control"> &nbsp;
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Copay</label>
                                    <input type="text" value="0.00" class="form-control"> &nbsp;
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Total Price</label>
                                    <input type="text" value="116.58" class="form-control"> &nbsp;
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Actual Cost</label>
                                    <input type="text" value="0.64" class="form-control"> &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of section 2-->
                    <br>
                    <!--section 3-->
                    <div class="col-sm-5">
                        <fieldset style="border:1px solid black;">
                            <legend style="text-align: center;">Direction</legend>

                            <div>
                                <label>Sig</label> <br>
                                <textarea rows="6" cols="30" style="resize: none;"> </textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="full-height tab-pane fade" id="ingredients" role="tabpanel"
                    aria-labelledby="ingredients-tab">
                    <!-- Tab 2 Ingredients -->
                    <?php include 'ingredients.php'; ?>
                </div>

                <div class="tab-pane fade" id="misc" role="tabpanel" aria-labelledby="misc-tab">
                    <!-- Tab 3 Misc -->
                    <?php include 'misc.php'; ?>
                </div>

                <div class="tab-pane fade" id="primary" role="tabpanel" aria-labelledby="primary-tab">
                    <!-- Tab 4 Primary -->
                    <?php include 'primary.php'; ?>
                </div>

                <div class="tab-pane fade" id="secondary" role="tabpanel" aria-labelledby="secondary-tab">
                    <!-- Tab 5 Primary -->
                    <?php include 'secondary.php'; ?>
                </div>
            </div>
            <!-- footer tab pane -->
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="color:black; padding-top: 10px">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="prescription-tab" data-toggle="tab" href="#prescription" role="tab"
                        aria-controls="prescription" aria-selected="true">1. Prescription</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ingredients-tab" data-toggle="tab" href="#ingredients" role="tab"
                        aria-controls="ingredients" aria-selected="true">2. Ingredients</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="misc-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="misc"
                        aria-selected="true">3. Misc</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="primary-tab" data-toggle="tab" href="#primary" role="tab"
                        aria-controls="primary" aria-selected="true">4. Primary Claim</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="secondary-tab" data-toggle="tab" href="#secondary" role="tab"
                        aria-controls="secondary" aria-selected="true">5. Secondary Claim</a>
                </li>

            </ul>
        </div>

    </div>
</body>

</html>