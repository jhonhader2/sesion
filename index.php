<?php
include("inc/header.php");
?>
<title>webdamn.com : Demo Build Password Reset System with PHP & MySQL</title>
<script src="js/user.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php'); ?>
<div class="container">
    <div class="row">
        <h2>Example: Build Password Reset System with PHP & MySQL</h2>
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-2">
                    <h3>User Login</h3>
                    <form id="loginForm" method="POST">
                        <div id="errorMessge" class="alert alert-danger hidden">
                        </div>
                        <div class="form-group">
                            <input type="text" name="userEmail" class="form-control" placeholder="Email..." required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="userPassword" class="form-control" placeholder="Password..." required />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="action" value="login" />
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="forget_password.php" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>