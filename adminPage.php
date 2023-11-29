<?php 
    session_start();
    if(!$_SESSION['name'] == "iram"){
        header('location:adminLogin.html');
    }

    $link = $link = new mysqli("localhost", "root", "", "contactmedatabase");
    
    if($link->connect_error){
        die("Connection Error: " . $link->connect_error);
    }

    else{
        $sql = 'SELECT * FROM usertable';
        $res = mysqli_query($link, $sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main>
        <section class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="my-4">Contact Table</h1>

            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email Address</th>
                        <th>Gender</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(mysqli_num_rows($res) > 0){
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows["id"];
                                echo '<tr>
                                    <td>' .$rows["firstName"].'</td>
                                    <td>' .$rows["lastName"].'</td>
                                    <td>' .$rows["contactNumber"].'</td>
                                    <td>' .$rows["emailAddress"].'</td>
                                    <td>' .$rows["gender"].'</td>
                                    <td>' .$rows["message"].'</td>
                                </tr>';
                            }
                        } 
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>