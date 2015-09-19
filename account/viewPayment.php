<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 06/09/15
 * Time: 20:16
 */

echo '
<!-- Modal -->
<div class="modal fade" id="viewPayInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="change_pw.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Your Payment Details</h4>
      </div>
      <div class="modal-body">

          <h4>Your Payment Details</h4>
          <p><ul>
            <li><b>Day:</b> 24th</li>
            <li><b>Amount:</b> £14.99</li>
            <li><b>Frequency:</b> Monthly</li>
            <li><b>Sort Code:</b> 20-20-15</li>
            <li><b>Account Number:</b> 93879992</li>
            <li><b>Bank:</b> Barclays Bank PLC</li>
            <li><b>Reference:</b> '.strtoupper($lastName).$userID.'</li>





          </ul></p>
      </div>
    </div>

  </div>
</div>

';