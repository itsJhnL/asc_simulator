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
</style>

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
        <h5 style="background: linear-gradient(to bottom, #6a8eb2, #2f4f7f);
    color: white;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    padding: 5px;
    border: 1px solid #1e3b5a;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.3);">Optional ECS Fields</h5>
        <table class="table table-bordered">
            <thead>
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



    <div class="col-md-6">

        <div class="d-flex justify-content-between mt-6">
            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addModal" accesskey="B">DUR
                Builder </button>
            <button class="btn btn-custom">Show Reject Reasons</button>
            <button class="btn btn-custom" accesskey="h" class="btn btn-custom" data-toggle="modal" id="open-modal"
                data-target="#ClaimModal">Show Claim Response</button>
            <button class="btn btn-custom" accesskey="a">Clarification Codes</button>

        </div>
        <div class="col-md-10">
            <button class="btn btn-custom">Add</button>
            <button class="btn btn-custom">Edit</button>
            <form id="submitForm"> <button class="btn btn-custom" type="submit" id="button"
                    accesskey="t">Submit</button></form>

        </div>



        <div class="col-xl-10">
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
            </div>
        </div>

        <!-- Modal DUR-->
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
        <!-- Claim Response Modal-->
        <div class="modal fade" id="ClaimModal" tabindex="-1" aria-labelledby="ClaimModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ClaimModalLabel">The Claim Has Been Rejected</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <td colspan="3">Response Insurance</td>
                                </tr>
                                <tr>
                                    <td>524-F0</td>
                                    <td>Plan ID</td>
                                    <td>PART-D</td>
                                </tr>
                                <tr>
                                    <td>302-C2</td>
                                    <td>Cardholder ID</td>
                                    <td>123427572</td>
                                </tr>
                                <tr class="table-primary">
                                    <td colspan="3">Response Patient</td>
                                </tr>
                                <tr>
                                    <td>310-CA</td>
                                    <td>Patient First Name</td>
                                    <td>LEO</td>
                                </tr>
                                <tr>
                                    <td>311-CB</td>
                                    <td>Patient Last Name</td>
                                    <td>DAVY</td>
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
                                    <td>01</td>
                                </tr>
                                <tr>
                                    <td>511-FB</td>
                                    <td>Reject Code</td>
                                    <td>69 - Filled After Coverage Terminated</td>
                                </tr>
                                <tr>
                                    <td>526-FQ</td>
                                    <td>Additional Message Information</td>
                                    <td>Coverage Terminated - 03/31/24</td>
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
                        <button type="button" class="btn btn-outline-info">Print Medicare Part D Coverage Determination
                            Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <script>
    $(document).ready(function () {
        $("#open-modal").click(function () {
            $("#ClaimModal").fadeIn();
        });

        $("#close-btn").click(function () {
            $("#ClaimModal").fadeOut();
        });

        // Close modal when clicking outside of modal-content
        $(document).mouseup(function (e) {
            var modal = $(".modal-content");
            if (!modal.is(e.target) && modal.has(e.target).length === 0) {
                $("#ClaimModal").fadeOut();
            }
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let users = [];

    function updateTable() {
        let tableBody = document.getElementById("userTable");
        tableBody.innerHTML = "";

        users.forEach((user, index) => {
            let row = `
                <tr>
                    <td>DUR/PPS</td>
                    <td>Reason For Service Code</td>
                    <td>${user.reason}</td>
                </tr>
                <tr>
                    <td>DUR/PPS</td>
                    <td>Professional Service Code</td>
                    <td>${user.professional}</td>
                </tr>
                <tr>
                    <td>DUR/PPS</td>
                    <td>Result Code</td>
                    <td>${user.result}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    }

    // ✅ Handle Save Button
    document.querySelector("#saveButton").addEventListener("click", function () {
        let reason = document.getElementById("reason").value;
        let professional = document.getElementById("professional").value;
        let result = document.getElementById("result").value;

        if (!reason || !professional || !result) {
            Swal.fire({
                icon: "warning",
                title: "Missing Fields",
                text: "Please fill in all fields before saving.",
            });
            return;
        }

        users.push({ reason, professional, result });
        updateTable();
        document.getElementById("DUR").reset();

        let modalElement = document.getElementById("addModal");
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();
    });

    // ✅ Handle Submit Form
    document.getElementById("submitForm").addEventListener("submit", function (e) {
        e.preventDefault();

        if (users.length === 0) {
            Swal.fire({
                icon: "error",
                title: "No Data!",
                text: "Please add some data before submitting.",
            });
            return;
        }

        Swal.fire({
            title: "Submitting...",
            text: "Please wait while we process your request.",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
        });

        fetch("function.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(users),
        })
            .then(response => response.json())
            .then(data => {
                Swal.close();

                if (data.status === "success") {
                    let alertMessage = document.querySelector(".header-alert");
            if (alertMessage) {
                alertMessage.textContent = "Claim has been adjudicated!";
                alertMessage.style.color = "green"; // Change text color to green
            }

                    Swal.fire({
                        icon: "success",
                        title: "Paid!",
                        text: "Claim successfully adjudicated",
                    });

                    // ✅ Do NOT clear users array, keep data in the table
                    updateTable();

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid DUR Sequence!",
                        text: data.message,
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Server Error",
                    text: "Something went wrong. Please try again.",
                });
            });
    });
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