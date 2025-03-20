<!-- This is the header of framework -->
<!-- It display RX information -->
<!-- including, reorder#, prescription#, Dispensed Date, Written Date, Patient, Station, Room, Floor, Sex, DOB, etc. -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Retrieve clarification code from session
$clarificationCode = isset($_SESSION["clarificationCode"]) ? $_SESSION["clarificationCode"] : "No clarification code saved.";
?>

<?php include '../includes/headercc.php'; ?>
<?php
require_once "db_connection.php"; 


$claim_id = 1; 

try {
    
    $stmt = $conn->prepare("SELECT quantity, day_supply FROM claims WHERE claim_id = ?");
    $stmt->execute([$claim_id]);
    $claim = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if claim is found
    if ($claim) {
        $quantity = $claim['quantity'];
        $day_supply = $claim['day_supply'];
    } else {
        $quantity = 0; // Default value if no claim is found
        $day_supply = 0; // Default value
    }
} catch (PDOException $e) {
    // Handle the exception, e.g., log it
    error_log("Database error: " . $e->getMessage());
    $quantity = 0; // Fallback if error occurs
    $day_supply = 0; // Fallback
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .input-field[readonly] {
<<<<<<< HEAD
            background-color: #f0f0f0;
            /* Light grey */
            border: 1px solid #ccc;
            /* Optional: style for borders */
            color: #333;
            /* Text color */
=======
            background-color: #f0f0f0; /* Light grey */
            border: 1px solid #ccc; /* Optional: style for borders */
            color: #333; /* Text color */
>>>>>>> c5b88a34881bdee8c96fad805ef4608d0131cd17
        }
    </style>
</head>

<!-- Drug block section-->
<div class="row mx-auto">
    <div class="col">

        <!-- Drug type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Drug
                </label>
            </div>
            <div class="col d-flex p-1">
                <div class="">
                    <input class="input-field" type="text" value="58561766245">
                </div>
                <div>
                    <input class="input-field" type="text" value="ELIQUIS TAB 10MG">

                </div>
            </div>
        </div>

        <!-- Compound type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"
                    disabled>
                <label class="form-check-label" for="exampleRadios2">
                    Compound
                </label>
            </div>
            <div class="col d-flex p-1">
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
                <div>
                    <input class="input-field" type="text" value="" readonly>

                </div>
            </div>
        </div>

        <!-- IV type -->
        <div class="d-flex form-check">
            <div class="col-2">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"
                    disabled>
                <label class="form-check-label" for="exampleRadios3">
                    IV
                </label>
            </div>
            <div class="col d-flex p-1">
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
                <div>
                    <input class="input-field" type="text" value="" readonly>
                </div>
            </div>
        </div>

        <div class="row ml-auto">

            <div class="col-2 d-flex align-items-center justify-content-between">
                <span>Associated DX</span>
            </div>

            <div class="col d-flex p-1 ">
                <input class="input-field" style="max-width: 30rem;" type="text" value="">
                <button class="input-field rounded-lg border" id="button-gradient" readonly>
                    New
                </button>
            </div>

        </div>

        <div class="row mx-auto">

            <div class="col-2 d-flex align-items-center justify-content-between">
                <span>DAW</span>
            </div>

            <div class="col d-flex p-1">
                <input class="input-field" style="max-width: 25rem;" type="text"
                    value="No product selection indicated.">
            </div>

        </div>

        <div class="row mx-auto">

            <div class="col-2 d-flex align-items-center">
                <span>MOP #1</span>
            </div>

            <div class="col-2 d-flex align-items-center p-1">
                <div class="">
                    <input class="input-field" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

            <div class="col p-1">
                <div class="d-flex align-items-center">
                    <span> Price Code </span>
                    <input class="input-field mx-2" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

            <div class="col pt-1">
                <div class="d-flex align-items-center">
                    <span> MOP #2 </span>
                    <input class="input-field mx-2" style="max-width: 5rem;" type="text" value="ADV1">
                </div>
            </div>

        </div>

        <div class="pt-2">
            <div class="row mx-auto">
                <div class="col-md-4">
                    <span class="">Direction</span>
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="Sig">Sig</label>
                        <div>
                            <input type="checkbox" name="Sig" id="Sig">
                            <span>Sequential Sigs</span>
                        </div>
                    </div>

                    <textarea rows="6" cols="25" style="resize: none" name="" id="">1T PO QD</textarea>

                </div>

                <div class="">
                    <div class="pb-2">
                        <label for="TypeChronic">Type</label>
                        <input class="input-field" style="max-width: 10rem;" type="text" value="Chronic">
                    </div>
                    <div class="border rounded-lg m-1 p-2">
                        <div class="col border rounded-lg flex-column align-items-center py-1 m-1 mx-auto">
                            <div class="">
                                <p>Admin Times</p>
                            </div>
                            <ul class="col" style="list-style-type: none;">
                                <li>8:00 AM</li>
                                <li>...</li>
                                <li>4:00 PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Partial</label>
                        <input class="input-field" type="text" style="max-width: 10rem" value="">
                    </div>



<!--qty and day supply-->
<form id="claimForm">
    <div class="d-flex align-items-center justify-content-between">
        <label for="quantity">Quantity</label>
        <input id="quantity" class="input-field" type="text" style="max-width: 5rem" value="<?= htmlspecialchars($quantity) ?>" readonly>
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <label for="day_supply">Day Supply</label>
        <input id="day_supply" class="input-field" type="text" style="max-width: 5rem" value="<?= htmlspecialchars($day_supply) ?>" readonly>
    </div>

    <!-- Icons for edit and save -->
    <i id="edit-icon" class="fa fa-edit" style="cursor: pointer;"></i>
    <i id="save-icon" class="fa fa-save" style="cursor: pointer; display: none;"></i>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#submitForm").submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            let quantity = $("#quantity").val();
            let daySupply = $("#day_supply").val();
            let clarificationCode = $("#selected_clarification_code").val(); // Get stored value

            if (!clarificationCode) {
                alert("Please select a clarification code before submitting.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "primarycc.php", // Ensure this points to the correct PHP file
                data: {
                    qty: quantity,
                    day_supply: daySupply,
                    clarification_code: clarificationCode
                },
                dataType: "json",
                success: function (response) {
                    alert("Response: " + response.status); // Show response message
                },
                error: function () {
                    alert("Error submitting claim.");
                }
            });
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let quantityField = document.getElementById("quantity");
    let daySupplyField = document.getElementById("day_supply");
    let editIcon = document.getElementById("edit-icon");
    let saveIcon = document.getElementById("save-icon");

    function enableEdit() {
        quantityField.removeAttribute("readonly");
        daySupplyField.removeAttribute("readonly");
        quantityField.style.backgroundColor = "white"; // Toggle back to normal
        daySupplyField.style.backgroundColor = "white"; // Toggle back to normal
        saveIcon.style.display = "inline"; // Show save icon
        editIcon.style.display = "none"; // Hide edit icon
    }

    function saveEdit() {
        let quantity = quantityField.value;
        let daySupply = daySupplyField.value;

        let formData = new FormData();
        formData.append("quantity", quantity);
        formData.append("day_supply", daySupply);

        fetch("update.php", { 
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response:", data);
            if (data.status === "success") {
                alert("Updated successfully!");

                // Disable fields after saving
                quantityField.setAttribute("readonly", true);
                daySupplyField.setAttribute("readonly", true);

                // Apply greyed-out style again
                quantityField.style.backgroundColor = "#f0f0f0";
                daySupplyField.style.backgroundColor = "#f0f0f0";

                // Toggle icons
                saveIcon.style.display = "none";
                editIcon.style.display = "inline";
            } else {
                alert("Update failed: " + data.message);
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    }

    // Attach click event to icons
    editIcon.addEventListener("click", enableEdit);
    saveIcon.addEventListener("click", saveEdit);

    // Handle keyboard shortcuts
    document.addEventListener("keydown", function (event) {
        if (event.key === "e" || event.key === "E") {
            enableEdit();
        }
        if (event.key === "s" || event.key === "S") {
            saveEdit();
        }
    });
});
</script>



                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Times/Day</label>
                        <input class="input-field" type="text" style="max-width: 5rem" value="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">D/C</label>
                        <input class="input-field" type="date" style="max-width: 5rem" value="">
                        :
                        <input class="input-field" type="date" style="max-width: 5rem" value="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Origin Code</label>
                        <input class="input-field" type="text" style="max-width: 7rem" value="Electronic">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Refills</label>
                        <input class="input-field" type="text" style="max-width: 5rem" value="95">
                        <input class="input-field" type="text" style="max-width: 5rem" value="4">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="">Total Qty Written</label>
                        <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <input type="checkbox"> <label for="">Cycle Fill</label>
                            </div>
                            <div>
                                <input type="checkbox"> <label for="">Profile Only</label>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <input type="checkbox"> <label for="">Treatment Drug</label>
                            </div>
                            <div>
                                <input type="checkbox"> <label for="">Significant Med</label>
                            </div>
                            <div>
                                <input type="checkbox"> <label for="">Partial Tablet</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Drug's Price -->
    <div class="col-3">
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Cost</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Fee</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="55.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Copay</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="0.00">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Discount</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="12.1">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Total Price</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="42.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for="">Actual Cost</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="100.23">
        </div>
        <div class="d-flex align-items-center justify-content-between py-1">
            <label for=""># of Labels</label>
            <input class="input-field" type="text" style="max-width: 5rem" value="1.00">
        </div>
        <div class="d-flex justify-content-between">
            <label for="">Lbl Qtys</label>
            <!-- <input type="text" style="max-width: 5rem" value="42.23"> -->
            <div class="border rounded-lg border-dark">
                <div class="border rounded-lg border-dark m-1">
                    <ul class="col overflow-auto my-2" style="list-style-type: none;">
                        <li>
                            <input class="input-field" style="max-width: 8rem;" type="text" value="30">
                        </li>
                        <li>
                            <input class="input-field" style="max-width: 8rem;" type="text" value="0">
                        </li>
                        <li>
                            <input class="input-field" style="max-width: 8rem;" type="text" value="0">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer tab pane -->
<?php include '../includes/footer-tabcc.php'; ?>