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
        $allMonths = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"  );
        $theRate = $arr_History["rate"];  // Percentage rate of profit / loss calculation as retrieved from database 
        $allWins = array($arr_History["jan"],$arr_History["feb"],$arr_History["mar"],$arr_History["apr"],$arr_History["may"],$arr_History["jun"],$arr_History["jul"],$arr_History["aug"],$arr_History["sep"],$arr_History["oct"],$arr_History["nov"],$arr_History["dece"]); // array of the wins from all months sent from form
        $countAllWins = count($allWins);    // total number of wins 
        $initialMonthlyCapital = $initCap;  // initial monthly capital which will be incremented each month
        $sumOfWins =0;  // initializing the sum of wins to zero
        $sumOfWinPercentage = 0;    // initializing the sum of the win percentage to zero
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Details of previous analysis </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            The Table below is a record of Trade Analysis for the year <b><?php echo "<strong class='blue_header'>".$tradeYear."</strong>"; ?></b> using strategy: <?php echo "<strong class='blue_header'>".$strategy."</strong>"; ?> with Starting Capital of <b> &pound;<?php echo "<strong class='blue_header'>". $initCap ."</strong>"; ?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th># of Won Trades</th>
                                            <th>% Profit</th>
                                            <th>End of Month Balance</th>
                                            <th>Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        for ($i=0; $i<$countAllWins; $i++)  {
                                            $monthlyWin = $allWins[$i]; // The monthly win for each month
                                            $percentWins=$monthlyWin * $theRate;    // calculating the percentage win
                                            $profit= round($initialMonthlyCapital * ($percentWins/100), 2) ;
                                            $newBalance = $initialMonthlyCapital + $profit; // calculating the new balance after each month's trading
                                            if ($monthlyWin) {
                                                if ($monthlyWin < 0)    {
                                                    $performance = '<i class="fa fa-arrow-down fa-fw"></i>';
                                                }   else   {
                                                    $performance = '<i class="fa fa-arrow-up fa-fw"></i>';
                                                }                                                
                                            }

                                            echo "<tr>";
                                            echo "<td> $allMonths[$i] </td>"."<td> $monthlyWin </td>"."<td> $percentWins </td>"."<td> $newBalance </td>". "<td> $performance </td>"; 
                                            echo "</tr>";
                                            /** 
                                             *  Creating an array to store the data values of the results for future use
                                             * 
                                            *$allPercent[$i] = $percentWins;
                                            *$allCapital[$i] = $newBalance;
                                            */
                                            $initialMonthlyCapital = $newBalance;   // Assigning the new balance to teh monthly capital
                                            $sumOfWins = $sumOfWins + $monthlyWin;  // Calculating the sum of wins
                                            $sumOfWinPercentage = $sumOfWinPercentage + $percentWins;   // Calculating the percentage of the sum of wins
                                        }
                                        $totalProfit = $newBalance - $initCap;
                                        $totalPercentProfit =round(($totalProfit/$initCap) * 100, 2);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <?php
                                    echo "<strong>Total Yearly Wins: </strong> <b>".$sumOfWins . "</b> <br>";
                                    echo "<strong>Total Yearly Percent Wins: </strong> <b>". $sumOfWinPercentage . "</b> % <br>";
                                    echo "<strong>Total Yearly Profit: </strong> <b>".$totalProfit . "</b> <br>";
                                    echo "<strong>Total Yearly Profit: </strong> <b>".$totalPercentProfit . "</b> % <br>";
                                ?>
                                <br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" onclick="history.go(-1);">Click to return to analysis history</button>
                                    <button type="reset" class="btn btn-success" onclick="window.location.href='forms.php';"> Click here to make a new analysis</button>
                                </div>
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