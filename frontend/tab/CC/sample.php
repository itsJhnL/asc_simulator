<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUR Builder</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .btn-custom {
            background-color: #2f4f7f;
            color: white;
            border: none;
            padding: 8px 12px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: #1e3b5a;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h5 class="text-center p-2 text-white" style="background: linear-gradient(to bottom, #6a8eb2, #2f4f7f); border-radius: 5px;">
        Optional ECS Fields
    </h5>
    
    <div class="table-container">
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

    <!-- Buttons Section -->
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal">
            DUR Builder
        </button>
        <button class="btn btn-custom">Show Reject Reasons</button>
        <button class="btn btn-custom">Show Claim Response</button>
        <button class="btn btn-custom">Clarification Codes</button>
    </div>
</div>

<!-- Modal -->
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
                        <input type="text" class="form-control" id="reason" name="reason" required>
                    </div>
                    <div class="mb-3">
                        <label for="professional" class="form-label">Professional Service Code (440-E5)</label>
                        <input type="text" class="form-control" id="professional" name="professional" required>
                    </div>
                    <div class="mb-3">
                        <label for="result" class="form-label">Result Code (441-E6)</label>
                        <input type="text" class="form-control" id="result" name="result" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
let users = []; 


function updateTable() {
    let tableBody = document.getElementById("userTable");
    tableBody.innerHTML = ""; 

    users.forEach((user) => {
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


document.getElementById("DUR").addEventListener("submit", function(e) {
    e.preventDefault();

    let reason = document.getElementById("reason").value;
    let professional = document.getElementById("professional").value;
    let result = document.getElementById("result").value;

    if (reason && professional && result) {
        users.push({ reason, professional, result });
        updateTable(); 

        // Reset form fields
        document.getElementById("DUR").reset();

        // Close the modal
        let modalElement = document.getElementById("addModal");
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (!modalInstance) {
            modalInstance = new bootstrap.Modal(modalElement);
        }
        modalInstance.hide();
    }
});
</script>

</body>
</html>
