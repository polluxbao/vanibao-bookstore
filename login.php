<?php
$page_title = "Login";
include_once "header.php";
?>

<div class="container">
    <form action="" method="post" class="form-horizontal" onSubmit="return Check()" autocomplete="off">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <h2 class="text-center">Login Account</h2>
            </div>
        </div>
        <br>

        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 register">

            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">USER NAME</label>
                
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="usernameemail" placeholder="Input Username">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-4 control-label">PASSWORD</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Input Password">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    
                    <button type="" class="btn btn-default btn-block"><a href="signup.php">SIGN UP</a>
                    </button>
                    
                </div>

                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" name="submit">LOGIN
                    <span class="glyphicon glyphicon-log-in"></span></button>
                </div>
            </div>
        </div>
    </form>
</div>

<br> 

<?php

include_once "function.php";

if(!empty($_SESSION["id"])) {
    header("Location: index.php");
}

if(isset($_POST["submit"])) {
    $login = new Login();

    $result = $login->tologin($_POST["usernameemail"], $_POST["password"]);

    if($result == 1){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: index.php");
    } elseif($result == 10) {
        echo "<h2 class='text-center'>&nbsp;&nbsp;&nbsp;&nbsp;Wrong Password</h2>";
    } elseif($result == 100) {
        echo "<h2 class='text-center'>&nbsp;&nbsp;&nbsp;&nbsp;User Not Registered</h2>";
    }
}
?>
<br> <br> <br> <br>
<br> <br> <br> <br>
<br> <br> <br> <br>

<?php
include_once "footer.php";
?>



