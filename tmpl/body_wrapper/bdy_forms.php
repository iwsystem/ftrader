<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Entry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p><i><strong>Note:</strong>
                            The Fields with (*) are compulsory. Complete them before clicking <b>submit</b> button. <br> In monthly trade input field, if the month had more loss than wins, use (-) in front of the number input </i></p>
                        </div>
                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="myForm" role="form" method="post" action="result.php" name ="myForm" novalidate="novalidate">
                                        <div class="col-lg-6">
                                            <h3>Trade Variable Entry</h3>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="initialcapital">Start Capital *</label>
                                                <!-- Note, wrapping up the input field around the div enables the custom error Element to be in a new line -->
                                                <div class="controls">  
                                                    <input type="text" class="form-control" placeholder="Type here" id="initialCapital" name="initialCapital">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="rate">Rate *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="rate" name="rate">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="theYear">Year *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="theYear" name="theYear">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="theYear">Strategy Title *</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="strategy" name="strategy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h3>Month Entry</h3>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="january">January</label>
                                                
                                                    <input type="text" class="form-control" placeholder="Type here" id="january" name="monthWins[]">
                                                
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="febuary">Febuary</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="febuary" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="march">March</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="march" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="april">April</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="april" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="may">May</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="may" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="june">June</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="june" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="july">July</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="july" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="august">August</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="august" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="september">September</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="september" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="october">October</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="october" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="november">November</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="november" name="monthWins[]">
                                                </div>
                                            </div>
                                            <div class="form-group input-group col-lg-4">
                                                <label class="control-label" for="december">December</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" placeholder="Type here" id="december" name="monthWins[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                                <button type="submit" class="btn btn-primary" id="submitButton">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
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