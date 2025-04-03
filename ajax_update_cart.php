<?php 
include_once 'connection.php';

$qty = $_GET['qty'];
$product_id = $_GET['product_id'];

mysqli_query($conn,"update cart set qty='$qty' where c_id='$product_id'");

$u_id = $_SESSION['R_id'];

    $sql_query = "SELECT cart.* , user.* , product.* from cart INNER JOIN user on user.R_id = cart.u_id JOIN product ON product.Prod_id = cart.p_id WHERE cart.u_id='$u_id' and status=0";
    $data = mysqli_query($conn,$sql_query);

  	$grand_total = 0 ; 
  	
      	if(mysqli_num_rows($data)!=0){
            while($fetch_cart = mysqli_fetch_assoc($data)){ ?>
                    <tr>           
                        
                        <td><?php echo $fetch_cart['Prod_name']; ?> </td>
                        <td><?php echo number_format($fetch_cart['Prod_price']); ?> </td>
                        <td>
                            <input type="hidden" name="update_qty_id"  value="<?php echo $fetch_cart['c_id']; ?>">
                                <input type="number" name="update_qty" min="1" value="<?php echo $fetch_cart['qty']; ?>" class="qty_product" product_id="<?php echo $fetch_cart['c_id']; ?>">
                        </td>
                        <td><?php echo $sub_total = number_format($fetch_cart['Prod_price'] * $fetch_cart['qty']); ?> /- </td>
                        <td><a href="cart.php?c_id=<?php echo $fetch_cart['c_id'];?>"  class="btn">  Remove </a> </td>   
                    </tr>
                    <?php
                    $grand_total = $grand_total + $fetch_cart['Prod_price'] * $fetch_cart['qty'] ;
                        };
                    };      
                    ?>
                    <tr>
                        <td><a href="product.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
                        <td colspan="2">Grand Total</td>
                        <td><?php echo $grand_total; ?></td>
                        <td><a href="cart.php?delete_all" onclick="return confirm ('Are you sure you want to delete all?');" class="btn">Delete all</a></td>
                    </tr>