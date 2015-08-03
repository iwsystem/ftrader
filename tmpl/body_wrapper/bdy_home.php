<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hello! <?php 
                    if (isset($_SESSION["firstname"])) {
                        echo ucfirst($_SESSION["firstname"]);   // Return the name of the user with the first letter in Capital
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
                            You last login was on: <?php echo "<strong class='blue_header'>" . $_SESSION["last_login"]  . "</strong>";?>.
                        </div><br>
                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="clock-container">
                                        <div class="clock">
                                            <div id="Date"></div>
                                            <ul>
                                                <li id="hours"> </li>
                                                <li id="point">:</li>
                                                <li id="min"> </li>
                                                <li id="point">:</li>
                                                <li id="sec"> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><br><br>
                            <!-- End of clock -->
                            <h2 class="blue_header">Live FX Rates</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="treufx">
                                        <iframe src="https://webrates.truefx.com/rates/webWidget/trfxhp.jsp?l=n&amp;t=250" width="100%" height="370" frameborder="0" padding="0" margin="0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <!-- End of TrueFX Rates -->
                            <h2 class="blue_header">Currency Charts</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">                
                                        <div id="USDJPYChart" class="panel-body">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">                
                                        <div id="USDGBPChart" class="panel-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">                
                                        <div id="GBPJPYChart" class="panel-body">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">                
                                        <div id="EURGBPChart" class="panel-body">
                                        </div>
                                    </div>
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