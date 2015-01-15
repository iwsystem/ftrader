<?php
    $tradeYear = $_POST['theYear']; // Variable for the year being analysed       
    $strategy = $_POST['strategy']; // Variable for the year being analysed            
    $initCap = $_POST['initialCapital'];    // Initial Capital used to start business that year
    $allMonths = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"  );
    $theRate = $_POST['rate'];  // Percentage rate of profit / loss calculation
    $allWins = $_POST['monthWins']; // array of the wins from all months sent from form
    $countAllWins = count($allWins);    // total number of wins 
    $initialMonthlyCapital = $initCap;  // initial monthly capital which will be incremented each month
    $sumOfWins =0;  // initializing the sum of wins to zero
    $sumOfWinPercentage = 0;    // initializing the sum of the win percentage to zero
    $currentYear = date("Y");   // Saving the current year
    $currentMonth = date("F");  // Saving the current month
    $currentDate = date("l, F d Y H:i:s"); // Saving the current time in a desired format
    $int_uID = $_SESSION["user_id"]; // This is the user id of the logged in user
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Result</h1> 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Table of Trade Analysis for the year <b><?php echo "<strong class='blue_header'>".$tradeYear."</strong>"; ?></b> using strategy: <?php echo "<strong class='blue_header'>".$strategy."</strong>"; ?> with Starting Capital of <b> &pound;<?php echo "<strong class='blue_header'>". $initCap ."</strong>"; ?></b>
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
                                        $profit= round($initialMonthlyCapital * ($percentWins/100), 2) ;    // Calculating profit rounding to 2 decimal places
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
                                <button type="button" class="btn btn-primary" onclick="history.go(-1);">Click to return to previous page and edit form</button>
                                <button type="reset" class="btn btn-success" onclick="window.location.href='forms.php';"> Click here to start all over with a new entry</button>
                            </div>
                        </div>
                        <?php 
                        //  Code to store the inputed data into th database table
                            try {
                                // We Will prepare SQL Query
                                $str_query = "  INSERT INTO tbl_analysis_history (user_id, analysis_year, analysis_month, analysis_date, start_capital, rate, trade_year, strat_title, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dece)
                                                VALUES (:user_id, :currentYear, :currentMonth, :currentDate, :initCap, :theRate, :tradeYear, :strategy, :jan, :feb, :mar, :apr, :may, :jun, :jul, :aug, :sep, :oct, :nov, :dec);";
                                $str_stmt = $r_Db->prepare($str_query);
                                // bind paramenters, Named paramenters alaways start with colon(:)
                                $str_stmt->bindParam(':user_id', $int_uID);
                                $str_stmt->bindParam(':currentYear', $currentYear);
                                $str_stmt->bindParam(':currentMonth', $currentMonth);
                                $str_stmt->bindParam(':currentDate', $currentDate);
                                $str_stmt->bindParam(':initCap', $initCap);
                                $str_stmt->bindParam(':theRate', $theRate);
                                $str_stmt->bindParam(':tradeYear', $tradeYear);
                                $str_stmt->bindParam(':strategy', $strategy);
                                $str_stmt->bindParam(':jan', $allWins[0]);
                                $str_stmt->bindParam(':feb', $allWins[1]);
                                $str_stmt->bindParam(':mar', $allWins[2]);
                                $str_stmt->bindParam(':apr', $allWins[3]);
                                $str_stmt->bindParam(':may', $allWins[4]);
                                $str_stmt->bindParam(':jun', $allWins[5]);
                                $str_stmt->bindParam(':jul', $allWins[6]);
                                $str_stmt->bindParam(':aug', $allWins[7]);
                                $str_stmt->bindParam(':sep', $allWins[8]);
                                $str_stmt->bindParam(':oct', $allWins[9]);
                                $str_stmt->bindParam(':nov', $allWins[10]);
                                $str_stmt->bindParam(':dec', $allWins[11]);
                                // For Executing prepared statement we will use below function
                                $str_stmt->execute();
                            }   catch(PDOException $e)  {
                                echo "Connection failed: " . $e->getMessage();
                            }
                            // Closing MySQL database connection   
                            $r_Db = null;
                        ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->