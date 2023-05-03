
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/flex-admin.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
    <style>
        Alert container .alert-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 1;
        }
        .alert-box {
            position: relative;
            margin: 10% auto;
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .alert-message {
            display: block;
            padding: 20px;
            font-size: 1.2rem;
            text-align: center;
        }
        .alert-close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px 15px;
            background-color: #f44336;
            color: #fff;
            font-size: 1.2rem;
            border: none;
            border-radius: 0 3px 0 0;
            cursor: pointer;
        }
    </style>
</head>

<body class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> Admin Login</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Admin!</strong>
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body" id="logInDiv">
                        <form method="POST" action="" accept-charset="UTF-8" role="form" id="logInForm">
                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+~`|\\{}[\]:]).{8,}" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <br>
                                <button id="login_btn" type="submit" class="btn btn-lg btn-green btn-block" value="Sign IN">Sign IN</button>
                            
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------ query plugin---------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./js/adminPanel.js"></script>

    <script>

    </script>

</body>
<!-- Mirrored from blackrockdigital.github.io/theme-flex-admin/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Feb 2023 04:10:49 GMT -->

</html>