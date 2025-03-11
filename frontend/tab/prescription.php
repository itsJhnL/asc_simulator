<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/header.php'; ?>


<!-- Drug block section-->
<div class="row mx-auto">
    <div class="col">

        <!-- Drug type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Drug
                </label>
            </div>
            <div class="col d-flex p-1">
                <div class="">
                    <input class="input-field" type="text" value="5876452169">
                </div>
                <div>
                    <input class="input-field" type="text" value="METFORMIN TAB 500MG">

                </div>
            </div>
        </div>

        <!-- Compound type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"
                    disabled>
                <label class="form-check-label" for="exampleRadios2">
                    Compound
                </label>
            </div>
            <div class="col d-flex p-1">
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
                <div>
                    <input class="input-field" type="text" value="" readonly>

                </div>
            </div>
        </div>

        <!-- IV type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"
                    disabled>
                <label class="form-check-label" for="exampleRadios3">
                    IV
                </label>
            </div>
            <div class="col d-flex p-1">
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
            </div>
        </div>

        <div class="row ml-auto">

            <div class="col-2 d-flex align-items-center justify-content-between">
                <span>Associated DX</span>
            </div>

            <div class="col d-flex p-1 ">
                <input class="input-field" style="max-width: 30rem;" type="text" value="">
                <button class="input-field rounded-lg border" id="button-gradient" readonly>
                    New
                </button>
            </div>

        </div>

        <div class="row mx-auto">

            <div class="col-2 d-flex align-items-center justify-content-between">
                <span>DAW</span>
            </div>

            <div class="col d-flex p-1">
                <input class="input-field" style="max-width: 25rem;" type="text"
                    value="No product selection indicated.">
            </div>

        </div>

        <div class="row mx-auto">

            <div class="col-2 d-flex align-items-center">
                <span>MOP #1</span>
            </div>

            <div class="col-2 d-flex align-items-center p-1">
                <div class="">
                    <input class="input-field" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

            <div class="col p-1">
                <div class="d-flex align-items-center">
                    <span> Price Code </span>
                    <input class="input-field mx-2" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

            <div class="col p-1">
                <div class="d-flex align-items-center">
                    <span> MOP #2 </span>
                    <input class="input-field mx-2" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

        </div>

    </div>

    <!-- Drug's Price -->
    <div class="border col-3">
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Cost</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Fee</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Copay</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Discount</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Total Price</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Actual Cost</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for=""># of Labels</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex justify-content-between py-1">
            <label for="">Lbl Qtys</label>
            <!-- <input type="text" style="max-width: 5rem" value="42.23"> -->
            <!--             <div class="">
                <div class="border border-dark overflow-hidden">
                    <ul class="col" style="list-style-type: none;">
                        <li class="border-bottom border-white"><input> 30
                        </li>
                        <li class="border-bottom border-white"><input> 0</li>
                        <li class="border-bottom border-white"><input> 0</li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- footer tab pane -->
<?php include '../includes/footer-tab.php'; ?>