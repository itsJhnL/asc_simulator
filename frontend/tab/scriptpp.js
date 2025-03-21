// 🔍 Search Functionality
// 🔍 Search Functionality
document.getElementById("searchInput").addEventListener("input", function () {
    let filter = this.value.toLowerCase();
    document.querySelectorAll("#fieldTable tbody tr").forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filter) ? "" : "none";
    });
});

// 🎹 Keyboard Shortcuts
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
            fetch("delete_datapp.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ code: code })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert("Field deleted successfully!");
                    row.remove();
                } else {
                    alert("Error deleting field: " + data.error);
                }
            })
            .catch(error => console.error("Error deleting field:", error));
        }
    }
});


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

// ✏️ Enable Editing
document.getElementById("editButton").addEventListener("click", function () {
    document.querySelectorAll("#userTable input").forEach(input => input.removeAttribute("disabled"));
    document.getElementById("userTable").classList.remove("table-disabled");
    document.getElementById("saveButton").removeAttribute("disabled");
    document.getElementById("editButton").setAttribute("disabled", true);
});

document.getElementById("submitButton").addEventListener("click", function () {
    let rows = document.querySelectorAll("#userTable tr");
    let finalData = [];
    let prescriberLastName = "";
    let quantityPrescribed = "";
    let isValid = true;

    rows.forEach(row => {
        let segment = row.children[0].textContent;
        let code = row.children[1].textContent;
        let valueInput = row.children[2].querySelector("input");
        let value = valueInput.value.trim();

        if (value === "") {
            isValid = false;
            valueInput.classList.add("is-invalid"); // Highlight missing fields
        } else {
            valueInput.classList.remove("is-invalid");
        }

        if (code.toLowerCase().includes("prescriber last name")) {
            prescriberLastName = value;
        }
        if (code.toLowerCase().includes("quantity prescribed")) {
            quantityPrescribed = value;
        }

        finalData.push({ segment, code, value });
    });

    // 🔍 Validation Logic
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

    // 🟢 If all conditions are met, proceed to submission
    fetch("functionpp.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ data: finalData })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: "success",
                title: "Paid Claim!",
                text: "Data submitted successfully!",
                confirmButtonColor: "#3085d6",
            }).then(() => {
                // Optionally disable inputs after submission
                document.querySelectorAll("#userTable input").forEach(input => input.setAttribute("disabled", true));

                // Optionally disable the submit button after completion
                document.getElementById("submitButton").setAttribute("disabled", true);
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Submission Failed!",
                text: data.error || "An error occurred while submitting the data.",
                confirmButtonColor: "#d33",
            });
        }
    })
    .catch(error => {
        console.error("Error submitting data:", error);
        Swal.fire({
            icon: "error",
            title: "Network Error!",
            text: "There was an issue connecting to the server.",
            confirmButtonColor: "#d33",
        });
    });
});

    </script>