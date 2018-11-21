<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $sponsor = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = " Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = " This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo " Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = " Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = " Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = " Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = " Password did not match.";
        }
    }
	
	// Validate sponsor
    if(empty(trim($_POST["sponsor"]))){
        $sponsor_err = " Please enter a sponsor.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_sponsor);
            
            // Set parameters
            $param_sponsor = trim($_POST["sponsor"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) != 1){
                    $sponsor_err = " This sponsor doesn't exist.";
                } else{
                    $sponsor = trim($_POST["sponsor"]);
                }
            } else{
                echo " Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($sponsor_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: register.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>

<head>
    &nbsp<title>Dungeons and Dragons Tool</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
</head>
<body>
        <h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Log In & Register</small></h2>
		<br>
		
		
		<div class="row ml-5 mr-5">
			<div class="col-sm-4">
				<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
					Log in
				</button>
				<div class="collapse" id="collapse1">
					<br>
					<div class="card card-body">
						<form action="login.php" method="post">
							<div class="input-group mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Username</span>
								</div>
								<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $username_err; ?></small></div>
							</div>
							<div class="input-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Password</span>
								</div>
								<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $password_err; ?></small></div>
							</div>
							<div class="form-group">
								<input type="submit" value="Log in" class="btn btn-success ml-5">
							</div>
							<p>Don't have an account ? <a href="" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Sign up here</a>.</p>
						</form>		
					</div>
				</div>
			</div>		
			<div class="col-sm-4">
				<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
					Sign up
				</button>
				<div class="collapse" id="collapse2">
					<br>
					<div class="card card-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="input-group mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Username</span>
								</div>
								<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $username_err; ?></small></div>
							</div>
							<div class="input-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Password</span>
								</div>
								<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $password_err; ?></small></div>
							</div>
							<div class="input-group mb-3 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Confirmed password</span>
								</div>
								<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $confirm_password_err; ?></small></div>
							</div>
							<div class="input-group mb-3 <?php echo (!empty($sponsor_err)) ? 'has-error' : ''; ?>">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Sponsor</span>
								</div>
								<input type="text" name="sponsor" class="form-control" value="<?php echo $sponsor; ?>">
								<div class="invalid-feedbak"><small style="color:#FF0000";><?php echo $sponsor_err; ?></small></div>
							</div>
							<div class="form-group">
								<input type="submit" value="Sign up" class="btn btn-info ml-5">
								<input type="reset" class="btn btn-light" value="Reset">
							</div>
							<p>Already have an account ? <a href="" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Log in here</a>.</p>
							<p>What's a sponsor ? <a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="A sponsor is the name of someone who already has an account.">Info</a></p>
						</form>		
					</div>
				</div>
			</div>
		</div>
	
		<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	    
</body>
</html>