<?php
include 'connection.php';
session_start();
$Rid= $_SESSION['R_id'];
$comment = $_POST['comment'];
            $post_id = $_POST['post_id'];
            $query = "INSERT INTO `comment` (`Post_id`,`R_id`,`Text`,`Date`,`Time`) VALUES('$post_id','$Rid','$comment',curdate(),curtime())";
            if (mysqli_query($conn, $query)) {
                // Data inserted successfully, redirect to 'addpost.php'
                header("Location: post.php");
                exit();
            } else {
                echo "<h3>Data not inserted!</h3>";
            }
            ?>