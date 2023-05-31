<?php 
include("inc/header.php"); 
?>
<title>webdamn.com : Demo Build Password Reset System with PHP & MySQL</title>
<script src="js/user.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="container">	
	<div class="row">
		<h2>Example: Build Password Reset System with PHP & MySQL</h2>		
		<div class="container login-container">
            <div class="row">                
                <div class="col-md-6 login-form-2">
                    <h3>Reset Password Form</h3>
					<?php if(!empty($_GET['authtoken']) && $_GET['authtoken']) { ?>
                    <form id="savePasswordForm" method="POST">
						<div id="errorMessge" class="alert hidden">                            
                        </div>
                        <div class="form-group">
                            <input type="password" name="newPassword" class="form-control" placeholder="New Password..." required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirmNewPassword" class="form-control" placeholder="Confirm password..." required />
                        </div>
                        <div class="form-group">
							<input type="hidden" name="action"  value="savePassword" />
							<input type="hidden" name="authtoken"  value="<?php echo $_GET['authtoken']; ?>" />
                            <input type="submit" class="btnSubmit" value="Save Password" />
                        </div>                       
                    </form>
					<?php } ?>
                </div>
            </div>
        </div>
		
	</div>    
</div>
<?php include('inc/footer.php');?>




  