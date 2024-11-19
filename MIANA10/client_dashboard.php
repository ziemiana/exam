<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'client'){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENT DASHBOARD</title>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
<style>
body {
    font-family: 'Sono', sans-serif; 
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #F7DCB9; 
    color: #626F47; 
    text-align: center;
    margin: 0;
}

.dashboard-container {
    background-color: #ECDFCC;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 350px; 
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: relative;
}

h2 {
    color: #626F47; 
    margin-bottom: 20px;
}

.btn {
    padding: 10px 20px;
    background-color: #DA8359; 
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
    transition: background-color 0.3s ease;
    position: relative;
    display: inline-block;
}

.btn:hover {
    background-color: #A09F6F; 
}
</style>

<div class="dashboard-container">
    <h2>Welcome Client</h2>
    <div class="user">
    <p><?php echo $_SESSION['username']; ?></p>
    </div>
    <a class="btn" href="logout.php">LOGOUT</a>
</div>
</body>
</html>
