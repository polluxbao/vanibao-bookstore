<?php
include_once "header.php";
?>

<div class="container">
    <div>
        <h2 class="text-center">Searching Books</h2>
    </div>

    <?php
        $search = new Search();
        // echo $_GET["search"];
        $result = $search->query($_GET["search"]);
        if($search->rowsnum > 0) {
    ?>

        <table class="table table-striped table-responsive">
        <thead>
            <tr>
            <th width="10%">Book</th>
            <th style="text-align: center;">Book's Name</th>
            <th>Keywords</th>
            <th>Price</th>
            <th>Summary</th>
            <th width="30%">Description</th>
            </tr>
        </thead>

    <?php
            $subtotal = 0;
            while($row = $search->get()) {
                echo '<tbody> <tr>';
                echo '<td><a href="book_detail.php?id='.$row['id'].'"><img src="img/books/'.$row["img"].'" class="text-center" height=50 alt=""></a></td>';
                echo '<td style="text-align: center;"><a href="book_detail.php?id='.$row['id'].'">'.$row["name"].'</a></td>';
                echo '<td>'.$row["keywords"].'</td>';
                echo '<td>'.$row["price"].'</td>';
                echo '<td>'.$row["summary"].'</td>';
                if (strlen($row["descrip"]) > 150) {
                    $str = substr($row["descrip"],0,140)." ..."; 
                } else {
                    $str = $row["descrip"];
                }
                echo '<td>'.$str.'</td>';
                echo "</tr></tbody>";
            }
            echo '<p class="text-center"><b>'.$search->rowsnum.' Books Found</b></p>';

        } else {
    ?> 
    
            <p><img src="img/search_book.png" width="30%" class="center-block" alt=""></p>
            <h2 class="text-center">No Book Found</h2>

            <div class="row">
            <div class="row">
                <div class="text-center">
                    <a href="index.php">
                    <button type="" class="btn btn-primary">Back</button>
                    </a>
                </div>
            </div>
            </div>
    
    <?php   
        };

    ?>  



</div>