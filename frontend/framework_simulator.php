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
    <div class="container col-md-10">
        <div class="">
            <header>
                <h3>Rx Entry - Batch Reject - Reject</h3>
            </header>
            <div class="form-group row mx-auto">
                <div class="">
                    <label>Reorder #</label>
                    <input class="text-center w-25" type="text" value="28844" name="item" readonly>
                </div>
                <div class="col-3">
                    <label>Prescription #</label>
                    <input class="text-center w-25" type="text" value="1120607" readonly>
                </div>
                <div class="">
                    <label>Dispensed</label>
                    <input class="text-center w-50" type="text" value="03/22/2025" readonly>
                </div>
                <div class="">
                    <label>Written</label>
                    <input class="text-center w-50" type="text" value="1/14/2024" readonly>
                </div>
                <div class="">
                    <label>Orig</label>
                    <input class="text-center w-50" type="text" value="11/14/2024" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="py-2"><button>Active Reorders</button></div>
                    <div class="py-2"><button>Add to Profile</button></div>
                    <div class="py-2"><button>New Rx for Pat</button></div>
                </div>
                <div class="">
                    <label>Patient</label>
                    <input type="text" value="LEO,DAVID">
                    <label>ID</label>
                    <input type="text" value="01/31/1958">
                    <button>Find ID</button>
                    <label>Start</label>
                    <input type="text" value="01/31/1958">
                    <label>Station</label>
                    <input type="text" value="Cab">
                    <!-- <label>Room</label>
                    <input type="text" value="304">
                    <label>Floor</label>
                    <input type="text" value="3">
                    <input type="text" value="122934">
                    <label>DOB</label> -->
                </div>
            </div>


            <br>
            <br>
            <br>

            <div class=" tab-content">
                <!-- <div class="form-group">
                    <label>Patient</label>
                    <input type="text" value="LEO,DAVID">
                    <label>ID</label>
                    <input type="text" value="122934">
                    <label>DOB</label>
                    <input type="text" value="01/31/1958">
                </div> -->
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

            </div>
        </div>
    </div>
</body>

</html>