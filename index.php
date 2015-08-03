<?php
    session_start();
     // Redirecting user to portal home page if the user had already signed in
    if(isset($_SESSION['logged_in_user'])){
        header('Location:home.php'); // Redirecting To Login Page
    }
?>
        <!DOCTYPE html>
        <html lang="en" style="">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Trading Strategy Analysis Tool">
            <meta name="author" content="Michael Ifeorah">
            <title>Strategy Analyser - Signin</title>
            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <!-- Bootstrap Responsive CSS -->
            <link href="css/bootstrap-responsive.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="css/strat-analyze.css" rel="stylesheet">
            <link href="css/index-html.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>
            <!-- Main page wrapper -->
            <div id="main_wrapper">
                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <!--Grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">Strategy Analyser</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <form class="navbar-form navbar-right" role="form" method="post" action="signon/chk-login.php">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" class="form-control" id="username" name="username"  required>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-user fa-fw"></i>Sign in</button>
                                <!-- <br><span class="error_msg"><?php // echo $error; ?></span> -->
                            </form>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
                <!-- Header -->
                <div class="intro-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="intro-message">
                                    <h1>Strat Analyzer</h1>
                                    <h3>A Bespoke Trading Analysis / Monitoring System</h3>
                                    <hr class="intro-divider">
                                    <ul class="list-inline intro-signon-button">
                                        <li>
                                            <a href="#username" data-toggle="modal" class="btn btn-default btn-lg"><i class="fa fa-user fa-fw"></i> <span class="signon-button">SignIn</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container -->
                </div>
                <!--  Footer -->
                <?php include('tmpl/footer.php');  ?>
                <!-- Modal for signin-->
                  <div class="container">
                    <?php  include('tmpl/modal/signon-modal.php'); ?>
                  </div>
                
                <!-- jQuery -->
                <script src="js/jquery.js"></script>
                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script> 
            </div>
            <!-- /#main-wrapper -->
        </body>
        </html>
