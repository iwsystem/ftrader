<?php 

        $i_hisID = $_GET["history_id"]; // This is the id of the analysed history
        try {
            // We Will prepare SQL Query
            $str_query = "  SELECT *
                            FROM tbl_analysis_history 
                            WHERE  id = :id;";
            $str_stmt = $r_Db->prepare($str_query);
            // bind paramenters, Named paramenters alaways start with colon(:)
            $str_stmt->bindParam(':id', $i_hisID);
            // For Executing prepared statement we will use below function
            $str_stmt->execute();
            $arr_History = $str_stmt->fetch(PDO::FETCH_ASSOC);
        }   catch(PDOException $e)  {
                echo "Connection failed: " . $e->getMessage();
        }
        // Closing MySQL database connection   
        $r_Db = null;
        $tradeYear = $arr_History["trade_year"]; // Variable for the year being analysed as retrieved from database    
        $strategy = $arr_History["strat_title"]; // Variable for the year being analysed as retrieved from database             
        $initCap = $arr_History["start_capital"];    // Initial Capital used to start business that year as retrieved from database 
        $theRate = $arr_History["rate"];  // Percentage rate of profit / loss calculation as retrieved from database 


?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Entry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p><i><strong>Note:</strong>
                            The Fields with (*) are compulsory. Complete them before clicking <b>update</b> button. <br> In monthly trade input field, if the month had more loss than wins, use (-) in front of the number input </i></p>
                        </div>
                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="myForm" role="form" method="post" action="analysis-detail_update.php" name ="myForm" novalidate="novalidate">
                                        <div class="col-lg-6">
                                            <h3>Trade Variable Entry</h3>
                                            <div class="form-group input-group col-lg-4">
                                                <input name="history_id" id="history_id" type="hidden" value="<?php echo $arr_History['id']; ?>">
                                                <label class="control-label" for="initialcapital">Start Capital *</label>
                                                <!-- Note, wrapping up the input field around the div enables the custom error Element to be in a new line -->
                                                <div class="controls">  
                                                    <input type="text" class="form-control" placeholder="Type here" id="initialCapital" name="initialCapital" value="<?php echo $arr_History["start_capital"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="rate">Rate *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="rate" name="rate" value="<?php echo $arr_History["rate"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="theYear">Year *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="theYear" name="theYear" value="<?php echo $arr_History["trade_year"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="theYear">Strategy Title *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="strategy" name="strategy" value="<?php echo $arr_History["strat_title"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h3>Month Entry</h3>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="january">January</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="january" name="january" value="<?php echo $arr_History["jan"]; ?>">
                                                </div>                                                
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="febuary">Febuary</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="febuary" name="febuary" value="<?php echo $arr_History["feb"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="march">March</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="march" name="march" value="<?php echo $arr_History["mar"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="april">April</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="april" name="april" value="<?php echo $arr_History["apr"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="may">May</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="may" name="may" value="<?php echo $arr_History["may"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="june">June</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="june" name="june" value="<?php echo $arr_History["jun"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="july">July</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="july" name="july" value="<?php echo $arr_History["jul"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="august">August</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="august" name="august" value="<?php echo $arr_History["aug"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="september">September</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="september" name="september" value="<?php echo $arr_History["sep"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="october">October</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="october" name="october" value="<?php echo $arr_History["oct"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="november">November</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="november" name="november" value="<?php echo $arr_History["nov"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="december">December</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="december" name="december" value="<?php echo $arr_History["dece"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                                <button type="submit" class="btn btn-primary" id="submitButton">Update Result</button>
                                                <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
                                        </div>
                                    </form>
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