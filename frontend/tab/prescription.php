<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/header.php'; ?>


<!-- Drug block section-->
<div class="tab-pane fade show active" id="prescription" role="tabpanel" aria-labelledby="prescription-tab">

    <!-- Tab 1 Prescription -->
    <div class="row">
        <div class="col">
            <div class="tab-content" id="Prescription">

                <div class="mx-2 form-group">
                    <div class="pr-5 form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Drug
                        </label>
                    </div>
                    <input type="text" value="54654823948" class="form-control" style="height: 30px;">

                    <button class="input-field rounded-lg border btn btn-sm">Info</button>
                    <input type="text" value="METFORMIN TAB 500MG" class="form-control" style="height: 30px;">
                    <button class="input-field rounded-lg border btn  btn-sm">
                        <img src="../assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                    </button>
                </div>

                <div class="form-group">
                    <label>IV</label>
                    <input type="text" class="form-control" style="height: 30px;" disabled>
                    <input type="text" class="form-control" style="height: 30px;" disabled>
                    <button class="input-field rounded-lg border btn  btn-sm">
                        <img src="../assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                    </button>
                </div>

                <div class="form-group">
                    <label>Compound</label>
                    <input type="text" class="form-control" style="height: 30px;" disabled>
                    <input type="text" class="form-control" style="height: 30px;" disabled>
                    <button class="input-field rounded-lg border btn  btn-sm">
                        <img src="../assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                    </button>
                </div>

                <div class="form-group">
                    <label>Associated DX</label>
                    <input type="text" value="I10 - Essential (primary) hypertension" class="form-control"
                        style="height: 30px;">
                </div>

                <div class="form-group">
                    <label>DAW</label>
                    <input type="text" value="No product selection indicated." class="form-control"
                        style="height: 30px;">
                </div>

                <div class="form-group">
                    <label>MOP #1</label>
                    <input type="text" class="form-control" style="height: 30px; max-width: 12rem;" value="ADV1">
                    <label>Price Code</label>
                    <input type="text" class="form-control" style="height: 30px; max-width: 12rem;" value="ADV1">
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

<!-- footer tab pane -->
<?php include '../includes/footer-tab.php'; ?>