<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 06/09/15
 * Time: 20:16
 */

echo '
<!-- Modal -->
<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="addPayment.php?id='.$_GET['id'].'" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a Payment for '.$Name.'</h4>
      </div>
      <div class="modal-body">


          <div class="form-group">
            <label for="subject">Payment Amount</label>
            <input type="double" class="form-control" id="amt" name="amt" placeholder="Payment Amount">
          </div>
          <div class="form-group">
            <label for="subject">Date</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
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