<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Entry</title>
    <style>
        body {
            background: #d4d4d4;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(255, 255, 255, 0.8);
            width: 400px;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-box {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background: #e0e0e0;
            box-shadow: inset 3px 3px 5px rgba(0, 0, 0, 0.2), inset -3px -3px 5px rgba(255, 255, 255, 0.7);
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            background: linear-gradient(145deg, #ffffff, #d4d4d4);
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3), -3px -3px 5px rgba(255, 255, 255, 0.7);
            transition: all 0.2s;
        }

        .btn:active {
            box-shadow: inset 3px 3px 5px rgba(0, 0, 0, 0.3), inset -3px -3px 5px rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rx Entry - Batch Reject - Reject</h1>
        <div class="form-group">
            <label>Reorder #</label>
            <input type="text" value="26647" class="input-box">
            <label>Prescription #</label>
            <input type="text" value="602801" class="input-box">
            <label>Dispensed</label>
            <input type="date" value="2025-03-22" class="input-box">
        </div>
        
        <div class="form-group">
            <label>Patient</label>
            <input type="text" value="DOMINGO, JUAN PAUL" class="input-box">
            <label>Sex</label>
            <input type="text" value="F" class="input-box">
            <label>DOB</label>
            <input type="date" value="1964-12-29" class="input-box">
        </div>

        <div class="form-group">
            <label>Prescriber</label>
            <input type="text" value="Bruno, Davy" class="input-box">
        </div>

        <div class="buttons">
            <button class="btn">Active Reorders</button>
            <button class="btn">Add to Profile</button>
            <button class="btn">New Rx for Pat</button>
        </div>
    </div>
</body>
</html>
