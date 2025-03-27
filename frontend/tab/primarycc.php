<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/headercc.php'; ?>
<?php
// ✅ Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* pull this */

$clarificationCode = isset($_SESSION["clarificationCode"]) ? $_SESSION["clarificationCode"] : "No clarification code saved.";
?>

<head>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .header-alert {
            color: red;
            font-weight: bold;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            padding: 10px;
            margin-top: 15px;
        }

        .btn-custom {
            background: linear-gradient(to bottom, #b0c4de, #88a3d1);
            border: 1px solid #1d3c6a;
            color: #000;
            font-family: Arial, sans-serif;

            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.7);
        }

        .btn-custom:hover {
            background: linear-gradient(to bottom, #88a3d1, #b0c4de);
        }

        .modal-header {

            background: linear-gradient(to right, #D0D8F0, #A2B5E0);
            padding: 5px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: black;
            border-bottom: 1px solid #6B85B8;
        }

        .modal-container {
            display: none;
        }

        .selected-row {
            background-color: #f0f8ff !important;
            font-weight: bold;
        }

        #userTable tr:hover {
            background-color: #f0f8ff !important;
            font-weight: bold;
            cursor: pointer;
        }

    .disabled-table {
        background-color: #e0e0e0 !important;
        /* Gray background */
        pointer-events: none;
        /* Disable interactions */
        opacity: 0.5;
        /* Fade out text */
    }
    @media (min-width: 1200px) {
    .modal-xl {
        max-width: 95%;
    }
    .yellow-btn {
    background-color: yellow !important;
    color: black !important;
    border-color: black !important;
}


</style>
</HEAD>

<body>
    <!-- Drug block section-->
    <div>

        <div class="row">
            <div class="col-12">
                <p class="header-alert">This claim has been denied!!</p>
            </div>
            <div class="col-md-6">
                <label class="form-label">Transaction Type</label>
                <input type="text" class="form-control" value="Billing">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <button class="btn btn-primary ms-2">Submit P/A Request</button>
            </div>
        </div>

        <!-- Main Table Section -->
        <div class="table-container">
            <h3 style="background: linear-gradient(to bottom, #6a8eb2, #2f4f7f);
    color: white;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    padding: 5px;
    border: 1px solid #1e3b5a;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.3);">Optional ECS Fields</h3>
            <table class="table table-bordered">
                <thead style="background: linear-gradient(to bottom, #6a8eb2, #2f4f7f);
    color: white;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    padding: 5px;
    border: 1px solid #1e3b5a;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.3);">
                <tr>
                    <th>Segment</th>
                    <th>Code</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Claim</td>
                    <td>Product/Service ID Qualifier</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Claim</td>
                    <td>Special Packaging Indicator</td>
                    <td>4</td>
                </tr>
            </tbody>
            <tbody id="userTable">
                <!-- User input will be inserted here -->
            </tbody>
        </table>
    </div>
</div>




    <!-- Footer Section -->
    <div class="row mt-3">
        <div class="col-md-2">
            <label class="form-label">Amount Paid</label>
            <input type="text" class="form-control">

            <label class="form-label">Third Party Copay</label>
            <input type="text" class="form-control" value="">

        </div>
        <div class="col-md-4">
            <label class="form-label">Auth. No.</label>
            <input type="text" class="form-control">

            <label class="form-label">Private MOP </label>
            <input type="text" class="form-control" value="PRIV">
        </div>



        <div class="col-md-5">

        <div class="d-flex justify-content-between mt-6">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addModal" accesskey="B">DUR
                Builder </button>
            <button class="btn btn-custom">Show Reject Reasons</button>
            <button class="btn btn-custom" accesskey="h" class="btn btn-custom" data-toggle="modal" id="open-modal"
                data-target="#ClaimModal">Show Claim Response</button>
                <button class="btn btn-custom" accesskey="a" data-bs-toggle="modal" data-bs-target="#ccModal" id="ccButton">Clarification Codes</button>        </div>
        <br>
        <div class="col-md-10">
            <button class="btn btn-custom" id="addButton">Add</button>
            <button class="btn btn-custom" id="editButton" accesskey="e">Edit</button>
            <button class="btn btn-custom" accesskey="r">Reverse</button>

                <form id="submitForm">
                    <button class="btn btn-custom" type="submit" id="submitButton" accesskey="t">Submit</button>
                </form>

            </div>


            <div class="col-xl-10">
                <div class="d-flex justify-content-end mt-3">

                    <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
                </div>
            </div>

        <!-- Modal DUR
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">DUR Builder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="DUR">
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason For Service Code (439-E4)</label>
                                <input type="text" class="form-control" id="reason" required>
                            </div>
                            <div class="mb-3">
                                <label for="professional" class="form-label">Professional Service Code (440-E5)</label>
                                <input type="text" class="form-control" id="professional" required>
                            </div>
                            <div class="mb-3">
                                <label for="result" class="form-label">Result Code (441-E6)</label>
                                <input type="text" class="form-control" id="result" required>
                            </div>

                            <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
-

        <!-- Clarification code Modal -->
     
<!-- Clarification Code Modal -->
<div class="modal" id="ccModal" tabindex="-1" aria-labelledby="ccModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light d-flex align-items-center">
                <h5 class="modal-title" id="rxModalLabel">Rx Clarification Codes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clarificationForm">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Patient</label>
                            <input type="text" class="form-control" value="DOMINGO, JUAN PAUL" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="form-label">Reorder #</label>
                            <input type="text" class="form-control" value="3189" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Prescription #</label>
                            <input type="text" class="form-control" value="52155823" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="form-label">Dispensed</label>
                            <input type="text" class="form-control" value="03/17/2025" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">RxBatch</label>
                            <input type="text" class="form-control" value="REJECT" disabled>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Value</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select id="valueSelect" class="form-select form-select-lg mb-3" 
                                        aria-label=".form-select-lg example" onchange="updateDescription()">
                                    <option value="" disabled selected>-- Select a Code --</option>
                                    <option value="22" data-description="22 LTC Dispensing: 7 days">22 LTC Dispensing: 7 days</option>
                                    <option value="23" data-description="23 LTC Dispensing: 4 days">23 LTC Dispensing: 4 days</option>
                                    <option value="24" data-description="24 LTC Dispensing: 3 days">24 LTC Dispensing: 3 days</option>
                                    <option value="25" data-description="25 LTC Dispensing: 2 days">25 LTC Dispensing: 2 days</option>
                                    <option value="26" data-description="26 LTC Dispensing: 1 day">26 LTC Dispensing: 1 day</option>
                                    <option value="27" data-description="27 LTC Dispensing: 4-3 days">27 LTC Dispensing: 4-3 days</option>
                                    <option value="28" data-description="28 LTC Dispensing: 2-2-3 days">28 LTC Dispensing: 2-2-3 days</option>
                                    <option value="29" data-description="29 LTC Dispensing: daily and 3-day weekend">29 LTC Dispensing: daily and 3-day weekend</option>
                                    <option value="30" data-description="30 LTC Dispensing: Per shift dispensing">30 LTC Dispensing: Per shift dispensing</option>
                                    <option value="31" data-description="31 LTC Dispensing: Per med pass dispensing">31 LTC Dispensing: Per med pass dispensing</option>
                                    <option value="32" data-description="32 LTC Dispensing: PRN on demand">32 LTC Dispensing: PRN on demand</option>
                                    <option value="33" data-description="33 LTC Dispensing: 7 days or less dispensing method not listed above">33 LTC Dispensing: 7 days or less dispensing method not listed above</option>
                                    <option value="34" data-description="34 LTC Dispensing: 14 days dispensing">34 LTC Dispensing: 14 days dispensing</option>
                                </select>
                            </td>
                            <td id="description"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="okButton" class="btn btn-primary me-2" data-bs-dismiss="modal">Ok</button>
                </div>
        </div>
    </div>
</div>
<input type="hidden" id="selected_clarification_code" name="selected_clarification_code">




            <!--description update code -->
            <script>
                function updateDescription() {
                    const selectElement = document.getElementById('valueSelect');
                    const descriptionCell = document.getElementById('description');

                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    const description = selectedOption ? selectedOption.getAttribute('data-description') : '';

        descriptionCell.textContent = description; 
    }
    </script>
    <!--end of despcription code -->

            <!--submit button code -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
             document.addEventListener("DOMContentLoaded", function () {
    let okButton = document.getElementById("okButton");
    let ccButton = document.getElementById("ccButton");
    let submitForm = document.getElementById("submitForm");
    let headerAlert = document.querySelector(".header-alert");

    function disableInputsAndTable() {
        document.querySelectorAll("input, select, textarea").forEach(element => {
            element.disabled = true;
        });

        document.querySelectorAll("table").forEach(table => {
            table.classList.add("disabled-table");
        });
    }

    function enableInputsAndTable() {
        document.querySelectorAll("input, select, textarea").forEach(element => {
            element.disabled = false;
        });

        document.querySelectorAll("table").forEach(table => {
            table.classList.remove("disabled-table");
        });
    }

    okButton.addEventListener("click", function () {
        let select = document.getElementById("valueSelect");
        let selectedCode = select.value;

        if (!selectedCode) {
            Swal.fire("Error", "Please select a clarification code.", "error");
            return;
        }

        let data = {
            clarificationCode: selectedCode,
            patient: "DOMINGO, JUAN PAUL",
            prescriptionNumber: "52155823",
        };

        fetch("save_clarification.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    Swal.fire("Success", "Clarification code saved successfully!", "success");

                    ccButton.textContent = `Clarification Code: ${selectedCode}`;
                    ccButton.style.background = "yellow";
                    ccButton.style.color = "black";
                    ccButton.style.border = "2px solid black";
                    ccButton.style.fontWeight = "bold";
                    ccButton.style.boxShadow = "none";
                    ccButton.style.transition = "background-color 0.3s ease";

                    let hiddenInput = document.getElementById("clarificationCodeInput");
                    if (!hiddenInput) {
                        hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "clarificationCode";
                        hiddenInput.id = "clarificationCodeInput";
                        submitForm.appendChild(hiddenInput);
                    }
                    hiddenInput.value = selectedCode;

                    let modalElement = document.getElementById("ccModal");
                    let modalInstance = bootstrap.Modal.getInstance(modalElement);
                    modalInstance.hide();
                } else {
                    Swal.fire("Error", "Error saving clarification code.", "error");
                }
            })
            .catch(error => console.error("Error:", error));
    });

    submitForm.addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(submitForm);
        let selectedCode = document.getElementById("clarificationCodeInput")?.value;

        if (!selectedCode) {
            Swal.fire("Error", "No clarification code selected.", "error");
            return;
        }

        Swal.fire({
            title: "Processing...",
            text: "Checking clarification code and day supply...",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
        });

        fetch("submit_clarification.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                let delay = Math.floor(Math.random() * 5000) + 1000;

                setTimeout(() => {
                    Swal.close();

                    if (result.success) {
                        Swal.fire("✅ Paid Claim", result.message, "success");

                        headerAlert.textContent = "Claim has been adjudicated";
                        headerAlert.style.color = "green";

                        // ✅ Disable inputs & tables but keep buttons active
                        disableInputsAndTable();
                    } else {
                        Swal.fire("Error", result.message, "error");
                    }
                }, delay);
            })
            .catch(error => console.error("Error:", error));
    });

    // ✅ Reverse Button Function (Enables Everything Again)
    document.querySelector(".btn-custom[accesskey='r']").addEventListener("click", function () {
        Swal.fire({
            title: "Reversing Claim...",
            text: "Restoring system to default...",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
        });

        setTimeout(() => {
            Swal.close();
            document.querySelector(".header-alert").textContent = "Claim has been denied.";
            document.querySelector(".header-alert").style.color = "red";

            // ✅ Enable inputs & tables (buttons stay active)
            enableInputsAndTable();

            Swal.fire({ icon: "info", title: "Reversed!", text: "The claim has been reversed successfully." });
        }, 2000);
    });
});


            </script>



            <!-- Claim Response Modal-->
            <div class="modal fade" id="ClaimModal" tabindex="-1" aria-labelledby="ClaimModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="font-style=14px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="error.png" alt="Error" width="30" class="me-2" style="align=left;">
                            <h5 class="modal-title" id="ClaimModalLabel">The Claim Has Been Rejected</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Code</th>
                                        <th>Field Name</th>
                                        <th>Value</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="table-primary">
                                        <td colspan="3">Response Patient</td>
                                    </tr>
                                    <tr>
                                        <td>310-CA</td>
                                        <td>Patient First Name</td>
                                        <td>JUAN PAUL</td>
                                    </tr>
                                    <tr>
                                        <td>311-CB</td>
                                        <td>Patient Last Name</td>
                                        <td>DOMINGO</td>
                                    </tr>
                                    <tr>
                                        <td>304-C4</td>
                                        <td>Date of Birth</td>
                                        <td>19350701</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="3">Response Status</td>
                                    </tr>
                                    <tr>
                                        <td>112-AN</td>
                                        <td>Transaction Response Status</td>
                                        <td>R - Rejected</td>
                                    </tr>
                                    <tr>
                                        <td>103-F3</td>
                                        <td>Authorization Number</td>
                                        <td>250692965796008999</td>
                                    </tr>
                                    <tr>
                                        <td>510-FA</td>
                                        <td>Reject Count</td>
                                        <td>04</td>
                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Reject Code</td>
                                        <td>34 - M/I submission Clarification Code</td>
                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Reject Code</td>
                                        <td>7X - Day Supply Exceeds Plan Limitation</td>
                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Reject Code</td>
                                        <td>613 - The Packaging Methodology Or Dispensing Frequency is Missing or
                                            Inappropriate Form</td>
                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Reject Code</td>
                                        <td>569 - Provide Beneficiary with CMS Notice of Appeal Rights</td>

                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Additional Message Information</td>
                                        <td>RESIDENCE LTC-SCC (21 THRU 36) REQUIRED M/I SUBMISSION CLARIFICATION CODE
                                            DAYS SUPPLY EXCEEDED PLAN LIMITATIONS</td>

                                    </tr>

                                    <tr class="table-primary">
                                        <td colspan="3">Response Claim</td>
                                    </tr>
                                    <tr>
                                        <td>455-EM</td>
                                        <td>Prescription/Service Reference Number</td>
                                        <td>1- Rx Billing</td>
                                    </tr>
                                    <tr>
                                        <td>402-D2</td>
                                        <td>Prescription/Service Reference Number</td>
                                        <td>52025688</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="close-btn">Close</button>
                            <button type="button" class="btn btn-primary">Print</button>
                            <button type="button" class="btn btn-outline-info">Print Medicare Part D Coverage
                                Determination
                                Request</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end of claim response modal -->



    <!-- footer tab pane -->
    <?php include '../includes/footer-tabcc.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>