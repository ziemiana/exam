<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION PAGE</title>
</head>
<body><style>@import url('https://fonts.googleapis.com/css2?family=Sono:wght@700&display=swap');
body {
    font-family: 'Sono', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #FFDDAE;
}
.container {
    text-align: center;
    background-color: #D4F6FF;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 250px;
}
h2 {
    color: #1A1A1D;
}

input[type="text"],
input[type="password"] {
    font-family: 'Sono', sans-serif;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #C6E7FF;
    border-radius: 4px;
    background-color: #FFDDAE;
    color: #333;
    font-size: 14px;
}

input[type="submit"] {
    font-family: 'Sono', sans-serif;
    padding: 10px;
    background-color: #C6E7FF;
    border: none;
    border-radius: 4px;
    color: #333;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #D4F6FF;
}</style>
    <div class="container" style="max-width:200px; margin:0 auto;">
    <h2>REGISTRATION PAGE</h2>
    <form action="register_account.php" method="post">
        <input type="text" name="firstname" id="" placeholder="Enter firstname"required><br><br>
        <input type="text" name="lastname" id="" placeholder="Enter lastname"required><br><br>
        <input type="text" name="username" id="" placeholder="Enter username"required><br><br>
        <input type="password" name="password" id="" placeholder="Enter password"required><br><br>
        <input type="submit" name="register" id="" value="Register"style="width:170px"><br><br>
    </form>
    </div>
</body>
</html>