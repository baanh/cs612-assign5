<?php include '../view/header.php'; ?>
<br>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3 class="text-secondary">Billing Address</h3>
                <p><?php echo htmlspecialchars($billing_address['line1']); ?><br>
                    <?php if (strlen($billing_address['line2']) > 0) : ?>
                        <?php echo htmlspecialchars($billing_address['line2']); ?><br>
                    <?php endif; ?>
                    <?php
                    echo htmlspecialchars($billing_address['city'] . ', ' .
                            $billing_address['state'] . ' ' .
                            $billing_address['zipCode']);
                    ?><br>
                    <?php echo htmlspecialchars($billing_address['phone']); ?>
                </p>
                <form action="../account" method="post">
                    <input type="hidden" name="action" value="edit_billing">
                    <input type="submit" class="btn btn-warning" value="Edit Billing Address">
                </form>
            </div>
            <div class="col-sm-9">
                <h3 class="text-secondary">Payment Information</h3>
                <form action="." method="post" id="payment_form">
                    <input type="hidden" name="action" value="process">

                    <div class="form-group row">
                        <label for="inputCardType" class="col-sm-2 col-form-label">Card Type</label>
                        <div class="col-sm-4">
                            <select name="card_type" class="form-control" id="inputCardType">
                                <option value="1">MasterCard</option>
                                <option value="2">Visa</option>
                                <option value="3">Discover</option>
                                <option value="4">American Express</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCardNumber" class="col-sm-2 col-form-label">Card Number</label>
                        <div class="col-sm-4">
                            <input type="text" name="card_number" 
                                   value="<?php echo htmlspecialchars($card_number); ?>" class="form-control" id="inputCardNumber" placeholder="Card Number">
                            <span class="error"><?php echo $cc_number_message; ?></span>
                            <small class="form-text text-muted">No dashes or spaces.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCVV" class="col-sm-2 col-form-label">CVV</label>
                        <div class="col-sm-4">
                            <input type="text" name="card_cvv" 
                                   value="<?php echo htmlspecialchars($card_cvv); ?>" class="form-control" id="inputCVV" placeholder="CVV">
                            <span class="error"><?php echo $cc_ccv_message; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputExpiration" class="col-sm-2 col-form-label">Expiration</label>
                        <div class="col-sm-4">
                            <input type="text" name="card_expires" 
                                   value="<?php echo htmlspecialchars($card_expires); ?>" class="form-control" id="inputExpiration" placeholder="Expiration Date">
                            <span class="error"><?php echo $cc_expiration_message; ?></span>
                            <small class="form-text text-muted">MM/YYYY.</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-success btn-block" value="Place Order">&nbsp;&nbsp;
                    </div>
                </form>
                <form action="../cart" method="post" >
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-light btn-block" value="Cancel Payment">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include '../view/footer.php'; ?>