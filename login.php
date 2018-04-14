<?php
    session_start();
    include_once './blogic.php';
    include_once './header.php';
    $msg1="";
    if(isset($_REQUEST['btn_login'])){
        $qry = "select * from users where email='$_REQUEST[email]' and pwd='$_REQUEST[password]'";
        $res = ExecuteQuery($qry);
        if(mysql_affected_rows()>0){

            $r = mysql_fetch_array($res);
            $_SESSION['sid'] = $r[3];
            header("location:dashboard.php");
        }
        else
        {
            $msg1 ="<font size='5px' color='red'>Invalid username and password!!!</font>".mysql_error();
        } 
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script type="text/javascript">
        function ValidateLogin()
    {
      flag = true;
      if(document.getElementById("u_email").value=="")
      {
        flag=false;
        document.getElementById("u_email").style="border-color:red";
        //document.write("Enter a valid username");
      }
      else{
        document.getElementById("u_email").style="border-color:green";
      }
      if(document.getElementById("u_pass").value=="")
      {
        flag=false;
        document.getElementById("u_pass").style="border-color:red";
        //document.write("Enter a valid password");
      }
      else{
        document.getElementById("u_pass").style="border-color:green";
      }
      return flag;
    }
    </script>
</head>
<body>
    <div id="content" style="margin-top: 120px; margin-bottom: 20px;">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <form method="post" onsubmit="return ValidateLogin()">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  id="u_email" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="u_pass" placeholder="Password" name="password">
                                    </div>
                                    <div><?php echo $msg1; ?>
                                    <button type="submit" name="btn_login" class="btn btn-primary pull-right">Login</button>
                                    </div>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>
</body>
<?php
    include_once './footer.php'
?>
</html>