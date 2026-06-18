<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ramo Tech App</title>

<style>
    body {
        margin: 0;
        font-family: Arial;
        background: linear-gradient(180deg, #0f172a, #1e293b);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .container {
        text-align: center;
        width: 90%;
        max-width: 350px;
    }

    .logo {
        width: 80px;
        height: 80px;
        margin: auto;
        background: #38bdf8;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    h1 {
        margin: 10px 0;
        font-size: 22px;
    }

    p {
        opacity: 0.7;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 14px;
        margin-bottom: 12px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
    }

    .primary {
        background: #38bdf8;
        color: black;
        font-weight: bold;
    }

    .secondary {
        background: transparent;
        border: 1px solid #38bdf8;
        color: #38bdf8;
    }

    .btn:active {
        transform: scale(0.98);
    }
</style>
</head>
<body>

<div class="container">

    <div class="logo">RT</div>

    <h1>Ramo Tech</h1>
    <p>Real Estate Platform</p>

    <button class="btn primary" onclick="goApp()">Enter App</button>
    <button class="btn secondary" onclick="login()">Login / Register</button>

</div>

<script>
function goApp() {
    window.location.href = "/dashboard";
}

function login() {
    alert("Login page coming soon");
}
</script>

</body>
</html>