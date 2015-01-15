<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Stored Trading Analysis: </h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    This is a summarized list of all stored trading analysis you have performed on this platform. <br>
                    Click on each of the analysis on the table below, to get the detailed result of the analysis that was performed. 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Click to view Detail</th>
                                    <th>Date of Analysis</th>
                                    <th>Strategy Title</th>
                                    <th>Trade Year</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $int_uID = $_SESSION["user_id"]; // This is the user id of the logged in user
                                try {
                                    // We Will prepare SQL Query
                                    $str_query = "  SELECT *
                                                    FROM tbl_analysis_history 
                                                    WHERE  user_id = :user_id
                                                    ORDER BY id DESC;";
                                    $str_stmt = $r_Db->prepare($str_query);
                                    // bind paramenters, Named paramenters alaways start with colon(:)
                                    $str_stmt->bindParam(':user_id', $int_uID);
                                    // For Executing prepared statement we will use below function
                                    $str_stmt->execute();
                                    $arr_History = $str_stmt->fetchAll(PDO::FETCH_ASSOC);
                                    //  Looping through the array to display details retrieved from database
                                    foreach ($arr_History as $oHistory) {
                                        $i_historyID = $oHistory["id"]; // Assigning the id that will be passed to the detail script
                                        echo "<tr>";
                                        echo "<td>" . "<a href='analysis-detail.php?history_id=$i_historyID'>". "Click here" . "</a>" . "</td>"."<td>". $oHistory["analysis_date"] . "</td>"."<td>" . $oHistory["strat_title"] ."</td>"."<td>" . $oHistory["trade_year"] . "</td>"; 
                                        echo "</tr>";
                                    }
                                }   catch(PDOException $e)  {
                                        echo "Connection failed: " . $e->getMessage();
                                }
                                // Closing MySQL database connection   
                                $r_Db = null;
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <div class="well">
                        <br>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->