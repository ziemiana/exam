<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['role']!='admin'){
    header("Location: index.php");
    exit();
}
//include connection string
include ('database/connection.php');

//client ID is provided in the URL
if(isset($_GET['ID'])){
    $client_ID= $_GET['ID'];
    //fetch current client data
    $sql = "SELECT * FROM users WHERE ID =  '$client_ID'";
    $result = $conn->query($sql);
    //check the client is exists
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $role = $row['role'];
    }
}
else{
    header("Location: admin_dashboard.php");
}

    //update function
    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];

        //update the user data in the database using sql
        $update_sql = "UPDATE users SET
        firstname = '$firstname', 
        lastname = '$lastname', 
        role = '$role' 
        WHERE ID = '$client_ID'";

        if($conn->query($update_sql) === TRUE){
            header("Location: admin_dashboard.php?updatesuccess");
        }
        else{
            echo "Error Updating Client Data" . $conn->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PAGE</title>
</head>
<body><style>@import url('https://fonts.googleapis.com/css2?family=Sono:wght@700&display=swap');
body {
    font-family: 'Sono', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #FFF6E3;
    color: #526E48;
    text-align: center;
    }
.form-container {
    background-color: #BFECFF;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 300px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    color: #526E48;
    }
h2 {
    color: #CB9DF0;
    margin-bottom: 400px;
    position:absolute;
    }
.back{
    color: #FFCCEA;
    margin-top: 800px;
    position:absolute;
    }
input[type="text"],
select {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #CDC1FF;
    border-radius: 4px;
    background-color: #FFF6E3;
    color: #526E48;
    font-size: 14px;
    }
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #CDC1FF;
    border: none;
    border-radius: 4px;
    color: #FFF6E3;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }
input[type="submit"]:hover {
    background-color: #FFCCEA;
    }
a {
    color: #526E48;
    text-decoration: none;
    font-weight: bold;
    margin-top: 20px;
    display: inline-block;
    }
a:hover {
    color: #FFCCEA;
    }
</style>
    <h2>Edit Client Information</h2>
    <form action="" method="post">
        Firstname
        <input type="text" name="firstname" id="" required value="<?php echo $firstname; ?>"> <br><br>
        Lastname
        <input type="text" name="lastname" id="" required value="<?php echo $lastname; ?>"> <br><br>
        Role
        <select name="role" id="">
            <option value="client" <?php if($role == 'client') echo 'selected'?>>Client</option>
            <option value="admin" <?php if($role == 'admin') echo 'selected'?>>Admin</option>
        </select><br><br>
        <input type="submit" value="Update Record" name="update">
        <br><br>
    </form>
    <h2 class="back"><a href="admin_dashboard.php">Back to Admin Dashboard</a></h2>
</body>
</html>