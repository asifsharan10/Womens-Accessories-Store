<?php $phone = trim($generalConfig["phone_number"]); ?>
<div class="row">
   <div class="col-sm-12">
      <input type="text" class="form-control name" name="orderid" placeholder="Order Id *">
   </div>
   <div class="col-sm-12">
      <input type="text" class="form-control name" name="firstName" placeholder="Name *">
   </div>
   <div class="col-sm-12">
      <input type="email" class="form-control email" name="email" placeholder="Email *">
   </div>
   <div class="col-sm-12">
      <input type="tel" class="form-control phone" name="phone" placeholder="Phone *"  data-min-length="10" data-max-length="15" value="" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10">
   </div>
   <div class="col-sm-12">
      <textarea class="form-control" id="cancel_reason" name="cancel_reason" placeholder="Reason to cancel" style="height:200px" rows="5" cols="33"></textarea>
   </div>
   <div class="col-sm-12">
      <button id="" onClick="canform_submit('<?= $phone; ?>')" class="btn btn-primary next"> Submit</button>
   </div>
</div>
