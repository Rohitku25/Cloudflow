<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.compat.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src='js/random_pass.js'></script>
    <script src='js/index.js'></script>
    <script src='js/check_user.js'></script>
    <script src='js/signup.js'></script>
    <script src='js/activate.js'></script>
    <script src='js/login.js'></script>
    <script src="js/activate_btn.js"></script>
</head>
<body style="background:#FCD0D0 !important;">
<div class="container-fluid animated fadeIn">
    <div class="row">
        <!--image-->
        <div class="col-md-4 p-4">
            <img src="image/main_pic.jpg" class="w-100 shadow-lg"/>
        </div>

        <!--sign up-->
        <div class="col-md-4 px-5 py-4">
            <h3 class="ml-3 mb-4" >SIGN UP</h3>
            <form autocomplete="off" id="signup_form">
                <input type="text" name="fullname" id="fname" placeholder="ENTER YOUR NAME" required="required"/>
                <div class="email-box">
                <input type="email" style="position:absolute" name="email" id="email" placeholder="EMAIL" required="required"/>
                <i class="fa fa-circle-o-notch fa-spin email-loder d-none"></i>
                </div>

                <div class="password-box">
                <input type="password" style="position:absolute" name="password" id="pass" placeholder="PASSWORD" required="required"/>
                <i class="fa fa-eye show-icon"></i>
                </div>

                <button class="btn float-left mt-2 py-2 w-70" style="font-size:13px;cursor:text">CLICK GENERATE TO IMPROVE SECURITY</button>
                <button class="btn float-right mt-2 generate-btn" style="font-size:14px">GENERATE</button>
                <button class="btn submit-btn m-3" disabled='disabled' type="submit">Register now</button>
                <div class="sign_up_error p-2"></div>
            </form>
            
            <div class="px-2 activator d-none">
                <span>Please check your mail to get Activation code</span>
                <input type="text" name="code" id="code" class="my-3" placeholder="Activation Code"/>
                <button class="btn btn-dark activate-btn">Activate now</button>
                <p class="activate_notif alert"></p>
            </div>
        </div>

        <!--login-->
        <div class="col-md-4 px-5 py-4">
        <h3 class="ml-3 mb-4" id="login_form">LOGIN</h3>
            <form autocomplete="off">
                <div class="email-box">
                    <input type="email" style="position:absolute" name="email" id="login-email" placeholder="USERNAME" required="required"/>
                    <!-- <i class="fa fa-circle-o-notch fa-spin email-loder d-none"></i> -->
                </div>

                <div class="password-box">
                    <input type="password" style="position:absolute" name="password" id="login-pass" placeholder="PASSWORD" required="required"/>
                    <i class="fa fa-eye show-icon"></i>
                </div>

                <button class="btn m-3 float-right login-submit-btn"  type="submit">Login now</button>
                <br/>

                <div class="px-2 login-activator d-none">
                    <span>Please check your mail to get Activation code</span>
                    <input type="text" name="code" id="login-code" class="my-3" placeholder="Activation Code"/>
                    <button class="btn btn-dark login-activate-btn">Activate now</button>
                </div>
            </form>
            <div class="p-2 login-notice"></div>
        </div>
    </div>
</div>
</body>
</html>