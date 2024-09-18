<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1" style="background-color: #DC5F00;">
      <section class="flex" >
         <a href="home.php" class="logo" ><i class="fas fa-house " style="color: white;"></i>MyHome</a>
        <?php
        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
        $select_profile->execute([$user_id]);
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        <p style="font-size: x-large;color:white">Welcome, <?= $fetch_profile  ['name'];  ?></p>
         <ul>
            <li><a href="post_property.php">post property<i class="fas fa-paper-plane" style="color: #DC5F00;"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">my listings<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">dashboard</a></li>
                     <li><a href="post_property.php">post property</a></li>
                     <li><a href="my_listings.php">my listings</a></li>
                  </ul>
               </li>
               <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php">filter search</a></li>
                     <li><a href="listings.php">all listings</a></li>
                  </ul>
               </li>
               <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">about us</a></i></li>
                     <li><a href="contact.php">contact us</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">login now</a></li>
                  <li><a href="register.php">register new</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">update profile</a></li>
                  <li> <a href="#" onclick="logoutConfirmation(event)">logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<script>
function logoutConfirmation(e) {
    e.preventDefault(); // Prevent the default link behavior
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
<!-- header section ends -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
