<?php
    $msg="";
    include_once './blogic.php';
    include_once './header.php';
    if(isset($_REQUEST['btn_signin']))
    {
        $qry = "insert into users(name,email,pwd) values('$_REQUEST[txt_name]','$_REQUEST[txt_email]','$_REQUEST[txt_pass]')";
        $x = ExecuteNonQuery($qry);        
        if($x>0){
            $msg = "<font color='green'>Your'e Registered</font>";
        }
        else
        {
            $msg = "<font color='green'>Your'e not registered</font>".mysql_error();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <script type="text/javascript">
        function ValidateSignup()
    {
      flag = true;
      if(document.getElementById("txt_name").value=="")
      {
        flag=false;
        document.getElementById("txt_name").style="border-color:red";
        //document.write("Enter a valid username");
      }
      else{
        document.getElementById("txt_name").style="border-color:green";
      }
      if(document.getElementById("txt_email").value=="")
      {
        flag=false;
        document.getElementById("txt_email").style="border-color:red";
        //document.write("Enter a valid password");
      }
      else{
        document.getElementById("txt_email").style="border-color:green";
      }
      if(document.getElementById("txt_pass").value=="")
      {
        flag=false;
        document.getElementById("txt_pass").style="border-color:red";
        //document.write("Enter a valid password");
      }
      else{
        document.getElementById("txt_pass").style="border-color:green";
      }
      return flag;
    }
    </script>
</head>
<body>
        

        <div id="content" style="margin-top: 120px; margin-bottom: 20px;">
            <div class="container-fluid decor_bg" id="signup-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>REGISTRATION</h4>
                            </div>
                            <div class="panel-body">
                                <form method="post  " onsubmit="return ValidateSignup()">
                                    <div class="form-group">
                                        <input type="text" class="input form-control" id="txt_name" name="txt_name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="input form-control" id="txt_email" name="txt_email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="input form-control" id="txt_pass" name="txt_pass" placeholder="Password">
                                    </div>
                                    <div>
                                            <?php echo $msg; ?><button type="submit" name="btn_signin" class="btn btn-primary pull-right">Sign Up</button>
                                    </div>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Already have an account? <a href="login.php">Login</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
</body>
<?php
    include_once './footer.php'
?>
</html>