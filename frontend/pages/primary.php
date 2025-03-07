<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style type="text/css">

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

        #h5 {
             
        }
    </style>
</style>
<body>
   
   
       

  
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
                    <td>hello world</td>
                    <td>4</td>
                </tr>
            </tbody>
        </table>
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
        <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModal" accesskey="B">DUR Builder </button>
        <button class="btn btn-custom">Show Reject Reasons</button>
        <button class="btn btn-custom" accesskey="h">Show Claim Response</button>
         <button class="btn btn-custom" accesskey="a">Clarification Codes</button> 
      
    </div>
    <div class="col-md-10">
        <button class="btn btn-custom">Add</button>
        <button class="btn btn-custom">Edit</button>
          <button class="btn btn-custom">Submit</button>
    </div>
    


<div class="col-xl-10">
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-outline-secondary">Track P/A Form Using <b>covermymeds</b></button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DUR Builder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="framework_simulator.php" href="#primary" method="POST" id="DUR">
                        <div class="form-group">
                            <label for="reason">Reason For Service Code (439-E4)</label>
                            <input type="text" class="form-control" id="reason" name="reason" required>
                        </div>
                        <div class="form-group">
                            <label for="professional">Professional For Service Code (440-E5)</label>
                            <input type="name" class="form-control" id="professional" name="professional" required>
                        </div>
                        <div class="form-group">
                            <label for="result">Result For Service Code (441-E6)</label>
                           <input type="name" class="form-control" id="result" name="result" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reason = $_POST['reason'];
            $professional = $_POST['professional'];
            $result = $_POST['result'];
          

    if ($reason == "TD" & $professional == "MO" & $result == "1B") {
        $success= "";

    } else {
        
        $error = "";
    }
            
        }
    ?>
 <script type="text/javascript">
     
 </script>

    <?php if (isset($success)) : ?>
    <?php echo '<script type="text/javascript">
    Swal.fire("Paid Claim!", "Claim Successfully Adjudicated", "success");
</script>';
 ?>

<?php elseif (isset($error)) : ?>
    <?php echo '<script type="text/javascript">
    Swal.fire("Invalid DUR sequence","ERROR","error");
</script>' ?>
<?php endif; ?>

</body>

</html>