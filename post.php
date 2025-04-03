<?php
// Start the session
session_start();
$Rid = $_SESSION['R_id'];

if(!isset($_SESSION['R_id']))
{
    header('location:Login.php');
}
error_reporting(0);

include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!-- Title -->
    <title>Green Life</title>


    <!-- Favicon -->
    <link rel="icon" href="F.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
        .row {
            display: flex;
            align-items: center;
            /* margin-top: 30px; */
        }

        textarea {
            border-radius: 15px;
        }

        .box1 img {
            height: 300px;
            width: 350px;
            padding: 2px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 25), 0 10px 10px rgba(0, 0, 0, 22);
            border-color: white;
            border-radius: 20px;
            opacity: 0.9;
            background-color: white;
            transition: #f2f2f2;
        }
         
        .favi{
            height: 50px;
        }
        
        .box1 {
            float: left;
            padding: 11px;
            margin: 32px;
            border: 0px solid black;
            border-radius: 1%;
            width: 36%
        }

        .box2 {
            float: right;
            margin-left: 100%;
            padding: 20px;
            margin: 3px;
            height: 500px;
            width: 64%;
            border: 0px solid black;
            border-radius: 1%;
            overflow: auto;
        }

        .box3 {
            width: 100%;
            clear: both;
        }

        .comment-img {
            height: 80px;
            width: 80px;
            border-radius: 50%;
            margin-right: 22px;
        }

        .sendbtn {
            background-color: green;
            color: white;
        }

        .sendbtn:hover {
            background-color: white;
            color: black;
        }

        .breadcrumb-area .breadcrumb {
            padding-bottom: 0px;
        }
    </style>
</head>

<body>
     
    <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-circle"></div>
            <div class="preloader-img">
                <img src="img/core-img/leaf.png" alt="" class="favi">
            </div>
        </div>


    <!-- ##### Header Area Start ##### -->
    <?php include('header.php');?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(4.jpeg);">
            <h2>Post</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <div class="container">
        <section>
            <div class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <a href="addpost.php" 
                name = "addpost" 
                style="border: 0px solid;
                 color:white;
                 border-radius:10%;
                 box-shadow: 0 10px 10px rgba(0, 0, 0, 25),0 10px 10px rgba(0, 0, 0, 22);
                 opacity: 0.8;
                 background-color: #006400;
                 font-size: 34px;  
                 width: 250px; 
                 padding: 12px;">
                 <i class='fa fa-plus'>&nbsp;&nbsp;Create Post</i></a> -->
                <form action="addpost.php">
                    <nav style="text-align:center;">
                        <ul>
                            <Button id="submit" onclick="addpost.php" name="addpost"> <i class='fa fa-plus'>&nbsp;&nbsp;Create Post</i>
                                <span></span><span></span><span></span><span></span><span></span>
                            </button>
                        </ul>
                    </nav>
                </form>
            </div>
        </section>
    </div><br><br>

    <div class="container">
        <section class="post">
            <div>

                <?php
                $select_posts = mysqli_query($conn, "SELECT post.*, user.name , user.image_name FROM post JOIN user ON post.R_id = user.R_id ORDER BY Date DESC,Time DESC;");
                if (mysqli_num_rows($select_posts) > 0) {
                    while ($fetch_post = mysqli_fetch_assoc($select_posts)) {
                ?>

                        <div style="background: lightgoldenrodyellow;padding-top: 0px;border-radius: 10px;margin-bottom: 40px;padding-bottom:20px; background-color: #88B04B;">
                            <div style="display:flex; border-bottom:1px solid white;padding-top: 20px;background-color: #064709;;border-radius: 10px;">
                                <div>
                                    <img style="height: 100px;width: 100px;border-radius: 50%;margin-bottom: 20px;margin-left:40px;" src="images/user_images/<?php echo $fetch_post['image_name']; ?>" alt="">&nbsp;&nbsp;
                                </div>
                                <div>
                                    <h3 style="padding-top: 18px;font-size: 45px;padding-left: 15px; color:white;"><?php echo $fetch_post['name']; ?></h3>
                                </div>
                            </div>
                            <div style="display: flex;margin-right: 20px;margin-left: 20px;background-color: transparent;border-radius: 10px;margin-bottom: 0px; margin-top:20px;">
                                <div class="box1">
                                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $fetch_post['Post_id']; ?>">
                                    <img src="images/<?php echo $fetch_post['Post_image']; ?>" alt="">&nbsp;&nbsp;
                                    <h2 style="font-size: 30px;font-weight: bold; margin-top: 30px;text-align: center; color:white">Caption: <?php echo $fetch_post['Caption'] ?></h2><br>
                                </div>

                                <div class="box2">
                                    <form id="commentForm" action="insertcomment.php" method="POST">
                                        <label style="font-size: 30px;margin-bottom: 20px; color:white">Add Comment:</label>
                                        <textarea style="padding-left: 10px;padding-top: 10px;font-size: 20px;height: 100px;width: 100%; color:black" id="comment" placeholder="Add Comment here..." name="comment" rows="3" cols="80" required></textarea>
                                        <input type="hidden" id="post_id" name="post_id" value="<?php echo $fetch_post['Post_id']; ?>">
                                        <input type="hidden" id="C_id" name="C_id">
                                        <!-- <span id="message"></span> -->
                                        <style>
                                            nav ul {
                                                list-style-type: none;
                                                margin: 0;
                                                padding: 0;
                                            }

                                            nav ul button {
                                                --c: goldenrod;
                                                color: #074f0b;
                                                font-size: 16px;
                                                border: 0.3em solid #074f0b;
                                                border-radius: 0.5em;
                                                width: 12em;
                                                height: 50px;
                                                text-transform: uppercase;
                                                font-weight: bold;
                                                font-family: sans-serif;
                                                letter-spacing: 0.1em;
                                                text-align: center;
                                                line-height: 3em;
                                                position: relative;
                                                overflow: hidden;
                                                z-index: 1;
                                                transition: 0.5s;
                                                margin: 1em;
                                            }

                                            nav ul button span {
                                                position: absolute;
                                                width: 25%;
                                                height: 100%;
                                                background-color: #074f0b;
                                                transform: translateY(150%);
                                                border-radius: 50%;
                                                left: calc((var(--n) - 1) * 25%);
                                                transition: 0.5s;
                                                transition-delay: calc((var(--n) - 1) * 0.1s);
                                                z-index: -1;
                                            }

                                            nav ul button:hover {
                                                color: white;
                                            }

                                            nav ul button:hover span {
                                                transform: translateY(0) scale(4);
                                            }

                                            nav ul button span:nth-child(1) {
                                                --n: 1;
                                            }

                                            nav ul button span:nth-child(2) {
                                                --n: 2;
                                            }

                                            nav ul button span:nth-child(3) {
                                                --n: 3;
                                            }

                                            nav ul button span:nth-child(4) {
                                                --n: 4;
                                            }

                                            nav ul button span:nth-child(5) {
                                                --n: 5;
                                            }
                                        </style>
                                        <nav style="margin-left:-17px;">
                                            <ul>
                                                <Button id="submit" name="submit"> Send <i class="fa fa-paper-plane"></i>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </button>
                                            </ul>
                                        </nav>
                                    </form>
                                    <!-- <Button class="sendbtn" style="border:0px; border: 0px;padding: 8px 30px;font-size: 22px;" id="submit" name="submit"><i class = "fa fa-paper-plane"></i> Send</Button><br> -->
                                    &nbsp;<h2 style="font-size: 30px;font-weight: bold; color:white">View Comments:</h2><br>
                                    <!-- <div id ="display_comment"></div> -->
                                    <?php
                                    $pid = $fetch_post['Post_id'];
                                    $sql = mysqli_query($conn, "SELECT comment.*, user.name , user.image_name FROM comment
                        JOIN user ON comment.R_id = user.R_id
                        WHERE comment.Post_id = $pid ORDER BY Date DESC,Time DESC;");
                                    if (mysqli_num_rows($sql) > 0) {
                                        while ($post = mysqli_fetch_assoc($sql)) {
                                            echo '<div style="display:flex;"><div style="margin-top: 20px;margin-bottom: 20px;"></div>';
                                            echo '<div style="width:80%"><label style="font-size:20px; color:white">' . $post["name"] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $post["Time"] . '</label><br><input type="text" id="vcomment" value="' . $post["Text"] . '" style="border-radius:15px;width:100%;padding:10px;font-size: 20px;font-weight:600;"  name="vcomment" readonly></div> </div>';
                                        }
                                    }
                                    ?>
                                    <!--<textarea id="vcomment" style="border-radius:15px;"  name="vcomment" rows="3" cols="80" >&nbsp;&nbsp;// echo $fetch_post['Text'];</textarea>&nbsp;&nbsp; -->
                                </div>
                                <!-- <div class="box3"> -->
                                <input type="hidden" name="post_id" value="<?php echo $fetch_post['Post_id']; ?>">
                                <!-- </div>   -->
                            </div>
                        </div>
                <?php
                    };
                };
                ?>
            </div>
        </section>
    </div>

    <!-- add comment code -->

    <?php
    // if(isset($_POST['submit'])){
    // $comment = $_POST['comment'];
    // $post_id = $_POST['post_id'];
    // $query = "INSERT INTO `comment` (`Post_id`,`R_id`,`Text`,`Date`,`Time`) VALUES('$post_id','$Rid','$comment',curdate(),curtime())";
    // mysqli_query($conn,$query);
    // if (!$query) {
    //     echo "<h3> Data not inserted!</h3>";
    // } else {
    //     echo "window.location.href = 'addpost.php';";
    // }
    // }
    ?>

    <?php
    if (isset($_POST['post_id'])) {
        $C_id = $_POST['post_id'];
        $query = "SELECT comment.Post_id,post.Post_id,comment.Text FROM `post`,`comment` WHERE post.Post_id = $C_id";
        mysqli_query($conn, $query);
    }
    ?>

    <?php include('footer.php');?>
    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>

    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>

<!-- 
<script>
    $(document).ready(function(){
        $('#commentForm').on('submit',function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"add_comment.php";
                method:"POST";
                data:form_data;
                dataType:"JSON";
                success:function(data){
                    if(data.error() != ''){
                        $('#commentForm')[0].reset();
                        
                        $('#message').html(data.error);
                    }
                }
            })
        });

        load_comment() 

        function load_comment() {
            $.ajax({
                url:"fetch_comment.php";
                method:"POST";
                success:function(data){
                    $('#display_comment').html(data);
                }
            })
        }
    });
</script> -->