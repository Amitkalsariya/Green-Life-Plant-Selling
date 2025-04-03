<?php 

include('connection.php');
$u_id = $_SESSION['R_id'];

 function RandomString($conn)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';

        for ($i = 0; $i < 16; $i++) {
            $randstring .= $characters[rand(0,strlen($characters))];
        }


        $check_id = mysqli_query($conn,"select * from checkout where order_id='$randstring'");

        $cnt = mysqli_num_rows($check_id);

        if($cnt==0){
            return $randstring;
        }else{
            RandomString($conn);
        }
    }

    $order_number = RandomString($conn);


    if (isset($_REQUEST['submit1'])) {
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $emailid = $_REQUEST['emailid'];
        $phonenumber = $_REQUEST['phonenumber'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zip = $_REQUEST['zip'];

        $sql = "INSERT INTO checkout(firstname,lastname,emailid,phonenumber,address,city,state,zip,order_id) 
        VALUES('$firstname','$lastname','$emailid','$phonenumber','$address','$city','$state','$zip','$order_number')";
        $insert = mysqli_query($conn,$sql);
        if($insert){ 
            $_SESSION['order_id']=$order_number;
            header('Location:thankyou.php');
        }else{
            echo "not working";
        }
    }

mysqli_query($conn,"update cart set status=1 where u_id=$u_id");

 ?>