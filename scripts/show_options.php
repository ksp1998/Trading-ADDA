<?php
  if(isset($_SESSION['isLogin']) AND $_SESSION['isLogin'] == true) {
    // If logged in, hide login option and show profile link & logout option
    ?>
    <script type='text/javascript'>
      document.getElementById("login_btn").style.display = 'none';
      //document.getElementById("profile_link").style.display = 'block';
      //document.getElementById("logout_btn").style.display = 'block';
      document.getElementById("loggedin").style.display = 'block';
    </script>
    <?php
  }
?>
