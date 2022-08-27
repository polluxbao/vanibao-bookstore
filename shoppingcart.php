<?php
include_once "header.php";
?>

<div class="container">
    <div>
        <h2 class="text-center">Shopping Cart</h2>
    </div>

    <?php
        
        $cart = new ShoppingCart();
        $result = $cart->query();
        if($cart->rowsnum($result)>0) {
            $_SESSION["cart"] = true;
    ?>

        <table class="table table-striped table-responsive">
        <thead>
            <tr>
            <th width="10%">Book</th>
            <th style="text-align: center;">Title</th>
            <th>Number</th>
            <th>Price</th>
            </tr>
        </thead>
    <?php
            $subtotal = 0;
            while($row = $cart->get($result)) {
                echo '<tbody> <tr>';
                echo '<td>'.'<img src="img/books/'.$row["img"].'" class="text-center" height=50 alt="">'."</td>";
                echo '<td>'.$row["name"].'</td>';
                echo '<td>'.$row["num"].'</td>';
                echo '<td>'.$row["price"].'</td>';
                echo "</tr></tbody>";
                $subtotal =  $subtotal + $row["price"]*$row["num"];
            }
            $GST = $subtotal*0.05;
            $QST = $subtotal*0.09975;
            echo "</table>";
            echo '<p class="text-right"><b>SUBTOTAL: '.number_format($subtotal,2).'</b></p>';
            echo '<p class="text-right">GST: '.number_format($GST,2).'</p>';
            echo '<p class="text-right">QST: '.number_format($QST,2).'</p>';
            echo '<p class="text-right">Total Taxes: '.number_format($GST+$QST,2).'</p>';
            echo '<p class="text-right"><b>TOTAL: '.number_format($subtotal+$GST+$QST,2).'</b></p>';
    ?>

        
            <div class="row">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-1">
                    <a href="#">
                    <button type="" class="btn"><a href="#">Back</a>
                    </button>
                    </a>
                </div>
        
                <div class="col-sm-2">
                    <a href="#">
                    <button type="submit" class="btn btn-primary" name="submit">Buy Now</button>
                    </a>
                </div>
            </div>
    <?php
        } else {
    ?>
            <p><img src="img/cart_empty_gray.png" class="center-block" alt=""></p>
            <h2 class="text-center">Shopping Cart is Empty</h2>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-5">
                </div>
                <div class="col-sm-1">
                    <a href="#">
                    <button type="" class="btn btn-default">Back</button>
                    </a>
                </div>
        
                <div class="col-sm-1">
                    <a href="index.php">
                    <button type="" class="btn btn-primary">Buy Now</button>
                    </a>
                </div>
                <div class="col-sm-5">
                </div>
            </div>
            <br>
            <br>

    <?php
        };
    ?>  
    




</div>


<?php
include_once "footer.php";
?>