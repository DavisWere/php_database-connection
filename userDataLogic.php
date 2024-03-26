<?php
 include 'connect.php';
 Global $conn; 


 if($_SERVER["REQUEST_METHOD"]=="POST"){

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