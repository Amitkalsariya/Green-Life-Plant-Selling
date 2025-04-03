
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Entry Page</title>
</head>

<body>
    <?php
    session_start();

    $servername = "localhost"; 
    $username = "root"; 
    $passwordDB = "";
  
    $database = "glife";

  
    $fullname = $_POST['fname'];
    $contactno = $_POST['cnumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Full name : " . $fullname . "<br>" .
        "Email address : " . $email  . "<br>";
        
        

    // Create a connection 
    $conn = mysqli_connect($servername, $username, $passwordDB, $database);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // if (isset($category)) {
    //     $sql = "insert into registeruser (name, number, email, password) values ('$fullname', '$contactno','$email', '$password')";
    // } else {
       
    // }

    // $emailCheck="select * from user where (email='$email');";

    // $res=mysqli_query($conn,$emailCheck);
    
    // if (mysqli_num_rows($res) > 0) {
        
    //     $row = mysqli_fetch_assoc($res);
    //     if($email==isset($row['email']))
    //     {
    //         echo "email already exists";
    //     }
    // }

    // else{

    //     $sql = "insert into user (email, name, contact, password) values ('$email', '$fullname','$contactno', '$password')";

    //     if ($conn->query($sql) === TRUE) {
    //         // echo "New record created successfully";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    // }

        $sql = "insert into user (email, name, contact, password) values ('$email', '$fullname','$contactno', '$password')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    $conn->close();

    ?>
</body>

</html>