<?php 
	$page_title = "Login Page";
	require_once "reuse/header-dashboard.php"; 
?>
    <!-- Content Area Login -->
    <div class="auth-page">
        <?php
            if(isset($_SESSION['user_id'])){
                header("Location: dashboard.php");
            }

            require_once "../includes/config.php";

            $error_message = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT id, username, password FROM users WHERE username = ?";
                
                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param("s", $param_username);
                    
                    $param_username = $username;
                    
                    if($stmt->execute()){
                        $stmt->store_result();
                        
                        if($stmt->num_rows == 1){                    
                            $stmt->bind_result($id, $username, $hashed_password);
                            if($stmt->fetch()){
                                if(password_verify($password, $hashed_password)){
                                    session_start();
                                    
                                    $_SESSION["user_id"] = $id;
                                    $_SESSION["username"] = $username;                            
                                    
                                    // Set cookie untuk menandai bahwa pengguna telah login
                                    setcookie("loggedIn", true, time() + 3600, "/");

                                    header("location: dashboard.php");
                                } else{
                                    $error_message = "Password yang Anda masukkan salah.";
                                }
                            }
                        } else{
                            $error_message = "Akun tidak ditemukan.";
                        }
                    } else{
                        $error_message = "Terjadi kesalahan. Silakan coba lagi.";
                    }

                    $stmt->close();
                }
                
                $mysqli->close();
            }
        ?>
        <div class="box-form">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" required class="form-action">
                </div>    
                <div>
                    <label>Password</label>
                    <input type="password" name="password" required class="form-action">
                </div>
                <div>
                    <input type="submit" value="Login" class="btn-action">
                </div>
            </form>
            
            <div class="reg">
                or
                <a href="register.php">Register</a>
            </div>
            <?php if(!empty($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </div>
    </div>
    <!-- End Area Login -->
<?php 
	require_once "reuse/footer-dashboard.php"; 
?>
