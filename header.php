<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slides.css">
    <?php
    global $admin_logged;
    global $user_logged;
    $admin_logged = false;
    $user_logged = false;

    include "function.php";

    if(isset($page_title)) {
        echo "<title>$page_title</title>";
    } else {
        echo "<title>VaniBao Bookstore</title>";
    }
    ?>
</head>
<body>
<header>
    <div class="container">
        <a href="index.php"><img src="img/logo.png" alt=""></a>
        <div class="menu">
            <ul> 
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">eBooks</a></li>
                <li><a href="#">Souvenir</a>
                    <ul>
                        <li><a href="#">Stationery</a></li>
                        <li><a href="#">Clothing</a></li>
                        <li><a href="#">Badges</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- <form action='' method='post'>
            Search<input type='text' name='text'>
            <input type='submit' value='search',name='search'>
        </form> -->


        <form class="search" method='post'>
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default btn-sm" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
                <input type="input" class="form-control input-sm" name="search" placeholder="Search">
            </div>
        </form>

        <?php
        if(!empty($_POST['search'])){
            header("location:search.php?search=".$_POST['search']);
            // echo $_POST['search'];
        }
        ?>

        <div class="login">
            <?php
            if(!empty($_SESSION["id"])) {
                $user_logged = true;
                $select = new Select();
                $user = $select->selectUserById($_SESSION["id"]);
                if($user["user_name"] =="admin") {
                    $admin_logged = true;
                }
            } 

            if($admin_logged) {
                echo '<a href="admin/index.php">Admin</a>';
            }

            if($user_logged) {
                echo "<p>Welcome ".trim($user["user_name"]."</p>"."<a href='logout.php'>LOGOUT</a>");
            } else {
                echo "<a href='login.php'>LOGIN</a>";
                echo "<a href='signup.php'>SIGN UP</a>";
            }
            ?>
            
        </div>
        <div class="cart">
            <a href="shoppingcart.php">
            <?php
            if($_SESSION["cart"]) {
                echo "<img src='img/cart_full.png'>";
            } else {
                echo "<img src='img/cart_empty.png'>";
            }
            ?>
            </a>
        </div>
    </div>

</header>

