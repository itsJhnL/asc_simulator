<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
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
                    <button class="input-field rounded-lg border btn-sm" id="button-gradient" readonly>
                        <img src="assets/images/play-button.png" style="height: 15px" alt="Patient Profile">
                    </button>

                    <button class="input-field rounded-lg border btn-sm" id="button-gradient" readonly>
                        <img src="assets/images/hospital-button.png" style="height: 15px" alt="Patient Profile">
                    </button>

                    <label>ID</label>
                    <input class="input-field" style="max-width: 7rem;" type="text" value="01/31/1958">

                    <button class="input-field rounded-lg border text-black-50 border-white btn-sm"
                        style="cursor: no-drop" id="button-gradient" readonly>Find
                        ID</button>
                </div>
                <div class="col">
                    <label>Sex</label>
                    <input class="input-field" style="max-width: 2rem;" type="text" value="F">

                    <label>DOB</label>
                    <input class="input-field" type="text" style="max-width: 7rem;" value="12/29/1964">

                    <button class="input-field rounded-lg border btn-sm" id="button-gradient" readonly>
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

                <button class="input-field rounded-lg border btn-sm" id="button-gradient" readonly>
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