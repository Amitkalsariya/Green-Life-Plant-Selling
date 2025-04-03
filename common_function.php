<?php
    $servername = "localhost";
    $username = "root";
    $passwordDB = "";
    $database = "glife";

    $conn = mysqli_connect($servername,$username,$passwordDB,$database);

    if(!$conn)
    {
        echo 'Connection Fail';
    }

function search_product() {
    global $conn;
        echo "<div class='container'>    
        <section class='products'>
                <div class='box-container'>";
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    $search_query = "SELECT * FROM `product` WHERE Prod_name LIKE '%$search%' ";
                    $result_query = mysqli_query($conn,$search_query);
                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows == 0){
                        echo "<h2 class='text-center text-danger'>No results match.No products found on this category.</h2>";
                    }
                    echo"<form method='POST'>";
                    echo"<div class='box'>";
                    while($fetch_product = mysqli_fetch_assoc($result_query)){
                        $Prod_image = $fetch_product['Prod_image'];
                        $Prod_name = $fetch_product['Prod_name'];
                        $Prod_price = $fetch_product['Prod_price'];
                    echo "<img src='admin/images/product_images/$Prod_image'>";
                    echo "<h3>$Prod_name</h3>";
                    echo "<div class='price'>$Prod_price/-</div>";
                    echo "<input type='hidden' name='product_name' value='$Prod_name'>";
                    echo "<input type='hidden' name='product_price' value='$Prod_image'>";
                    echo "<input type='hidden' name='product_image' value='$Prod_image'>";
                    echo "<input type='submit' class='btn' value='Add to cart' name='add_to_cart'>";
                    echo "</div>
                    </form>
                </div>
        </section>
    </div>";
        }
    }
}
?>