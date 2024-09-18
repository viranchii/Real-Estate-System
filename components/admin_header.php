<header class="header">

   <div id="close-btn"><i class="fas fa-times"></i></div>

   <a href="dashboard.php" class="logo">AdminPanel.</a>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="listings.php"><i class="fas fa-building"></i><span>listings</span></a>
      <a href="users.php"><i class="fas fa-user"></i><span>users</span></a>
      <a href="admins.php"><i class="fas fa-user-gear"></i><span>admins</span></a>
      <a href="messages.php"><i class="fas fa-message"></i><span>messages</span></a>
   </nav>

   <a href="update.php" class="btn">update account</a>
   <div class="flex-btn">
      <a href="login.php" class="option-btn">login</a>
      <a href="register.php" class="option-btn">register</a>
   </div>
   <a href="../components/admin_logout.php" onclick="logoutConfirmation(event)" class="delete-btn"><i class="fas fa-right-from-bracket"></i><span>logout</span></a>

</header>

<div id="menu-btn" class="fas fa-bars"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
function logoutConfirmation(e) {
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Logout from this website?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willLogout) => {
        if (willLogout) {
            window.location.href = 'components/user_logout.php'; // Redirect to the logout page
        }
    });
}
</script>

