<?php session_start();
include '../form_csrf/csrf.php';
include 'login-request.php';
if(isset($_SESSION['name']) && isset($_SESSION['email'])){

  header("location: home.php");
  
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>BeMo Academic Consulting Inc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="icon" type="image/png" href="../assets/bemo-logo2.png" />
    <link rel="stylesheet" href="../css/bootstrap-4.4.1.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <?php if(isset($error_msg)){ echo "<div class='text-danger text-center pb-1'>".$error_msg."</div>"; }?>
            <form class="form-signin" id="form-signin" method="post">
              <input type="hidden" name="csrf_token" id="csrfToken" value="<?php echo generateToken('signin'); ?>"/>
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?php if(isset($_COOKIE['member_login'])){ echo $_COOKIE['member_login']; }?>" required autofocus>
                <label for="email">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                  <?php if(isset($_COOKIE["member_login"])) { echo "checked"; } ?>
                >
                <label class="custom-control-label" for="remember">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="sign-in" id="sign-in">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="../js/jquery-3.2.1.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap-4.4.1.js"></script>
<script src="js/login.js"></script>
</body>
</html>