
<<<<<<< Updated upstream
=======
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">CART</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <?php echo $msg; ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Image </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-right">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">Total</th>
                            <th scope="col" class="text-right"><a href="index.php?content=cart&cartaction=clear">Clear all</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                        $count=0;
                        if(isset($_COOKIE["cart_shopping"]))
                        {
                            $total = 0;
                            $count=0;
                            $cookie_data = stripslashes($_COOKIE['cart_shopping']);
                            $cart_data = json_decode($cookie_data, true);
                            foreach($cart_data as $keys => $values) 
                            { $count++;
						?>
                            <td class="text-right">
                                <div style="height: 70px;width:62px"><img src="<?=$values["item_img"];?>" class="img-thumbnail rounded img-fluid" > </div>
                            </td>
                            <td class="text-left"><?php echo $values["item_name"]; ?></td>
                            <td class="text-left"><?= $values["item_qtyInStock"];?></td>
                            <td class="text-right"><?=$values["item_quantity"];?></td>
                            <td class="text-right">$<?=$values["item_price"]; ?></td>
                            <td class="text-right">$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                            <td class="text-right">
                                <a href="index.php?content=cart&cartaction=delete&id=<?=$values["item_id"] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button></a> 
                            </td>
                        </tr>

                        <?php $total = $total + ($values["item_quantity"] * $values["item_price"]);                       
                        }
                        }
                                                    
                            $_SESSION["cartcount"] = $count;                           
                                          
                        ?>
                        <tr>                               
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Subtotal</strong></td>
                            <td class="text-right"><strong>$ <?php 
                            if(isset($_COOKIE["cart_shopping"]))
                                echo number_format($total, 2);
                            else
                                echo '0';
                            
                            ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="index.php"><button class="btn btn-block btn-light">Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">

                <a href="index.php?content=checkout">
                    <button  class="btn btn-lg btn-block btn-success text-uppercase" value="Checkout">Checkout</button>
                </a>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
>>>>>>> Stashed changes
