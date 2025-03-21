<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/headercc.php'; ?>


<!-- Drug block section-->
<div class="border rounded-lg p-3">

    <!-- Comments and Billing Comments -->
    <div>

        <!-- Comments -->
        <div class="d-flex justify-content-between pb-1">
            <div class="col-2">
                <label for="comment"> Comments</label>
            </div>
            <textarea rows="5" style="resize: none" name="comment" id="comment">OTC not covered faci bill</textarea>
        </div>

        <!-- Billing Comments -->
        <div class="d-flex justify-content-between">
            <div class="col-2">
                <label for="billing"> Billing Comments</label>
            </div>
            <textarea rows="5" style="resize: none" name="billing" id="billing">OTC not covered faci bill</textarea>
        </div>

    </div>

    <div class="row mx-auto pt-3">

        <div class="col-5">

            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Dispensed For</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text">
                </div>
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Invoice Group</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text" value="">
                </div>
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Transaction Type</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text" style="max-width: 4rem" value="">
                </div>
                <div>
                    <input class="input-field" type="checkbox" name="" id=""><label for="">Never Split</label>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Linked Reorder #</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text">
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Route of Admin O/R</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text">
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <label for="">Treatment Type</label>
                </div>
                <div class="col">
                    <input class="input-field" type="text">
                </div>

            </div>

            <div>
                <input class="input-field" type="checkbox" name="" id=""><label for="">Extra Dose</label>
            </div>
        </div>



        <div class="col">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="">Rx Serial No</label>
                </div>
                <input class="input-field" type="text">
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="">Small. Disp. Qty </label>
                </div>
                <input class="input-field" type="text">
            </div>

            <div class="d-flex align-items-center justify-content-between">

                <div>
                    <label for="">Lot</label>
                </div>
                <input class="input-field" type="text" style="max-width: 8rem;">

                <div>
                    <label for="">Drug Serial</label>
                </div>
                <input class="input-field" type="text" style="max-width: 8rem;">

                <div>
                    <label for="">Expires</label>
                </div>
                <input class="input-field" type="date" name="" id="" style="max-width: 8rem;">

            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="">EDK</label>
                </div>
                <input class="input-field" type="text">
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div>
                        <label for="">Additional Qty Billed</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div>
                        <label for="">Unbilled</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div>
                        <label for="">Prescribed NDC</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div>
                        <label for="">Prescribed Qty</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="">Prescribed Drug Name</label>
                </div>
                <input class="input-field" type="text">

            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="">Total Qty Dispensed</label>
                </div>
                <input class="input-field" type="text">
            </div>


            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <div>
                        <label for="">Fill Qty Written</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div>
                        <label for="">Max Daily Qty</label>
                    </div>
                    <div>
                        <input class="input-field" type="text" style="max-width: 8rem;">
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- footer tab pane -->
<?php include '../includes/footer-tabcc.php'; ?>