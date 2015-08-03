<?php
include_once('signon/session.php');
include_once("signon/pdo-connect.php");


    $i_historyID = $_POST['history_id'];   // The ID of the record
    $initCap = $_POST['initialCapital'];    // Initial Capital used to start business that year$theRate = $_POST['rate'];  // Percentage rate of profit / loss calculation
    $rate = $_POST['rate']; // array of the rate from all months sent from form
    $tradeYear = $_POST['theYear']; // Variable for the year being analysed       
    $strategy = $_POST['strategy']; // Variable for the year being analysed            
    $january = $_POST['january']; // The value of the month specified
    $febuary = $_POST['febuary']; // The value of the month specified
    $march = $_POST['march']; // The value of the month specified
    $april = $_POST['april']; // The value of the month specified
    $may = $_POST['may']; // The value of the month specified
    $june = $_POST['june']; // The value of the month specified
    $july = $_POST['july']; // The value of the month specified
    $august = $_POST['august']; // The value of the month specified
    $september = $_POST['september']; // The value of the month specified
    $october = $_POST['october']; // The value of the month specified
    $november = $_POST['november']; // The value of the month specified
    $december = $_POST['december']; // The value of the month specified
    $lastUpdate = date("l, F d Y H:i:s"); // Saving the current time in a desired format

    $int_uID = $_SESSION["user_id"]; // This is the user id of the logged in user

    //  Code to update the inputed data into the database table
    try {
        // We Will prepare SQL Query
        $str_query = "  UPDATE tbl_analysis_history
                        SET last_update=:lastUpdate, start_capital=:initCap, rate=:rate, trade_year=:tradeYear, strat_title=:strategy, jan=:january, feb=:febuary, mar=:march, apr=:april, may=:may, jun=:june, jul=:july, aug=:august, sep=:september, oct=:october, nov=:november, dece=:december
                        WHERE id = :id;";
        $str_stmt = $r_Db->prepare($str_query);
        // bind paramenters, Named paramenters alaways start with colon(:)
        $str_stmt->bindParam(':id', $i_historyID);
        $str_stmt->bindParam(':initCap', $initCap);
        $str_stmt->bindParam(':rate', $rate);
        $str_stmt->bindParam(':tradeYear', $tradeYear);
        $str_stmt->bindParam(':strategy', $strategy);
        $str_stmt->bindParam(':january', $january);
        $str_stmt->bindParam(':febuary', $febuary);
        $str_stmt->bindParam(':march', $march);
        $str_stmt->bindParam(':april', $april);
        $str_stmt->bindParam(':may', $may);
        $str_stmt->bindParam(':june', $june);
        $str_stmt->bindParam(':july', $july);
        $str_stmt->bindParam(':august', $august);
        $str_stmt->bindParam(':september', $september);
        $str_stmt->bindParam(':october', $october);
        $str_stmt->bindParam(':november', $november);
        $str_stmt->bindParam(':december', $december);
        $str_stmt->bindParam(':lastUpdate', $lastUpdate);
        // For Executing prepared statement we will use below function
        $str_stmt->execute();
        
        //  Redirect to the Analysis detail page
        header("location:analysis-detail.php?history_id=$i_historyID"); 
    }   catch(PDOException $e)  {
        echo "Connection failed: " . $e->getMessage();
    }
    // Closing MySQL database connection   
    $r_Db = null;
?>


