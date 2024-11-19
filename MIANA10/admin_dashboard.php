<?php 
session_start(); 
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){     
    header("Location: index.php"); 
} 

// Include connection string 
include('database/connection.php'); 

// Create a variable for search query 
$search_query = ''; 

// Check if search query is submitted 
if (isset($_GET['search'])) {     
    $search_query = $conn->real_escape_string($_GET['search']); 
} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>ADMIN DASHBOARD</title>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@400;500&display=swap" rel="stylesheet">
</head> 
<body> 
    <style> 
body {     
    display: flex;     
    justify-content: center;     
    align-items: center;     
    min-height: 100vh;     
    margin: 0;     
    font-family: 'Sono', sans-serif; 
    background-color: #D8BFD8;      
    color: white;     
    text-align: center; 
    }
.container {     
    max-width: 800px;     
    padding: 20px;     
    background-color: #C9A0DC;     
    border-radius: 8px;     
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); 
    width: 100%;
    }

h2 {     
    color: white;     
    margin-bottom: 20px; 
    }
table {     
    width: 100%;     
    margin-top: 20px;     
    border-collapse: collapse;     
    background-color: #f0e6f6;     
    color: black; 
    border-radius: 10px;  
    }
table th, table td {     
    padding: 10px;     
    border: 1px solid #C9A0DC;     
    text-align: center;
    }
    input[type="text"] {     
    width: 70%;     
    padding: 8px;     
    margin-bottom: 15px;     
    border: none;     
    border-radius: 5px;     
    background-color: #e6ccf2;     
    font-size: 14px; 
    }
input[type="submit"], a {     
    padding: 8px 15px;     
    color: white;     
    background-image: linear-gradient(45deg, #6a5acd, #8a2be2, #4b0082);      
    text-decoration: none;     
    font-size: 14px;     
    border: none;     
    border-radius: 5px;     
    cursor: pointer;     
    transition: background-color 0.3s ease, transform 0.3s ease; 
    }
input[type="submit"]:hover, a:hover {     
    transform: scale(1.05);     
    background-image: linear-gradient(45deg, #4b0082, #6a5acd, #8a2be2); 
    }
.logout {     
    display: inline-block;     
    margin-top: 10px;     
    padding: 8px 15px;     
    background-color: #4b0082;     
    color: white;     
    border-radius: 5px;     
    text-decoration: none;     
    font-size: 14px;     
    transition: background-color 0.3s; 
    }
.logout:hover {     
    background-color: #6a5acd;  
    transform: scale(1.05);
    }
.btn {     
    display: inline-block;     
    margin-top: 10px;     
    padding: 8px 15px;     
    background-color: #4b0082;     
    color: black;     
    border-radius: 5px;     
    text-decoration: none;     
    font-size: 14px;     
    transition: background-color 0.3s;   
    font-family: 'Sono', sans-serif; 
    }
form {     
    margin-bottom: 20px; 
    }
</style> 
    <div class="container">
        <h2>Welcome Admin</h2>   
        <div class="user"><?php echo $_SESSION['username'];?></div>     
        <a href="logout.php" class="logout">LOGOUT</a><br><br>     
        <form action="" method="get">
            <input class="btn" type="text" name="search" placeholder="Search by username" value="<?php echo $search_query; ?>">
            <input class="btn" type="submit" value="Search">
        </form><br>     
        <table border="1">         
            <tr>             
                <th>#</th>             
                <th>Username</th>             
                <th>Firstname</th>             
                <th>Lastname</th>             
                <th>Role</th>             
                <th>Action</th>         
            </tr>         
            <?php         
            // Modify SQL query based on search input 
            if(!empty($search_query)) {             
                $sql = "SELECT * FROM users WHERE role='client' AND username LIKE '%$search_query%'";         
            } else {             
                $sql = "SELECT * FROM users WHERE role = 'client'";         
            }         
            
            // Execute SQL query 
            $result = $conn->query($sql);         
            
            // Check if any client exists 
            if($result->num_rows > 0) {             
                // Loop through and display each client record 
                $count = 1;             
                while($row = $result->fetch_assoc()) {                 
                    echo "<tr>";                 
                    echo "<td>$count</td>";                 
                    echo "<td>".$row['username']."</td>";                 
                    echo "<td>".$row['firstname']."</td>";                 
                    echo "<td>".$row['lastname']."</td>";                 
                    echo "<td>".$row['role']."</td>";                 
                    echo "<td>";                 
                    echo "<a href='edit_client.php?ID=".$row['ID']."'>Edit</a> | ";                 
                    echo "<a href='delete_client.php?ID=".$row['ID']."' onclick='return confirm(\"Are you sure you want to delete this client?\");'>Delete</a>";                 
                    echo "</td>";                 
                    echo "</tr>";                 
                    $count++;             
                }         
            } else {             
                echo "<tr><td colspan='6'>No records found!</td></tr>";         
            }         
            ?>     
        </table>
    </div>

</body> 
</html>
