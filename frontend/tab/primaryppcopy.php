<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/headerpp.php'; ?>
<?php
// ✅ Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* pull this */

$clarificationCode = isset($_SESSION["clarificationCode"]) ? $_SESSION["clarificationCode"] : "No clarification code saved.";
?>

<HEAD>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
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

            .modal-dialog {
                max-width: 40%;
                /* Increase the modal width */
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
                    <!--
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
    -->
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
                <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addModal" accesskey="B"
                    readonly>DUR
                    Builder </button>
                <button class="btn btn-custom">Show Reject Reasons</button>
                <button class="btn btn-custom" accesskey="h" class="btn btn-custom" data-toggle="modal" id="open-modal"
                    data-target="#ClaimModal">Show Claim Response</button>
                <button class="btn btn-custom" accesskey="a" data-bs-toggle="modal" data-bs-target="#ccModal"
                    id="ccButton">Clarification Codes</button>
            </div>
            <br>
            <div class="col-md-10">
                <!-- <button id="saveButton" class="btn btn-custom" accesskey="s">Save</button> -->
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#fieldModal"
                    accesskey="d">Add</button>
                <!-- <button class="btn btn-custom" id="editButton" accesskey="e">Edit</button> -->
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


            <!--Add modal -->
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
                            <button type="button" class="btn btn-primary" id="okButton">OK</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById("searchInput").addEventListener("input", function () {
                    let filter = this.value.toLowerCase();
                    document.querySelectorAll("#fieldTable tbody tr").forEach(row => {
                        row.style.display = row.textContent.toLowerCase().includes(filter) ? "" : "none";
                    });
                });

                document.addEventListener("keydown", function (event) {
                    if (event.ctrlKey && event.key === "f") {
                        event.preventDefault();
                        let searchInput = document.getElementById("searchInput");
                        searchInput.style.display = "block";
                        searchInput.focus();
                    }
                    if (event.altKey && event.key.toLowerCase() === "e") {
                        event.preventDefault();
                        document.getElementById("editButton")?.click();
                    }
                    if (event.altKey && event.key.toLowerCase() === "d") {
                        event.preventDefault();
                        document.getElementById("fieldModal")?.click();
                    }
                    // Remove row on "r" key press
                    if (event.key.toLowerCase() === "r") {
                        let selectedRow = document.querySelector("#userTable tr.selected");
                        if (selectedRow) {
                            let code = selectedRow.children[1].textContent.trim();
                            removeRowFromDatabase(code);  // Delete from database
                            selectedRow.remove();  // Remove row from UI
                        }
                    }
                });

                function fetchData() {
                    fetch("fetch_datapp.php")
                        .then(response => response.json())
                        .then(data => {
                            let userTable = document.getElementById("userTable");
                            userTable.innerHTML = "";

                            data.forEach(entry => {
                                let newRow = document.createElement("tr");
                                newRow.innerHTML = `
                    <td>${entry.segment}</td>
                    <td>${entry.code}</td>
                    <td><input type='text' class='valueInput' value='${entry.value}' disabled></td>
                    <td><button class="btn btn-danger btn-sm removeButton">Remove</button></td>
                `;
                                userTable.appendChild(newRow);
                            });
                        })
                        .catch(error => console.error("Error fetching data:", error));
                }

                document.addEventListener("DOMContentLoaded", fetchData);



                document.getElementById("okButton").addEventListener("click", function () {
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
            <td><input type='text' class='valueInput' placeholder='Enter value'></td>
            <td><button class="btn btn-danger btn-sm removeButton">Remove</button></td>
        `;

                        userTable.appendChild(newRow);
                    });

                    let modal = bootstrap.Modal.getInstance(document.getElementById("fieldModal"));
                    modal.hide();
                });

                document.getElementById("userTable").addEventListener("click", function (event) {
                    if (event.target.classList.contains("removeButton")) {
                        let row = event.target.closest("tr");
                        let code = row.children[1].textContent;

                        if (confirm("Are you sure you want to delete this field?")) {
                            removeRowFromDatabase(code);  // Delete from database
                            row.remove();  // Remove row from UI
                        }
                    }
                });

                function removeRowFromDatabase(code) {
                    fetch("delete_datapp.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ code: code })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Row deleted from the database successfully.");
                            } else {
                                alert("Error deleting field: " + data.error);
                            }
                        })
                        .catch(error => console.error("Error deleting field from the database:", error));
                }

                document.getElementById("saveButton").addEventListener("click", function () {
                    let updatedData = [];

                    document.querySelectorAll("#userTable tr").forEach(row => {
                        updatedData.push({
                            segment: row.children[0].textContent,
                            code: row.children[1].textContent,
                            value: row.children[2].querySelector("input").value
                        });
                    });

                    fetch("edit_datapp.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ data: updatedData })
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert("Data saved successfully!");
                            document.querySelectorAll("#userTable input").forEach(input => input.setAttribute("disabled", true));
                            document.getElementById("userTable").classList.add("table-disabled");
                            document.getElementById("editButton").removeAttribute("disabled");
                            document.getElementById("saveButton").setAttribute("disabled", true);
                        })
                        .catch(error => console.error("Error saving data:", error));
                });

                document.getElementById("editButton").addEventListener("click", function () {
                    document.querySelectorAll("#userTable input").forEach(input => input.removeAttribute("disabled"));
                    document.getElementById("userTable").classList.remove("table-disabled");
                    document.getElementById("saveButton").removeAttribute("disabled");
                    document.getElementById("editButton").setAttribute("disabled", true);
                });

                document.getElementById("submitForm").addEventListener("submit", function (event) {
                    event.preventDefault();

                    let rows = document.querySelectorAll("#userTable tr");
                    let prescriberLastName = "";
                    let quantityPrescribed = "";
                    let hasPrescriberLastName = false;
                    let hasQuantityPrescribed = false;
                    let isValid = true;
                    let headerAlert = document.querySelector(".header-alert");

                    rows.forEach(row => {
                        let code = row.children[1].textContent.trim().toLowerCase();
                        let valueInput = row.children[2].querySelector("input");
                        let value = valueInput.value.trim();

                        if (value === "") {
                            isValid = false;
                            valueInput.classList.add("is-invalid");
                        } else {
                            valueInput.classList.remove("is-invalid");
                        }

                        if (code.includes("prescriber last name")) {
                            prescriberLastName = value;
                            hasPrescriberLastName = true;
                        }
                        if (code.includes("quantity prescribed")) {
                            quantityPrescribed = value;
                            hasQuantityPrescribed = true;
                        }
                    });

                    if (!hasPrescriberLastName || !hasQuantityPrescribed) {
                        Swal.fire({
                            icon: "error",
                            title: "Missing Required Fields!",
                            text: "Both 'Prescriber Last Name' and 'Quantity Prescribed' must be added.",
                            confirmButtonColor: "#d33",
                        });
                        return;
                    }

                    if (!isValid) {
                        Swal.fire({
                            icon: "warning",
                            title: "Missing Fields!",
                            text: "Please fill in all fields before submitting.",
                            confirmButtonColor: "#3085d6",
                        });
                        return;
                    }
                    if (prescriberLastName !== "Bruno") {
                        Swal.fire({
                            icon: "error",
                            title: "Validation Error!",
                            text: "Prescriber’s Last Name must be 'Bruno'.",
                            confirmButtonColor: "#d33",
                        });
                        return;
                    }
                    if (quantityPrescribed !== "30") {
                        Swal.fire({
                            icon: "error",
                            title: "Validation Error!",
                            text: "Quantity Prescribed must be '30'.",
                            confirmButtonColor: "#d33",
                        });
                        return;
                    }

                    let delay = Math.floor(Math.random() * 5000) + 1000;

                    Swal.fire({
                        icon: "info",
                        title: "Processing...",
                        text: "Validating claim...",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: delay,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    }).then(() => {
                        headerAlert.textContent = "Claim has been adjudicated";
                        headerAlert.style.color = "green";

                        Swal.fire({
                            icon: "success",
                            title: "Paid Claim!",
                            text: "Claim has been adjudicated",
                            confirmButtonColor: "#3085d6",
                        });
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
    <?php include '../includes/footer-tabpp.php'; ?>
    </div>

</body>

</html>