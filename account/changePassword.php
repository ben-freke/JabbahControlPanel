<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 06/09/15
 * Time: 20:16
 */

echo '
<!-- Modal -->
<div class="modal fade" id="changePW" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="change_pw.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Your Password</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="subject">Current Password</label>
            <input type="password" class="form-control" id="title" name="title" placeholder="Current Password">
          </div>
          <div class="form-group">
            <label for="subject">New Password</label>
            <input type="password" class="form-control" id="title" name="title" placeholder="New Password">
          </div>
          <div class="form-group">
            <label for="subject">Confirm New Password</label>
            <input type="password" class="form-control" id="title" name="title" placeholder="Confirm New Password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
            </form>

  </div>
</div>

';