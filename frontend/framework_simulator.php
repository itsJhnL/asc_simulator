<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Entry</title>
    <link rel="stylesheet" href="styles/framework.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container overflow-hidden col-md-12" style="max-width: 62rem;">
        <header>
            <h3>Rx Entry - Batch Reject - Reject</h3>
        </header>
        <div class="pb-1 d-flex justify-content-between mx-auto">

            <div class="">
                <label>Reorder #</label>
                <input class="input-field" style="max-width: 5rem;" type="text" value="26647" readonly>
            </div>


            <div class="">
                <label>Prescription #</label>
                <input class="input-field" style="max-width: 6rem;" type="text" value="1120607" readonly>
            </div>


            <div class="">
                <label>Dispensed</label>
                <input class="input-field" style="max-width: 7rem;" type="text" value="03/22/2025" readonly>
            </div>


            <div class="">
                <label>Written</label>
                <input class="input-field" style="max-width: 7rem;" type="text" value="1/14/2024" readonly>
            </div>


            <div class="">
                <label>Orig</label>
                <input class="input-field" style="max-width: 7rem;" type="text" value="11/14/2024" readonly>
            </div>

        </div>
        <div class="row mx-auto">

            <div class="d-flex flex-column">
                <button class="rounded-lg text-dark border border-dark" id="button-gradient">Active
                    Reorders</button>
                <button class="rounded-lg text-dark border border-dark" id="button-gradient">Add to Profile</button>
                <button class="rounded-lg text-dark border border-dark" id="button-gradient">New Rx for Pat</button>
            </div>

            <div class="col">
                <!-- IF DID NOT FIX JUST REMOVE THE DIV TO RESTORE. -->
                <div class="row">
                    <div>
                        <label>Patient</label>
                        <input class="input-field" type="text" value="LEO,DAVID">
                    </div>

                    <div>
                        <button class="input-field rounded-lg text-dark border border-dark" id="button-gradient"
                            readonly>
                            <img src="assets/images/play-fill.svg" alt="Patient Profile">
                        </button>
                        <button class="input-field rounded-lg text-dark border border-dark" id="button-gradient"
                            readonly>
                            <img src="assets/images/hospital.svg" alt="Patient Profile">
                        </button>
                    </div>

                    <div>
                        <label>ID</label>
                        <input class="input-field" style="max-width: 7rem;" type="text" value="01/31/1958">
                    </div>

                    <div class="">
                        <button class="input-field rounded-lg text-dark border border-dark" id="button-gradient"
                            readonly>Find
                            ID</button>
                    </div>

                    <div class="col">
                        <label>Start</label>
                        <input class="input-field" style="max-width: 7rem;" type="text" value="01/31/1958">
                    </div>
                </div>

                <div class="row">

                    <div>
                        <label>Station</label>
                        <input class="input-field" type="text" value="Cab">
                    </div>

                    <div>
                        <label>Room</label>
                        <input class="input-field" type="text" value="304">
                    </div>

                    <div>
                        <label>Floor</label>
                        <input class="input-field" type="text" value="3">
                    </div>

                    <div>
                        <label>Sex</label>
                        <input class="input-field" type="text" value="F">
                    </div>

                    <div>
                        <label>DOB</label>
                        <input class="input-field" type="text" value="12/29/1964">
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>
        <br>

        <!-- <div class=" tab-content">
                <div class="form-group">
                    <label>Prescriber</label>
                    <input type="text" value="DANILLO, MELISA">
                    <label>DEA #</label>
                    <input type="text" value="MP123456789">
                    <label>NPI #</label>
                    <input type="text" value="123456789">
                </div>
                <div class="form-group">
                    <label>Drug</label>
                    <input type="text" value="Losartan Pot Tab 25MG">
                    <label>Qty</label>
                    <input type="text" value="1000">
                </div>
                <div class="form-group">
                    <label>Associated DX</label>
                    <input type="text" value="I10 - Essential (primary) hypertension">
                </div>
                <div class="form-group col-sm-4">
                    <label>Sig</label>
                    <textarea>2T PO AM RELATED TO ESSENTIAL (PRIMARY) HYPERTENSION (I10)</textarea>
                </div>
                <div class="form-group">
                    <label>Admin Time</label>
                    <input type="text" value="9:00AM">
                </div>
                <div class="form-group">
                    <label>Refills</label>
                    <input type="text" value="7.00">
                    <label>Cost</label>
                    <input type="text" value="$100.95">
                </div>
                <div class="col-sm-10">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#Prescription">1. Prescription </a></li>
                        <li><a data-toggle="tab" href="#Ingredients">2. Ingredients</a></li>
                        <li><a data-toggle="tab" href="#Misc">3. Misc</a></li>
                        <li><a data-toggle="tab" href="#PrimaryClaim">4. Primary Claim</a></li>
                    </ul>
                </div>
            </div> -->

    </div>
</body>

</html>