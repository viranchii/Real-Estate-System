<?php
session_start();
include 'components/connect.php';
$alert_script = '';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_users->execute([$email, $pass]);
   $row = $select_users->fetch(PDO::FETCH_ASSOC);

   if($select_users->rowCount() > 0){
      setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
      
      // SweetAlert script to show success message
      $alert_script = "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
           swal({
              title: 'Login Successful',
              text: 'Welcome User!',
              icon: 'success',
              button: 'Proceed',
           }).then(function() {
              window.location.href = 'home.php';  // Redirect to home.php after user clicks 'Proceed'
           });
        });
      </script>
      "; 
   }else{
      $warning_msg[] = 'Incorrect username or password!!!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Custom CSS File Link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- Login Section Starts -->
<section class="form-container">
   <form action="" method="post">
      <h3>Welcome back!</h3>
      <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="Enter your password" class="box">
      <p>Don't have an account? <a href="register.html">Register new</a></p>
      <input type="submit" value="Login Now" name="submit" class="btn">
   </form>
</section>
<!-- Login Section Ends -->

<?php 
// Display the appropriate alert script if set
if ($alert_script) {
    echo $alert_script;
}
?>

<!-- SweetAlert CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- Custom JS File Link -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>
