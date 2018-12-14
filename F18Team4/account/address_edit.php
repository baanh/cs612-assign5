<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<main class="nofloat">
    <h3 class="text-secondary"><?php echo $heading; ?></h3>
    <div id="edit_address_form">
        <form action="." method="post">
            <input type="hidden" name="action" value="update_address">
            <input type="hidden" name="address_type" value="<?php echo $address_type ?>">
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" name="line1" 
                           value="<?php echo htmlspecialchars($line1); ?>" class="form-control" id="inputAddress" placeholder="Address">
                           <?php echo $fields->getField('line1')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLine2" class="col-sm-2 col-form-label">Line 2</label>
                <div class="col-sm-10">
                    <input type="text" name="line2" 
                           value="<?php echo htmlspecialchars($line2); ?>" class="form-control" id="inputLine2" placeholder="Address 2">
                           <?php echo $fields->getField('line2')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" name="city" 
                           value="<?php echo htmlspecialchars($city); ?>" class="form-control" id="inputCity" placeholder="City">
                           <?php echo $fields->getField('city')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputState" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <input type="text" name="state" 
                           value="<?php echo htmlspecialchars($state); ?>" class="form-control" id="inputState" placeholder="State">
                           <?php echo $fields->getField('state')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputZipCode" class="col-sm-2 col-form-label">Zip Code</label>
                <div class="col-sm-10">
                    <input type="text" name="zip" 
                           value="<?php echo htmlspecialchars($zip); ?>" class="form-control" id="inputZipCode" placeholder="ZipCode">
                           <?php echo $fields->getField('zip')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" 
                           value="<?php echo htmlspecialchars($phone); ?>" class="form-control" id="inputPhone" placeholder="Phone">
                           <?php echo $fields->getField('phone')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-info"
                       value="<?php echo htmlspecialchars($heading); ?>">
            </div>
            <br>
        </form>
        <form action="." method="post">
            <input type="submit" class="btn btn-light" value="Cancel">
        </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>
