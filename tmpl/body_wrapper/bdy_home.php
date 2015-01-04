<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hello! <?php 
                    if (isset($_SESSION["firstname"])) {
                        echo ucfirst($_SESSION["firstname"]);   // Return the namehe user with the first letter in Capital
                    } else {
                        echo "User";
                    }?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Welcome to the home page of your account. Here you can be able to control and access all your traidng resources and records.<br>
                            You last login was on: <?php echo date("Y-m-d H:i:s");?>.
                        </div>
                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->