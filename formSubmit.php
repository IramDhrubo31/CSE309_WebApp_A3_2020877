<?php
    $link = new mysqli("localhost", "root", "", "contactmedatabase");

    if($link->connect_error){
        die("Connection Error: " . $link->connect_error);
    }

    else{
        if(isset($_POST['submit'])){
            $firstname = $_POST['firstName'];
            $lastname = $_POST['lastName'];
            $contactnumber = $_POST['contactNumber'];
            $emailaddress = $_POST['emailAddress'];
            $gender = $_POST['gender'];
            $message = $_POST['message'];

            // $sql = "INSERT INTO usertable ('firstName', 'lastName', 'contactNumber','emailAddress','gender','message') VALUES ($firstname, $lastname, $contactnumber, $emailaddress, $gender, $message)";

            $sql = "INSERT INTO usertable (firstName, lastName, contactNumber, emailAddress, gender, message) VALUES ('$firstname', '$lastname', '$contactnumber', '$emailaddress', '$gender', '$message')";

            if(mysqli_query($link, $sql)){
                header('location:statusWindow.html');
            }
            else{
                echo "<script>alert('Error: '.$sql.'<br>' . mysqli_error($link))</script>";
            }

            $link->close();
        }
    }
?>