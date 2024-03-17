<?php 
    $page_title = "Register Page";
    require_once "reuse/header-dashboard.php"; 
?>
    <div class="auth-page">
        <?php
            require_once "../includes/config.php";

            $username = $password = $confirm_password = "";
            $username_err = $password_err = $confirm_password_err = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty(trim($_POST["username"]))){
                    $username_err = "Please enter a username.";
                } else{
                    $sql = "SELECT id FROM users WHERE username = ?";
                    
                    if($stmt = $mysqli->prepare($sql)){
                        $stmt->bind_param("s", $param_username);
                        
                        $param_username = trim($_POST["username"]);
                        
                        if($stmt->execute()){
                            $stmt->store_result();
                            
                            if($stmt->num_rows == 1){
                                $username_err = "This username is already taken.";
                            } else{
                                $username = trim($_POST["username"]);
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        $stmt->close();
                    }
                }
                
                if(empty(trim($_POST["password"]))){
                    $password_err = "Please enter a password.";     
                } elseif(strlen(trim($_POST["password"])) < 6){
                    $password_err = "Password must have at least 6 characters.";
                } else{
                    $password = trim($_POST["password"]);
                }
                
                if(empty(trim($_POST["confirm_password"]))){
                    $confirm_password_err = "Please confirm password.";     
                } else{
                    $confirm_password = trim($_POST["confirm_password"]);
                    if(empty($password_err) && ($password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                    }
                }
                
                if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                    
                    if($stmt = $mysqli->prepare($sql)){
                        $stmt->bind_param("ss", $param_username, $param_password);
                        
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT);
                        
                        if($stmt->execute()){
                            header("location: login.php");
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        $stmt->close();
                    }
                }
                
                $mysqli->close();
            }
        ?>
        <div class="box-form">
            <h2>Register</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" required class="form-action">
                    <span class="error-message"><?php echo $username_err; ?></span>
                </div>    
                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>" required class="form-action">
                    <span class="error-message"><?php echo $password_err; ?></span>
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required class="form-action">
                    <span class="error-message"><?php echo $confirm_password_err; ?></span>
                </div>
                <div>
                    <input type="submit" value="Register" class="btn-action">
                </div>
            </form>
            <div class="reg">
                or
                <a href="login.php">Login</a>
            </div>
        </div>
    </div>

<?php 
    require_once "reuse/footer-dashboard.php"; 
?>
