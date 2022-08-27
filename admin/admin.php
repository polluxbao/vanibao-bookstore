<?php
include_once "header.php";
?>

    <!--management-->

    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><a href="index.php">&#9750; Main</a><span class="crumb-step">&gt;</span><span class="crumb-name">Book Management</span></div>
        </div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form action="#" method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">Category</th>
                        <td>
                            <select name="search-sort" id="">
                                <option value="">All</option>
                                <option value="19">Books</option><option value="20">eBooks</option>
                            </select>
                        </td>
                        <th width="80">Keywords</th>
                        <td><input class="common-text" placeholder="Keywords" name="keywords" value="" id="" type="text"></td>
                        <td><input class="btn btn-primary btn2" name="sub" value="Query" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="insert.html">&#10009; Add Book</a>
                    <a id="batchDel" href="javascript:void(0)">&#128465; Batch Del</a>
                    <a id="updateOrd" href="javascript:void(0)">&#9851; Update</a>
                </div>
            </div>
            
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>Titles</th>
                        <th>Auther</th>
                        <th>Publisher</th>
                        <th>Stocks</th>
                        <th>Date</th>
                        <th>Comments</th>
                        <th>Operation</th>
                    </tr>
                    <tr>
                        <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                        <td>59</td>
                        <td title="Data and Structures"><a target="_blank" href="#" title="Data and Structures">Data and Structures</a>
                        </td>
                        <td>Jay Wengrow</td>
                        <td>Pragmatic</td>
                        <td>99</td>
                        <td>2022-07-20</td>
                        <td></td>
                        <td>
                            <a class="link-update" href="#">Mod</a>
                            /
                            <a class="link-del" href="#">Del</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                        <td>59</td>
                        <td title="Data and Structures"><a target="_blank" href="#" title="Data and Structures">Data and Structures</a>
                        </td>
                        <td>Jay Wengrow</td>
                        <td>Pragmatic</td>
                        <td>99</td>
                        <td>2022-07-20</td>
                        <td></td>
                        <td>
                            <a class="link-update" href="#">Mod</a>
                            /
                            <a class="link-del" href="#">Del</a>
                        </td>
                    </tr>
                </table>
                <div class="list-page"> 2 items | Page 1/1</div>
            </div>
        </form>
    </div>



</div>


</body>
</html>