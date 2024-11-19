<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sono:wght@700&display=swap');
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    font-family: 'Sono', sans-serif;
    background-color: #FCFAEE;
    }

.container {
    text-align: center;
    background-color: #ECDFCC;
    padding: 30px; 
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 400px; 
    width: 100%;
    }
h2 {
    color: #A5B68D;
    margin-bottom: 20px;
    }
input[type="text"],
input[type="password"] {
    padding: 12px; 
    margin-bottom: 20px; 
    border: 1px solid #A5B68D;
    border-radius: 5px;
    background-color: #FCFAEE;
    font-size: 14px;
    color: #526E48;
    font-family: 'Sono', sans-serif;
    width: 100%; 
    box-sizing: border-box;
    }
input[type="submit"] {
    padding: 12px 0; 
    background-color: #DA8359;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-family: 'Sono', sans-serif;
    width: 100%; 
    box-sizing: border-box;
    }
input[type="submit"]:hover {
    background-color: #A5B68D;
    }
a.reg {
    display: inline-block;
    margin-top: 15px;
    font-size: 14px;
    color: #DA8359;
    text-decoration: none;
    font-family: 'Sono', sans-serif;
    }
a.reg:hover {
    color: #A5B68D;
    text-decoration: underline;}
</style>

    <div class="container">
        <h2>LOGIN</h2>
        <form action="authenticate.php" method="post">
            <input type="text" name="username" id="" placeholder="Enter Username" required> <br><br>
            <input type="password" name="password" id="" placeholder="Enter Password" required> <br><br>
            <input type="submit" value="LOGIN" name="login" id="">
        </form>
        <a href="register.php" class="reg">Create an Account</a>
    </div>
</body>
</html>