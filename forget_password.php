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
                    <h3>Forget Password Form</h3>						
                    <form id="forgetForm" method="POST">
						<div id="errorMessge" class="alert hidden">                            
                        </div>
						<div id="inputSection">
							<div class="form-group">
								<input type="text" name="userName" class="form-control" placeholder="Username..." />
							</div>
							<div class="form-group">
								OR
							</div>						
							<div class="form-group">
								<input type="email" name="userEmail" class="form-control" placeholder="Email address..." />
							</div>
							<div class="form-group">
								<input type="hidden" name="action"  value="forgetPassword" />
								<input type="submit" class="btnSubmit" value="Reset Password" />
							</div> 
						</div>						
                    </form>
                </div>
            </div>
        </div>
		
	</div>    
</div>
<?php include('inc/footer.php');?>




  