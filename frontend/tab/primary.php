<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php include '../includes/header.php'; ?>
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

    /* .btn-custom {
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
    } */

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
                <button class="btn btn-custom px-3 mr-2" id="addButton" accesskey="a">Add</button>
                <!-- moved to header -->
                <!-- <button class="btn btn-custom px-5" id="editButton" accesskey="e">Edit</button> -->
                <button class="btn btn-custom px-3 mr-2" accesskey="r">Reverse</button>
                <form id="submitForm">
                    <button class="btn btn-custom px-4 mr-2" type="submit" id="submitButton"
                        accesskey="t">Submit</button>
                </form>

            </div>
            <div class="d-flex pt-2">
                <button class="btn btn-custom px-3 mr-2">Show Reject Reasons</button>
                <button class="btn btn-custom px-3 mr-2" accesskey="h" class="btn btn-custom px-3" data-toggle="modal"
                    id="open-modal" data-target="#ClaimModal">Show Claim Response</button>
                <button class="btn btn-custom px-3 mr-2" accesskey="a">Clarification Codes</button>
            </div>

            <div class="col">
                <div class="d-flex justify-content-end mt-3">

                    <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
                </div>
            </div>

            <!-- Modal DUR-->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DUR Builder</h5>
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


            <!-- Claim Response Modal-->
            <div class="modal fade" id="ClaimModal" tabindex="-1" aria-labelledby="ClaimModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-light d-flex">
                            <div class="d-flex align-items-center">
                                <img src="error.png" alt="Error" width="30" class="me-2">
                                <h5 class="pl-2 modal-title text-danger fw-bold" id="ClaimModalLabel">The Claim Has Been
                                    Rejected
                                </h5>
                            </div>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
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

                                    <!-- TD MO 1B -->
                                    <tr>
                                        <td>567-J6</td>
                                        <td>DUR/PPS Response Code Counter</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>439-E4</td>
                                        <td>Reason For Service Code</td>
                                        <td>TD - Therapeutic-Duplicate Interaction</td>
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

                                    <!-- DD MO 1B -->

                                    <tr>
                                        <td>567-J6</td>
                                        <td>DUR/PPS Response Code Counter</td>
                                        <td>2</td>
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
                            <button type="button" class="btn btn-primary btn-close" data-dismiss="modal"
                                aria-label="Close">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary" style="cursor: not-allowed;" disabled>Print</button>
                            <button type="button" class="btn btn-outline-info" style="cursor: not-allowed;" disabled>Print Medicare Part D Coverage
                                Determination
                                Request</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
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

        document.getElementById("userTable").addEventListener("click", function(event) {
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

                input.addEventListener("blur", function() {
                    users[id][field] = input.value;
                    updateTable();
                });

                input.addEventListener("keydown", function(e) {
                    if (e.key === "Enter") {
                        input.blur();
                    }
                });
            }
        });

        document.getElementById("saveDurButton").addEventListener("click", function() {
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
            bootstrap.Modal.getInstance(document.getElementById("addModal")).hide();
        });

        document.getElementById("submitForm").addEventListener("submit", function(e) {
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

            fetch("functionDUR2.php", {
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

        reverseButton.addEventListener("click", function() {
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
<?php include '../includes/footer-tab.php'; ?>
</div>

<!-- Bootstrap JS (required for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Sweet Alert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>