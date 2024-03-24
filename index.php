<!DOCTYPE html>
<html>
<head>
    <title>Styled Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="connect.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount">
        <br>
        <label for="date">Date:</label>
        <input type="date" name="date">
        <br>
        <label for="time">Time:</label>
        <input type="time" name="time">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //  database parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "passion";
    
    // create  a connection to the database

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection

    if ($conn->connect_error){
        die("connection failed: " .$con->connect_error);

    }

    // get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // prepare and bind the sql statement

    $stmt = $conn->prepare("INSERT INTO form_data(name, email, password, amount, date, time) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("sssiis",$name, $email, $password, $amount, $date,$time);

    // execute the statement
    if ($stmt->execute()){
        echo " successfull";

    } else {
        echo "Error " . $stmt->error;
    }
    // close the statement and connection
    $stmt->close();
    $conn->close();

}

?>
</html>
