

<?php 

session_start();
require_once   "config.php";       

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows>0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['name'] =$user['name'];
            $_SESSION['email'] =$user['email']; 

            if($user['role'] =='admin'){
                header("Location: admin_dashboard.php");   }
            else{
                header("Location: user_page.php");   
             } 
                exit();
        }
    }
    $_SESSION['login_error'] ="Invalid email or password.";
    $_SESSION['active_form'] ="login";
    header("Location: login.php");  
    exit();
}
?>