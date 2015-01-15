<?php
include('signon/session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trading Strategy Analysis Tool Home Page. Intro to the Trade analysis Portal">
    <meta name="author" content="Michael Ifeorah">
    <title>Strategy Analyser - Home</title>
    <!-- ShieldUI Forx Charts CSS -->
    <link rel="stylesheet" type="text/css" href="css/shieldui.css" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/strat-analyze.css" rel="stylesheet">
    <link href="css/trade-admin.css" rel="stylesheet">
    <link href="css/css3clock.css" rel="stylesheet"
    <!-- Custom Fonts -->
    <link href="fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/trade-admin.js"></script>
    <!-- jQuery validate plugin -->
    <script src="js/jquery.validate.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>
    <!-- CSS3 Clock -->
    <script src="js/css3clock.js"></script>
    <!-- ShieldUI Forex Chart -->
    <script type="text/javascript" src="js/shieldui.min.js"></script>
    <!-- Forex Chart JavaScript -->
    <script src="js/forex-chart.js"></script>
</head>
<body>
    <div id="main_wrapper">
        <?php include('tmpl/nav.php');  ?>
        <!-- /.Line breaking -->
        <div><br></div>
        <!--  Page body -->
        <?php include('tmpl/body_wrapper/bdy_home.php');  ?>
        <!--  Footer -->
        <?php include('tmpl/footer.php');  ?>
    </div>
    <!-- /main_wrapper -->
</body>
</html>