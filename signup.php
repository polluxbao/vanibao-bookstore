<?php
$page_title = "Sign Up";
include_once "header.php";
?>

<div class="container">
    <form action="" method="post" class="form-horizontal" autocomplete="off">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <h2 class="text-center">Sign Up An Account</h2>
            </div>
        </div>
        <br>
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 register">

            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">USER NAME</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" placeholder="Input Username">
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

            <div class="form-group">
                <label for="chkpwd" class="col-sm-4 control-label">CONFIRM PASSWORD</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-4 control-label">E-MAIL</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" placeholder="Input Email">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">FIRST NAME</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="firstname" placeholder="Input your first name">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-edit"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">LAST NAME</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Input your last name">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-edit"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">ADDRESS</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="address" placeholder="Input your adress">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-home"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <button type="" class="btn btn-default btn-block"><a href="login.php">Login</a>
                    </button>
                </div>

                <div class="col-sm-3">
                </div>

                <div class="col-sm-3">
                    <button type="reset" class="btn btn-default btn-block">CLEAR
                    <span class="glyphicon glyphicon-remove"></span></button>
                </div>


                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" name="submit"><b>SIGN UP</b>
                    <span class="glyphicon glyphicon-log-in"></span></button>
                </div>
            </div>
        </div>
    </form>
</div>

<br>

<?php

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$signup = new Signup();

if(isset($_POST["submit"])){
  $result = $signup->tosignup($_POST["username"], $_POST["password"], $_POST["confirmpassword"], $_POST["email"], $_POST["firstname"], $_POST["lastname"], $_POST["address"]);

  if($result == 1){
    echo "<h2 class='text-center'>&nbsp;&nbsp;&nbsp;&nbsp;Sign up Successful!</h2>";
    $url='login.php';
    echo "<script>window.location.href='$url';</script>";
    exit();
  } elseif($result == 10) {
    echo "<h2 class='text-center'>&nbsp;&nbsp;&nbsp;Username or Email Has Already Taken!</h2>";
  } elseif($result == 100) {
    echo "<h2 class='text-center'>&nbsp;&nbsp;&nbsp;Password Does Not Match!</h2>";
  }
}
?>

<br> <br> <br> <br>
<br> <br> <br> <br>
<br> <br> <br> <br>

<?php
include_once "footer.php";
?>