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

                                <div class="mx-2 form-group">
                                    <div class="pr-5 form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Drug
                                        </label>
                                    </div>
                                    <input type="text" value="54654823948" class="form-control" style="height: 30px;">

                                    <button class="input-field rounded-lg border btn btn-sm">Info</button>
                                    <input type="text" value="METFORMIN TAB 500MG" class="form-control"
                                        style="height: 30px;">
                                    <button class="input-field rounded-lg border btn  btn-sm">
                                        <img src="assets/images/play-button.png" style="height: 15px"
                                            alt="Patient Profile">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>IV</label>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <button class="input-field rounded-lg border btn  btn-sm">
                                        <img src="assets/images/play-button.png" style="height: 15px"
                                            alt="Patient Profile">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>Compound</label>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <input type="text" class="form-control" style="height: 30px;" disabled>
                                    <button class="input-field rounded-lg border btn  btn-sm">
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
                                    <input type="text" value="42.3" class="form-control">
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Fee</label>
                                    <input type="text" value="74.35" class="form-control">
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Copay</label>
                                    <input type="text" value="0.00" class="form-control">
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Total Price</label>
                                    <input type="text" value="116.58" class="form-control">
                                </div>
                                <div class="form-group" style="width:150px">
                                    <label>Actual Cost</label>
                                    <input type="text" value="0.64" class="form-control">
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

                <div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                    <!-- Tab 2 Ingredients -->
                    <?php include 'pages/ingredients.php'; ?>
                </div>

                <div class="tab-pane fade" id="misc" role="tabpanel" aria-labelledby="misc-tab">
                    <!-- Tab 3 Misc -->
                    <?php include 'pages/misc.php'; ?>
                </div>

                <div class="tab-pane fade" id="primary" role="tabpanel" aria-labelledby="primary-tab">
                    <!-- Tab 4 Primary -->
                    <!-- bug> tab is hiding -->
                    <?php /* include 'pages/primary.php'; */ ?>
                </div>

                <div class="tab-pane fade" id="secondary" role="tabpanel" aria-labelledby="secondary-tab">
                    <!-- Tab 5 Primary -->
                    <?php include 'pages/secondary.php'; ?>
                </div>
            </div>
            <!-- footer tab pane -->
            <?php include 'footer-tab.php'; ?>
        </div>
    </div>
</body>

</html>