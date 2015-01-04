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
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Monthly Stored Analysis: </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            This is a list of all stored analysis in the year: <b><?php echo "<strong class='blue_header'>".$tradeYear."</strong>"; ?></b>for the month: <?php echo "<strong class='blue_header'>".$strategy."</strong>"; ?>. 
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
                                    <button type="button" class="btn btn-primary" onclick="history.go(-1);">Click to return to previous page and edit form</button>
                                    <button type="reset" class="btn btn-success" onclick="window.location.href='forms.php';"> Click here to start all over with a new entry</button>
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