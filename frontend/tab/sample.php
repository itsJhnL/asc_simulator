<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Selection Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-dialog {
            max-width: 90%;
        }
        .modal-body table {
            font-size: 0.75rem;
        }
        .table-secondary {
            background-color: darkblue !important;
            color: white;
        }
        th, td {
            padding: 4px !important;
        }
        #searchInput {
            margin-bottom: 10px;
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fieldModal" id="openModalBtn" accesskey="d">Open Modal</button>
    
    <div class="modal fade" id="fieldModal" tabindex="-1" aria-labelledby="fieldModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                            <tr><td><input type="checkbox"></td><td>366-2M</td><td>Prescriber City Address</td></tr>
                            <tr><td><input type="checkbox"></td><td>364-2J</td><td>Prescriber First Name</td></tr>
                            <tr><td><input type="checkbox"></td><td>427-DR</td><td>Prescriber Last Name</td></tr>
                            <tr><td><input type="checkbox"></td><td>498-PM</td><td>Prescriber Phone Number</td></tr>
                            <tr><td><input type="checkbox"></td><td>367-2N</td><td>Prescriber State/Province Address</td></tr>
                            <tr><td><input type="checkbox"></td><td>365-2K</td><td>Prescriber Street Address</td></tr>
                            <tr><td><input type="checkbox"></td><td>368-2P</td><td>Prescriber Zip/Postal Code</td></tr>
                            <tr><td><input type="checkbox"></td><td>421-DL</td><td>Primary Care Provider ID</td></tr>
                            <tr><td><input type="checkbox"></td><td>468-2E</td><td>Primary Care Provider ID Qualifier</td></tr>
                            <tr><td><input type="checkbox"></td><td>470-4E</td><td>Primary Care Provider Last Name</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#fieldTable tbody tr");
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });

        document.addEventListener("keydown", function(event) {
            if (event.ctrlKey && event.key === "f") {
                event.preventDefault();
                document.getElementById("searchInput").focus();
            }
        });
    </script>
</body>
</html>
