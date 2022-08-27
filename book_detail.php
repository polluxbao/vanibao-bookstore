<?php
include "header.php";
?>

<?php
$book_id = $_GET['id'];
$mybook = new Book();
$result = $mybook->get($book_id);
if(!$result) {
    sleep(1);
    header("location: index.php");
}
?>
<!-- body section -->
<!-- Breadcrumb Navigation -->


<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Computer</a></li>
        <li class="active">Data Structures</li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="row text-center">
            <?php
                echo '<img src="img/books/'.$result["img1"].'" width=350 alt="'.$result["name"].'">';
            ?>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <a href="#"><img src="img/books/book_01b.png" alt=""></a>
                </div>
                <div class="col-sm-3">
                    <a href="#"><img src="img/books/book_02b.png" alt=""></a>
                </div>
                <div class="col-sm-3">
                    <a href="#"><img src="img/books/book_03b.png" alt=""></a>
                </div>
                <div class="col-sm-3">
                    <a href="#"><img src="img/books/book_04b.png" alt=""></a>
                </div>

            </div>
        </div>

        <div class="col-sm-7">

            <div class="row">
                <div>
                <?php
                    echo '<p><h4>'.$result["name"].'</h4></p>';
                    echo '<p>'.$result["descrip"].'</p>';
                    echo '<p><b> Author :</b> <a href="#">'.$result["auther"].'</a></p>';
                    echo '<p><b> Price :</b> <a style="color: red;">$ '.$result["price"].'</a></p>';
                ?>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <form action="" method="post">
                    <div class="input-group">
                    <input type="submit" name="btn1" class="glyphicon glyphicon-minus btn btn-primary" value="-">
                    <?php
                        if (isset($_POST['btn1'])) {
                            if($_SESSION['clicks']>1) {
                                $_SESSION['clicks'] -= 1;
                            }
                            echo  $_SESSION['clicks'];
                        }

                        if(isset($_POST['btn2'])) {
                            if($_SESSION['clicks']<20) {
                                $_SESSION['clicks'] += 1;
                            }
                            echo $_SESSION['clicks'];
                        }
                    ?>
                    <input type="submit" name="btn2" class="glyphicon glyphicon-plus btn btn-primary" value="+">
                    </div>
                    </form>
                </div>

                <div class="col-sm-3">
                    <button type="button" class="btn btn-default">Add to cart</button>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary">Buy Now</button>
                </div>
                </div>
            </div>
        </div>

</div>

<br><br>

<div class="container">
    <div class="row">
        <h5>Related to this book</h5> 
    </div>
    <div class="row">
        <div class="col-sm-3 text-center">
            <a href="./book_detail.html">
                <img src="./img/book-1.png" alt="Books" title="This is a good book">
            </a>
            <p>
                <a href="./book_detail.html">Book’s Name</a> <br>
                <a href="#">Author</a> <br>
                <a style="color:brown">$ 13.99</a>
            </p>
        </div>
        <div class="col-sm-3 text-center">
            <a href="./book_detail.html">
                <img src="./img/book-2.png" alt="Books" title="This is a good book">
            </a>
            <p>
                <a href="./book_detail.html">Book’s Name</a> <br>
                <a href="#">Author</a> <br>
                <a style="color:brown">$ 13.99</a>
            </p>
        </div>
        <div class="col-sm-3 text-center">
            <a href="./book_detail.html">
                <img src="./img/book-3.png" alt="Books" title="This is a good book">
            </a>
            <p>
                <a href="./book_detail.html">Book’s Name</a> <br>
                <a href="#">Author</a> <br>
                <a style="color:brown">$ 13.99</a>
            </p>
        </div>
        <div class="col-sm-3 text-center">
            <a href="./book_detail.html">
                <img src="./img/book-4.png" alt="Books" title="This is a good book">
            </a>
            <p>
                <a href="./book_detail.html">Book’s Name</a> <br>
                <a href="#">Author</a> <br>
                <a style="color:brown">$ 13.99</a>
            </p>
        </div>
    </div>
</div>
<hr>

<div class="container">
<div>
    <h5>Book Details</h5>
    <li>Publisher : Milestone Memories Press</li>
    <li>Language : English</li>
    <li>Paperback : 111 pages</li>
    <li>ISBN-10 : 1912883619</li>
    <li>Item weight : 150 g</li>
    <li>Dimensions : 13.97 x 0.71 x 21.59 cm</li>
</div>
<br><br>
<div>
    <h5>Comments</h5>
    <p>
        Customer Reviews: <a style="color: red;">★ ★ ★ ★ ✩</a>  4 out of 5 stars
    </p>
</div>

</div>



<?php
include_once "footer.php";
?>
