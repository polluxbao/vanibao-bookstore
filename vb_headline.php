<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="gallery">
                <div class="gallery-image">
                    <a href="book_detail.php?id=<?=$prev;?>">
                        <img src="<?=IMGDIR;?><?=$curr;?>" alt="<?=$caption;?>" />
                    </a>
                    <div>
                        <a id="leftbut" href="?img=<?=$prev;?>"><<</a>
                        <a id="rightbut" href="?img=<?=$next;?>">>></a>
                    </div>
                </div>

                <!-- <p class="gallery-image-label"><?=$caption;?></p> -->
            </div>
        </div>


        <div class="col-sm-4">
            <h4 style="color: red">Update</h4>
            <p>
                <li><a href="news.php">There is a VaniBao news</a> </li>
                <li><a href="news.php">There is a VaniBao news</a> </li>
                <li><a href="news.php">There is a VaniBao news</a> </li>
                <li><a href="news.php">There is a VaniBao news</a> </li>
                <li><a href="news.php">There is a VaniBao news</a> </li>
                <li><a href="news.php">There is a VaniBao news</a> </li>
            </p>
        </div>
    </div>
</div>