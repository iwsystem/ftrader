<?php
include_once('signon/session.php');
include_once("signon/pdo-connect.php");


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
    $lastUpdate = date("l, F d Y H:i:s"); // Saving the current time in a desired format
    $int_uID = $_SESSION["user_id"]; // This is the user id of the logged in user

    //  Code to store the inputed data into th database table
    try {
        // We Will prepare SQL Query
        $str_query = "  INSERT INTO tbl_analysis_history (user_id, analysis_year, analysis_month, analysis_date, last_update, start_capital, rate, trade_year, strat_title, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dece)
                        VALUES (:user_id, :currentYear, :currentMonth, :currentDate, :lastUpdate, :initCap, :theRate, :tradeYear, :strategy, :jan, :feb, :mar, :apr, :may, :jun, :jul, :aug, :sep, :oct, :nov, :dec);";
        $str_stmt = $r_Db->prepare($str_query);
        // bind paramenters, Named paramenters alaways start with colon(:)
        $str_stmt->bindParam(':user_id', $int_uID);
        $str_stmt->bindParam(':currentYear', $currentYear);
        $str_stmt->bindParam(':currentMonth', $currentMonth);
        $str_stmt->bindParam(':currentDate', $currentDate);
        $str_stmt->bindParam(':lastUpdate', $lastUpdate);
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

        $i_historyID= $r_Db->lastInsertId();
        //  Redirect to the Analysis detail page`
        header("location:analysis-detail.php?history_id=$i_historyID"); 
    }   catch(PDOException $e)  {
        echo "Connection failed: " . $e->getMessage();
    }
    // Closing MySQL database connection   
    $r_Db = null;

?>

