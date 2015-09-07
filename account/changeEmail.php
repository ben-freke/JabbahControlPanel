<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 06/09/15
 * Time: 20:16
 */


echo '
<!-- Modal -->
<div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="change_pw.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Your Email Address</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="subject">New Email</label>
            <input type="email" class="form-control" id="title" name="title" placeholder="New Email">
          </div>
          <div class="form-group">
            <label for="subject">Confirm New Email</label>
            <input type="email" class="form-control" id="title" name="title" placeholder="Confirm New Email">
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