<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include 'header.php'; ?>
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

        .modal-body table {
            font-size: 0.85rem;
            /* Reduce font size */
        }

        th,
        td {
            padding: 4px !important;
        }

        #searchInput {
            margin-bottom: 10px;
            width: 100%;
            padding: 5px;
            display: none;
        }

        .table-disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    }

    .table-data {
        background: linear-gradient(to bottom, #6a8eb2, #2f4f7f);
        color: white;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        padding: 5px;
        border: 1px solid #1e3b5a;
        border-radius: 3px;
        box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.3);
    }
</style>

<body>

    <!-- Drug block section-->
    <div>

        <div class="row">
            <div class="col-12">
                <p class="header-alert">This claim has been denied!!</p>
            </div>
            <div class="col-md-6">
                <label class="form-label">Transaction Type</label>
                <input type="text" class="form-control" value="Billing" readonly>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <button class="btn btn-custom">Submit P/A Request</button>
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
                        <th class="col-2">Segment</th>
                        <th class="col-5">Code</th>
                        <th class="col-5">Value</th>
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

        <div class="col">
            <div class="d-flex align-items-center mt-6">
                <button type="button" class="btn btn-custom px-3 mr-2" data-toggle="modal" data-target="#addModal"
                    accesskey="B">DUR Builder </button>
                <button class="btn btn-custom px-3 mr-2" data-toggle="modal" data-target="#addFields"
                    accesskey="a">Add</button>
                <button class="btn btn-custom px-3 mr-2" accesskey="r">Reverse</button>
                <form id="submitForm">
                    <button class="btn btn-custom px-4 mr-2" type="submit" id="submitButton"
                        accesskey="t">Submit</button>
                </form>

            </div>
            <div class="d-flex pt-2">
                <button class="btn btn-custom px-3 mr-2">Show Reject Reasons</button>
                <button class="btn btn-custom px-3 mr-2" accesskey="h" class="btn btn-custom px-3" data-toggle="modal"
                    id="" data-target="#ClaimModal">Show Claim Response</button>
                <button class="btn btn-custom px-3" accesskey="a">Clarification Codes</button>
            </div>

            <div class="col">
                <div class="d-flex justify-content-end mt-3">

                    <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
                </div>
            </div>

            <!-- Modal DUR-->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" style="font-size: 14px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">DUR Builder</h6>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="DUR">
                                <div class="mb-3">
                                    <label for="reason" class="form-label">Reason For Service Code (439-E4)</label>
                                    <input type="text" class="form-control" id="reason" onkeyup="lettersOnly(this)"
                                        oninput="this.value = this.value.toUpperCase()" required>
                                </div>
                                <div class="mb-3">
                                    <label for="professional" class="form-label">Professional Service Code
                                        (440-E5)</label>
                                    <input type="text" class="form-control" id="professional"
                                        onkeyup="lettersOnly(this)" oninput="this.value = this.value.toUpperCase()"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="result" class="form-label">Result Code (441-E6)</label>
                                    <input type="text" class="form-control" id="result" onkeyup="lettersOnly(this)"
                                        oninput="this.value = this.value.toUpperCase()" required>
                                </div>

                                <button type="button" class="btn btn-primary" id="saveDurButton">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Show Claim Response Modal-->
            <div class="modal fade " id="ClaimModal" tabindex="-1" aria-labelledby="ClaimModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="font-style: 14px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="images/error.png" alt="Error" width="25" class="mr-2">
                            <h6 class="modal-title text-danger">The Claim Has Been Rejected</h6>
                            <button type="button" class="btn close px-3" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Field Name</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>401-D1</td>
                                        <td>Date of Service</td>
                                        <td>3/10/2025</td>
                                    </tr>
                                    <tr class="table-primary">

                                        <td colspan="3">Response Claim</td>
                                    </tr>
                                    <tr>
                                        <td>455-EM</td>
                                        <td>Prescription/Service Reference Number Queue</td>
                                        <td>1- Rx Billing</td>
                                    </tr>
                                    <tr>
                                        <td>402-D2</td>
                                        <td>Prescription/Service Reference Number </td>
                                        <td>00075445151848</td>
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
                                        <td>01</td>
                                    </tr>
                                    <tr>
                                        <td>511-FB</td>
                                        <td>Reject Code</td>
                                        <td>88 - DUR Reject Error</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="3">Response DUR/PPS</td>
                                    </tr>
                                    <tr>
                                        <td>567-J6</td>
                                        <td>DUR/PPS Response Code Counter</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>439-E4</td>
                                        <td>Reason For Service Code</td>
                                        <td>DD- Drug-Drug Interaction</td>
                                    </tr>
                                    <tr>
                                        <td>528-FS</td>
                                        <td>Clinical Significance Code</td>
                                        <td>2- Moderate</td>
                                    </tr>
                                    <tr>
                                        <td>529-FT</td>
                                        <td>Other Pharmacy Indicator</td>
                                        <td>1- Your Pharmacy </td>
                                    </tr>
                                    <tr>
                                        <td>530-FU</td>
                                        <td>Previous Date of fill</td>
                                        <td>1- 20250317 </td>
                                    </tr>
                                    <tr>
                                        <td>531-FV</td>
                                        <td>Quantity of Previous fill</td>
                                        <td>000012000 </td>
                                    </tr>
                                    <tr>
                                        <td>531-FW</td>
                                        <td>Database Indicator</td>
                                        <td>1- First Databank </td>
                                    </tr>
                                    <tr>
                                        <td>533-FX</td>
                                        <td>Other Prescriber Indicator</td>
                                        <td>2- Other Prescriber </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                Close
                            </button>
                            <!-- <button type="button" class="btn btn-primary">Print</button>
                            <button type="button" class="btn btn-outline-info">Print Medicare Part D Coverage
                                Determination
                                Request</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Fields Modal -->
            <div class="modal fade" id="addFields" tabindex="-1" aria-labelledby="fieldModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" id="">OK</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let users = [];
        let selectedId = null;
        const reverseButton = document.querySelector(".btn-custom[accesskey='r']");
        reverseButton.disabled = true;

        function toggleInputs(disable) {
            document.querySelectorAll(".btn-custom, input, select, textarea").forEach(element => {
                if (element !== reverseButton) {
                    element.disabled = disable;
                }
            });
        }

        function updateTable() {
            let tableBody = document.getElementById("userTable");
            tableBody.innerHTML = "";

            users.forEach((user, index) => {
                let rowGroup = `
                <tr class="selectable-row" data-id="${index}">
                    <td>DUR/PPS</td>
                    <td>Reason For Service Code</td>
                    <td class="editable" data-field="reason" data-id="${index}">${user.reason}</td>
                </tr>
                <tr>
                    <td>DUR/PPS</td>
                    <td>Professional Service Code</td>
                    <td class="editable" data-field="professional" data-id="${index}">${user.professional}</td>
                </tr>
                <tr>
                    <td>DUR/PPS</td>
                    <td>Result Code</td>
                    <td class="editable" data-field="result" data-id="${index}">${user.result}</td>
                </tr>
            `;
                tableBody.innerHTML += rowGroup;
            });
        }

        document.getElementById("userTable").addEventListener("click", function (event) {
            if (event.target.classList.contains("editable")) {
                let cell = event.target;
                let field = cell.getAttribute("data-field");
                let id = parseInt(cell.getAttribute("data-id"));
                let currentValue = cell.textContent;

                let input = document.createElement("input");
                input.type = "text";
                input.value = currentValue;
                input.classList.add("form-control");

                cell.innerHTML = "";
                cell.appendChild(input);
                input.focus();

                input.addEventListener("blur", function () {
                    users[id][field] = input.value;
                    updateTable();
                });

                input.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {
                        input.blur();
                    }
                });
            }
        });

        document.getElementById("saveDurButton").addEventListener("click", function () {
            let reason = document.getElementById("reason").value;
            let professional = document.getElementById("professional").value;
            let result = document.getElementById("result").value;

            if (!reason || !professional || !result) {
                Swal.fire({
                    icon: "warning",
                    title: "Missing Fields",
                    text: "Please fill in all fields."
                });
                return;
            }

            if (selectedId !== null) {
                users[selectedId] = {
                    reason,
                    professional,
                    result
                };
            } else {
                users.push({
                    reason,
                    professional,
                    result
                });
            }

            updateTable();
            document.getElementById("DUR").reset();
            selectedId = null;
            // bootstrap.Modal.getInstance(document.getElementById("addModal")).hide();

            // let modal = bootstrap.Modal.getInstance(document.getElementById("saveDurButton"));
            // modal.hide();
            
        });

        document.getElementById("submitForm").addEventListener("submit", function (e) {
            e.preventDefault();

            if (users.length === 0) {
                Swal.fire({
                    icon: "error",
                    title: "No Data!",
                    text: "Please add some data before submitting."
                });
                return;
            }

            Swal.fire({
                title: "Submitting...",
                text: "Processing your request...",
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading(),
            });

            fetch("function.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(users),
            })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    if (data.status === "success") {
                        document.getElementById("userTable").classList.add("disabled-table");
                        toggleInputs(true);
                        document.querySelector(".header-alert").textContent = "Claim has been adjudicated!";
                        document.querySelector(".header-alert").style.color = "green";
                        reverseButton.disabled = false;

                        let randomAmountPaid = (Math.random() * (100 - 10) + 10).toFixed(2);
                        let randomCoPay = (Math.random() * (20 - 1) + 1).toFixed(2);
                        document.getElementById("amountPaid").value = `$${randomAmountPaid}`;
                        document.getElementById("tCoPay").value = `$${randomCoPay}`;

                        Swal.fire({
                            icon: "success",
                            title: "Paid Claim!",
                            text: "Claim adjudicated."
                        });

                    } else {

                        Swal.fire({
                            icon: "error",
                            title: "Invalid DUR Sequence!",
                            text: "Please check the DUR sequence and try again."
                        });
                    }
                })
                .catch(() => {
                    Swal.fire({
                        icon: "error",
                        title: "Server Error",
                        text: "Something went wrong."
                    });
                });
        });

        reverseButton.addEventListener("click", function () {
            Swal.fire({
                title: "Reversing Claim...",
                text: "Restoring system to default...",
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
            setTimeout(() => {
                Swal.close();
                document.querySelector(".header-alert").textContent = "This claim has been denied!!";
                document.querySelector(".header-alert").style.color = "red";
                document.getElementById("userTable").classList.remove("disabled-table");
                toggleInputs(false);
                document.getElementById("amountPaid").value = "";
                document.getElementById("tCoPay").value = "";
                Swal.fire({
                    icon: "info",
                    title: "Reversed!",
                    text: "The claim has been reversed successfully."
                });
                reverseButton.disabled = true;
            }, 2000);
        });

        updateTable();
    });
</script>

<!-- footer tab pane -->
<?php include 'footer-tab.php'; ?>
</div>