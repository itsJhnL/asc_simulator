<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/headercc.php'; ?>

<?php
$tempFile = "clarification_temp.json";
$clarificationCode = "";

if (file_exists($tempFile)) {
    $data = json_decode(file_get_contents($tempFile), true);
    $clarificationCode = isset($data["clarificationCode"]) ? $data["clarificationCode"] : "";
}
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
            /* font-weight: bold; */
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
                        <td>Special Packaging Indicator</td>
                        <td> <input type="text" id="specialPackagingInput" name="specialPackagingIndicator" value="" />

                        </td>
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
        <div class="col-4">
            <div class="d-flex justify-content-between">
                <label class="form-label">Amount Paid</label>
                <input type="text" style="max-width: 12rem;" class="form-control" id="amountPaid" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <label class="form-label">Third Party Copay</label>
                <input type="text" style="max-width: 12rem;" class="form-control" id="tCoPay" value="" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <label class="form-label">Auth. No.</label>
                <input type="text" style="max-width: 12rem;" class="form-control" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <label class="form-label">Private MOP </label>
                <input type="text" style="max-width: 12rem;" class="form-control" value="PRIV" readonly>
            </div>
        </div>


        <!-- Buttons -->
        <div class="col">
            <div class="d-flex align-items-center mt-6">
                <button type="button" class="btn btn-custom px-3 mr-2" data-toggle="modal" data-target="#addModal"
                    accesskey="B">DUR Builder </button>
                <button class="btn btn-custom px-3 mr-2" data-toggle="modal" data-target="#fieldModal"
                    accesskey="a">Add</button>
                <!-- moved to header -->
                <!-- <button class="btn btn-custom px-5" id="editButton" accesskey="e">Edit</button> -->
                <button class="btn btn-custom px-3 mr-2" accesskey="r">Reverse</button>
                <form id="submitForm">
                    <button class="btn btn-custom px-4 mr-2" type="submit" id="submitButton"
                        accesskey="t">Submit</button>
                </form>

            </div>

            <div class="d-flex pt-2">
                <button class="btn btn-custom">Show Reject Reasons</button>
                <button class="btn btn-custom" accesskey="h" class="btn btn-custom" data-toggle="modal" id="open-modal"
                    data-target="#ClaimModal">Show Claim Response</button>
                <button id="ccButton" class="btn-custom" accesskey="a" data-bs-toggle="modal" data-bs-target="#ccModal">
                    <?= $clarificationCode ? "Clarification Code: $clarificationCode" : "Select Clarification Code" ?>
                </button>
            </div>

            <div class="col">
                <div class="d-flex justify-content-end mt-3">

                    <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
                </div>
            </div>

            <!--Add Fields modal -->
            <div class="modal fade" id="fieldModal" tabindex="-1" aria-labelledby="fieldModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="fieldModalLabel">Add Field</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="searchInput" placeholder="Search...">

                            <table class="table table-bordered" id="fieldTable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Select</th>
                                        <th>Field Code</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Prescriber</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>366-2M</td>
                                        <td>Prescriber City Address</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>364-2J</td>
                                        <td>Prescriber First Name</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>427-DR</td>
                                        <td>Prescriber Last Name</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>498-PM</td>
                                        <td>Prescriber Phone Number</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>367-2N</td>
                                        <td>Prescriber State/Province Address</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>365-2K</td>
                                        <td>Prescriber Street Address</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>368-2P</td>
                                        <td>Prescriber Zip/Postal Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>421-DL</td>
                                        <td>Primary Care Provider ID</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>468-2E</td>
                                        <td>Primary Care Provider ID Qualifier</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>470-4E</td>
                                        <td>Primary Care Provider Last Name</td>
                                    </tr>

                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Claim</strong></td>
                                    </tr>
                                    <!-- Claim Fields -->
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>457-EP</td>
                                        <td>Associated Prescription/Service Date</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>456-EN</td>
                                        <td>Associated Prescription/Service Reference Number</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>996-G1</td>
                                        <td>Compound Type</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>357-NV</td>
                                        <td>Delay Reason Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>464-EX</td>
                                        <td>Intermediary Authorization ID</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>463-EW</td>
                                        <td>Intermediary Authorization Type ID</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>418-DI</td>
                                        <td>Level of Service</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>391-MT</td>
                                        <td>Patient Assignment Indicator</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>147-U7</td>
                                        <td>Pharmacy Service Type</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>462-EV</td>
                                        <td>Prior Authorization Number Submitted</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>461-EU</td>
                                        <td>Prior Authorization Type Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>459-ER</td>
                                        <td>Procedure Modifier Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>407-D7</td>
                                        <td>Product/Service ID</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>436-E1</td>
                                        <td>Product/Service ID Qualifier</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>460-ET</td>
                                        <td>Quantity Prescribed</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>995-E2</td>
                                        <td>Route of Administration</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>429-DT</td>
                                        <td>Special Packaging Indicator</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>600-28</td>
                                        <td>Unit of Measure</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Pricing</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>423-DN</td>
                                        <td>Basis Of Cost Determination</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>481-HA</td>
                                        <td>Flat Sales Tax Amount Submitted</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>438-E3</td>
                                        <td>Incentive Amount Submitted</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>480-H9</td>
                                        <td>Other Amount Claimed Submitted</td>
                                    </tr>

                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Coordination of Benefits/Other
                                                Payments</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>339-6C</td>
                                        <td>Other Payer ID Qualifier</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>472-6E</td>
                                        <td>Other Payer Reject Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>471-5E</td>
                                        <td>Other Payer Reject Count</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: DUR/PPS</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>476-H6</td>
                                        <td>DUR Co-Agent ID</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>475-J9</td>
                                        <td>DUR Co-Agent ID Qualifier</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>473-7E</td>
                                        <td>DUR/PPS Code Counter</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>474-8E</td>
                                        <td>DUR/PPS Level Of Effort</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>440-E5</td>
                                        <td>Professional Service Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>439-E4</td>
                                        <td>Reason For Service Code</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>441-E6</td>
                                        <td>Result of Service Code</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Coupon</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>486-ME</td>
                                        <td>Coupon Number</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>485-KE</td>
                                        <td>Coupon Type</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>487-NE</td>
                                        <td>Coupon Value Amount</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td colspan="3"><strong>Segment: Pricing</strong></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>423-DN</td>
                                        <td>Basis Of Cost Determination</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>481-HA</td>
                                        <td>Flat Sales Tax Amount Submitted</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>438-E3</td>
                                        <td>Incentive Amount Submitted</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>480-H9</td>
                                        <td>Other Amount Claimed Submitted</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="addFields">OK</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clarification Code Modal -->
            <div class="modal" id="ccModal" tabindex="-1" aria-labelledby="ccModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-light d-flex align-items-center">
                            <h5 class="modal-title" id="rxModalLabel">Rx Clarification Codes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">&#x2715;</button>
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
                                                <option value="22" data-description="22 LTC Dispensing: 7 days">22 LTC
                                                    Dispensing: 7 days</option>
                                                <option value="23" data-description="23 LTC Dispensing: 4 days">23 LTC
                                                    Dispensing: 4 days</option>
                                                <option value="24" data-description="24 LTC Dispensing: 3 days">24 LTC
                                                    Dispensing: 3 days</option>
                                                <option value="25" data-description="25 LTC Dispensing: 2 days">25 LTC
                                                    Dispensing: 2 days</option>
                                                <option value="26" data-description="26 LTC Dispensing: 1 day">26 LTC
                                                    Dispensing: 1 day</option>
                                                <option value="27" data-description="27 LTC Dispensing: 4-3 days">27 LTC
                                                    Dispensing: 4-3 days</option>
                                                <option value="28" data-description="28 LTC Dispensing: 2-2-3 days">28
                                                    LTC Dispensing: 2-2-3 days</option>
                                                <option value="29"
                                                    data-description="29 LTC Dispensing: daily and 3-day weekend">29 LTC
                                                    Dispensing: daily and 3-day weekend</option>
                                                <option value="30"
                                                    data-description="30 LTC Dispensing: Per shift dispensing">30 LTC
                                                    Dispensing: Per shift dispensing</option>
                                                <option value="31"
                                                    data-description="31 LTC Dispensing: Per med pass dispensing">31 LTC
                                                    Dispensing: Per med pass dispensing</option>
                                                <option value="32" data-description="32 LTC Dispensing: PRN on demand">
                                                    32 LTC Dispensing: PRN on demand</option>
                                                <option value="33"
                                                    data-description="33 LTC Dispensing: 7 days or less dispensing method not listed above">
                                                    33 LTC Dispensing: 7 days or less dispensing method not listed above
                                                </option>
                                                <option value="34"
                                                    data-description="34 LTC Dispensing: 14 days dispensing">34 LTC
                                                    Dispensing: 14 days dispensing</option>
                                            </select>
                                        </td>
                                        <td id="description"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="okButton" class="btn btn-primary me-2"
                                data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="clarificationCode" id="clarificationCodeInput"
                value="<?= htmlspecialchars($clarificationCode) ?>">


            <!-- add fields -->
            <script>
                document.getElementById("addFields").addEventListener("click", function () {
                    let checkboxes = document.querySelectorAll("#fieldTable tbody input[type='checkbox']:checked");
                    let userTable = document.getElementById("userTable");

                    checkboxes.forEach(checkbox => {
                        let row = checkbox.closest("tr");
                        let code = row.children[1].textContent;
                        let description = row.children[2].textContent;

                        let newRow = document.createElement("tr");
                        newRow.innerHTML = `
                            <td>Prescriber</td>
                            <td>${description}</td>
                            <td>
                            <input type="text" class='valueInput' id="specialPackagingInput" name="specialPackagingIndicator" value="" onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()"/>
                            <button class="btn btn-danger btn-sm removeButton">Remove</button></td>
                        `;

                        userTable.appendChild(newRow);
                    });

                    let modal = bootstrap.Modal.getInstance(document.getElementById("fieldModal"));
                    modal.hide();
                });
            </script>
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
                    let specialPackagingInput = document.getElementById("specialPackagingInput");
                    let saveButton = document.getElementById("saveButton");
                    let editButton = document.getElementById("editButton");
                    let specialPackagingRow = specialPackagingInput.closest("tr");

                    specialPackagingInput.value = "";
                    localStorage.removeItem("specialPackagingIndicator");

                    function disableInputsAndTable() {
                        document.querySelectorAll("input, select, textarea").forEach(el => el.disabled = true);
                        document.querySelectorAll("table").forEach(table => table.classList.add("disabled-table"));
                    }

                    function enableInputsAndTable() {
                        document.querySelectorAll("input, select, textarea").forEach(el => el.disabled = false);
                        document.querySelectorAll("table").forEach(table => table.classList.remove("disabled-table"));
                    }

                    function disableButtonsExceptReverse() {
                        document.querySelectorAll(".btn-custom").forEach(button => {
                            if (button.getAttribute("accesskey") !== "r") {
                                button.disabled = true;
                            }
                        });
                    }

                    function enableAllButtons() {
                        document.querySelectorAll(".btn-custom").forEach(button => {
                            button.disabled = false;
                        });
                    }
                    let claimStatus = localStorage.getItem("claimStatus");
                    if (claimStatus === "paid") {
                        headerAlert.textContent = "Claim has been adjudicated";
                        headerAlert.style.color = "green";
                        disableInputsAndTable();
                        disableButtonsExceptReverse();
                    }


                    saveButton.addEventListener("click", function () {
                        let value = specialPackagingInput.value.trim();

                        if (!value) {
                            Swal.fire("Error", "Special Packaging Indicator cannot be empty.", "error");
                            return;
                        }
                        localStorage.setItem("specialPackagingIndicator", value);
                        specialPackagingRow.classList.add("disabled-row");
                        specialPackagingInput.disabled = true;
                        saveButton.disabled = true;
                        editButton.disabled = false;
                    });

                    editButton.addEventListener("click", function () {
                        specialPackagingRow.classList.remove("disabled-row");
                        specialPackagingInput.disabled = false;
                        saveButton.disabled = false;
                        editButton.disabled = true;
                    });

                    let savedCode = sessionStorage.getItem("clarificationCode");
                    if (savedCode) {
                        ccButton.textContent = `Clarification Code: ${savedCode}`;
                        ccButton.style.background = "yellow";
                        ccButton.style.color = "black";
                        ccButton.style.border = "2px solid black";

                        let hiddenInput = document.getElementById("clarificationCodeInput") || document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "clarificationCode";
                        hiddenInput.id = "clarificationCodeInput";
                        hiddenInput.value = savedCode;
                        submitForm.appendChild(hiddenInput);
                    }

                    okButton.addEventListener("click", function () {
                        let select = document.getElementById("valueSelect");
                        let selectedCode = select.value;

                        if (!selectedCode) {
                            Swal.fire("Error", "Please select a clarification code.", "error");
                            return;
                        }
                        sessionStorage.setItem("clarificationCode", selectedCode);
                        ccButton.textContent = `Clarification Code: ${selectedCode}`;
                        ccButton.style.background = "yellow";
                        ccButton.style.color = "black";
                        ccButton.style.border = "2px solid black";

                        let hiddenInput = document.getElementById("clarificationCodeInput") || document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "clarificationCode";
                        hiddenInput.id = "clarificationCodeInput";
                        hiddenInput.value = selectedCode;
                        submitForm.appendChild(hiddenInput);

                        bootstrap.Modal.getInstance(document.getElementById("ccModal")).hide();
                    });

                    submitForm.addEventListener("submit", function (event) {
                        event.preventDefault();
                        let formData = new FormData(submitForm);
                        let storedSPI = localStorage.getItem("specialPackagingIndicator");
                        let selectedCode = document.getElementById("clarificationCodeInput")?.value;

                        if (!storedSPI || storedSPI !== "4") {
                            Swal.fire("Error", "Claim cannot be paid. Special Packaging Indicator must be set to '4'.", "error");
                            return;
                        }

                        if (!selectedCode) {
                            Swal.fire("Error", "No clarification code selected.", "error");
                            return;
                        }
                        formData.append("specialPackagingIndicator", storedSPI);

                        Swal.fire({
                            title: "Processing...",
                            text: "Checking clarification code and day supply...",
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });

                        let delay = Math.floor(Math.random() * 5000) + 1000;

                        setTimeout(() => {
                            fetch("submit_clarification.php", {
                                method: "POST",
                                body: formData
                            })
                                .then(response => response.json())
                                .then(result => {
                                    Swal.close();
                                    if (result.success) {

                                        localStorage.setItem("claimStatus", "paid");
                                        headerAlert.textContent = "Claim has been adjudicated";
                                        headerAlert.style.color = "green";
                                        disableInputsAndTable();
                                        disableButtonsExceptReverse();
                                        let randomAmountPaid = (Math.random() * (100 - 10) + 10).toFixed(2);
                                        let randomCoPay = (Math.random() * (20 - 1) + 1).toFixed(2);
                                        document.getElementById("amountPaid").value = `$${randomAmountPaid}`;
                                        document.getElementById("tCoPay").value = `$${randomCoPay}`;
                                        Swal.fire({
                                            icon: "success",
                                            title: "Claim has been adjudicated!",
                                            text: "Paid claim",
                                            confirmButtonText: "OK"
                                        });

                                    } else {
                                        Swal.fire("Error", result.message, "error");
                                    }
                                })
                                .catch(error => console.error("Error:", error));
                        }, delay);
                    });
                    document.querySelector(".btn-custom[accesskey='r']").addEventListener("click", function () {
                        localStorage.removeItem("claimStatus");
                        sessionStorage.removeItem("clarificationCode");
                        ccButton.textContent = "Select Clarification Code";
                        ccButton.style.background = "";
                        ccButton.style.color = "";
                        ccButton.style.border = "";

                        let hiddenInput = document.getElementById("clarificationCodeInput");
                        if (hiddenInput) {
                            hiddenInput.remove();
                        }
                        Swal.fire({
                            title: "Reversing Claim...",
                            text: "Restoring system to default...",
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });
                        setTimeout(() => {
                            Swal.close();
                            headerAlert.textContent = "Claim has been denied.";
                            headerAlert.style.color = "red";
                            enableInputsAndTable();
                            enableAllButtons();
                            Swal.fire({
                                icon: "info",
                                title: "Reversed!",
                                text: "The claim has been reversed successfully."
                            });
                        }, 2000);
                    });
                });
            </script>




            <!-- Claim Response Modal-->
            <div class="modal fade" id="ClaimModal" tabindex="-1" aria-labelledby="ClaimModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="font-style: 14px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="error.png" alt="Error" width="30" class="me-2">
                            <h5 class="modal-title" id="ClaimModalLabel">The Claim Has Been Rejected</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                Close
                            </button>
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