<!-- Sign In modal content -->
  <div id="signin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h3 id="myModalLabel">Sign In Form</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="signon/chk-login.php">
        <div class="control-group">
          <label class="control-label" for="username">User Name</label>
          <div class="controls">
          <input type="text" name="username"  id="username" placeholder="User Name" required="required">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Password</label>
          <div class="controls">
          <input type="password" name="password" id="password" placeholder="Password" maxlength="15" minlength="6"  required="required">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
          <button type="submit" class="btn">Sign in</button>
          </div>
        </div>
      </form>
    </div>
  </div>