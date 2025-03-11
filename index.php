<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejection Simulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

        /* Smooth gradient background */
body {
    background: radial-gradient(circle, #1e3c72 10%, #2a5298 100%);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-family: "Poppins", sans-serif;
    color: white;
    overflow: hidden;
    position: relative;
}

/* Title Styling with Typing Effect */
.title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 20px;
    display: inline-block;
}

/* Blinking Cursor */
.cursor {
    font-size: 3rem;
    font-weight: bold;
    color: #ff758c;
    animation: blink 1s infinite;
}

@keyframes blink {
    50% { opacity: 0; }
}

.invisible {
    opacity: 0;
}

/* Glassmorphic Box */
.glass-box {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 40px;
    max-width: 400px;
    margin: auto;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.glass-box:hover {
    transform: scale(1.02);
    box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.3);
}

.box-title {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Modern Button */
.btn-modern {
    background: linear-gradient(135deg, #ff7eb3, #ff758c);
    color: white;
    font-size: 1.5rem;
    padding: 15px 30px;
    border: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    display: inline-block;
    box-shadow: 0px 5px 15px rgba(255, 120, 150, 0.4);
    position: relative;
    overflow: hidden;
}

/* Button Text */
.btn-modern span {
    position: relative;
    z-index: 1;
}

/* Glowing Hover Effect */
.btn-modern::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 10%, transparent 70%);
    transition: all 0.4s ease;
    transform: translate(-50%, -50%) scale(0);
}

.btn-modern:hover::before {
    transform: translate(-50%, -50%) scale(1);
}

.btn-modern:hover {
    background: linear-gradient(135deg, #ff758c, #ff7eb3);
    box-shadow: 0px 10px 25px rgba(255, 120, 150, 0.6);
}

/* Responsive */
@media (max-width: 768px) {
    .title {
        font-size: 2.5rem;
    }

    .glass-box {
        padding: 30px;
    }

    .btn-modern {
        font-size: 1.2rem;
    }
}

    </style>
</head>
<body>

    <div class="container text-center">
        <h1 class="title">
            <span id="loading-text"></span>
            <span class="cursor">|</span>
        </h1>

<div class="glass-box">
    <h1>Generate RX Number</h1>
    <button class="btn btn-modern" onclick="generateRx()" name="generate">Generate RX</button>
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

        
        setInterval(() => {
            document.querySelector(".cursor").classList.toggle("invisible");
        }, 500);

        $(document).ready(function() {
            $(".container").hide().fadeIn(1000);
            typeText(); 
        });
</script>

</body>
</html>
