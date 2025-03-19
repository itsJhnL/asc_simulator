<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejection Simulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: "Poppins", sans-serif;
            color: white;
        }

        .container {
            max-width: 450px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .btn-modern {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            color: white;
            font-size: 1.3rem;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 12px rgba(255, 120, 150, 0.5);
        }

        .btn-modern:hover {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(255, 120, 150, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title" id="loading-text"></h1>
        <p>Click the button below to generate your RX Number</p>
        <button class="btn btn-modern" onclick="generateRx()">Generate RX</button>
    </div>

    <script>
        function generateRx() {
            window.location.href = "submit.php";
        }

        const text = "Welcome to Rejection Simulator!";
        let index = 0;

        function typeText() {
            if (index < text.length) {
                document.getElementById("loading-text").innerHTML += text.charAt(index);
                index++;
                setTimeout(typeText, 100);
            }
        }

        $(document).ready(function() {
            $(".container").hide().fadeIn(1000);
            typeText();
        });
    </script>
</body>
</html>
