
<?php // require_once '../config/config.php';  ?>
<?php include 'inc/head.php'; ?>
<?php
    $login = Session::get("cuslogin");
      if ($login == true) {
        echo "<script>window.location = 'order.php'; </script>";
      }

      if(isset($_GET['code'])){ 
        $gClient->authenticate($_GET['code']); 
        $_SESSION['token'] = $gClient->getAccessToken(); 
        header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
    } 
     
    if(isset($_SESSION['token'])){ 
        $gClient->setAccessToken($_SESSION['token']); 
    } 
     
    if($gClient->getAccessToken()){ 
        // Get user profile data from google 
        $gpUserProfile = $google_oauthV2->userinfo->get(); 
         
        // Initialize User class 
        $user = new Customer(); 
         
        // Getting user profile info 
        $gpUserData = array(); 
        $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:''; 
        $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:''; 
        $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:''; 
        $gpUserData['email']       = !empty($gpUserProfile['email'])?$gpUserProfile['email']:''; 
        $gpUserData['gender']       = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:''; 
        $gpUserData['locale']       = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:''; 
        $gpUserData['picture']       = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:''; 
         
        // Insert or update user data to the database 
        $gpUserData['oauth_provider'] = 'google'; 
        $userData = $user->checkUser($gpUserData); 
         
        // Storing user data in the session 
        $_SESSION['userData'] = $userData; 
         
        // Render user profile data 
        if(!empty($userData)){ 
            $output     = '<h2>Google Account Details</h2>'; 
            $output .= '<div class="ac-data">'; 
            $output .= '<img src="'.$userData['picture'].'">'; 
            $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>'; 
            $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>'; 
            $output .= '<p><b>Email:</b> '.$userData['email'].'</p>'; 
            $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>'; 
            $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>'; 
            $output .= '<p><b>Logged in with:</b> Google Account</p>'; 
            $output .= '<p>Logout from <a href="logout.php">Google</a></p>'; 
            $output .= '</div>'; 
        }else{ 
            $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>'; 
        } 
    }else{ 
        // Get login url 
        $authUrl = $gClient->createAuthUrl(); 
         
        // Render google login button 
        $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="login-btn">Sign in with Google</a>'; 
    } 
    ?>
    



 ?>
 <div class="sale-w3ls" style="min-height:250px;">
   <div class="container">

      <ul class="w3_short">
        <br/>
        <h3 class="wthree_text_info" style="color:darkorange;">LOGIN<span></span></h3>
       <li><a href="index.php" style="color:darkorange;">Home</a><i>|</i></li>
       <li>Login</li>
     </ul>
   </div>
 </div>
<!-- banner-bootom-w3-agileits -->
 <div class="banner-bootom-w3-agileits">
 <div class="container">

   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                  $custLogin = $cmr->customerLogin($_POST);
                }
               
            ?>
        <div class="modal-body modal-body-sub_agile">
         <div class="col-md-8 modal_body_left modal_body_left1">
           <?php
             if (isset($custLogin)) {
               echo $custLogin;
             }
            ?>
         <h3 class="agileinfo_sign">Login In</h3>
            <form action="#" method="post">
           <div class="styled-input agile-styled-input-top">
             <input type="email" name="email" required="">
             <label>Email</label>
             <span></span>
           </div>
           <div class="styled-input">
             <input type="password" name="pass" required="">
             <label>Password</label>
             <span></span>
           </div><br/>
           <input type="submit" name="login" value="Sign In">
         </form>
         <div class="container">
    <!-- Display login button / Google profile information -->
    <?php echo $output; ?>
</div>
                <div class="clearfix"></div>
                <br/>
                <p> Don't have an account?<a href="registration.php" style="color:red;"> Click Here</a></p>

         </div>
         <div class="col-md-4 modal_body_right modal_body_right1">
         </div>
         <div class="clearfix"></div>
       </div>
     </div>
     <!-- //Modal content-->

</div>



 </div>
 </div>

<?php include 'inc/footer.php'; ?>
