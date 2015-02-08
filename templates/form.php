  <form class="form-horizontal" role="form" action="<?php esc_url($_SERVER['REQUEST_URI']) ?>" method="POST">

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" maxlength="32" name="firstname" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" maxlength="32" name="surname" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Address:</label>
      <div class="col-sm-10">
        <input type="text" maxlength="32" name="address1" class="form-control" id="firstname" placeholder="" value="">
        <input type="text" maxlength="32" name="address2" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Suburb:</label>
      <div class="col-sm-10">
        <input type="text" maxlength="32" name="suburb" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Postcode:</label>
      <div class="col-sm-10">
        <input type="text" maxlength="4" size="4" name="postcode" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Branch</label>
      <div class="col-sm-10">
        <input type="text" maxlength="16" name="branch" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Phone (h)</label>
      <div class="col-sm-10">
        <input type="text" name="phone_h" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Phone (w)</label>
      <div class="col-sm-10">
        <input type="text" name="phone_w" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>
      <div class="col-sm-10">
        <input type="text" name="phone_m" class="form-control" id="firstname" placeholder="" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="address" class="col-sm-2 control-label">How you can assist:</label>
      <div class="col-sm-10">
        <label class="radio-inline">
          <input type="checkbox" name="assist" id="assist" value="phone"> Phone canvassing
        </label>
        <label class="radio-inline">
          <input type="checkbox" name="assist" id="assist" value="phone"> Phone canvassing
        </label>
        <label class="radio-inline">
          <input type="checkbox" name="assist" id="assist" value="phone"> Phone canvassing
        </label>
        <label class="radio-inline">
          <input type="checkbox" name="assist" id="assist" value="phone"> Phone canvassing
        </label>

      </div>
    </div>

<!--     <div class="form-group">
      <div class="col-sm-2" style="border: 1px solid red">
        test
      </div>
      <div class="col-sm-4">
        test
      </div>
      <div class="col-sm-4">
        test
      </div>
    </div> -->

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="vf-form-submit" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>