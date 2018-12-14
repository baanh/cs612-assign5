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
                    
                    <div class="col-sm-4">
                        <?php
                        function estimated_delivery_date($shipping_days = 3) {
                            $today = time(); //timestamp for current time to be used for current date 
                            $day_of_week = date("N", $today); // get the day of week, e.g. 1 = Monday through 7 = Sunday 
                        
                            if($day_of_week + $shipping_days < 6) {
                                // delivery can be made within same business week
                                $estimated_delivery_date = strtotime("+$shipping_days days");
                            } else if(($day_of_week + $shipping_days) >= 6 && ($day_of_week + $shipping_days) < 15) {
                                // delivery is possible next week hence add two days for weekend (Saturday and Sunday)
                                $shipping_days += 2;
                                $estimated_delivery_date = strtotime("+$shipping_days days");
                                // check if new delivery date is falling in second weekend and adjust accordingly
                                if(date("N", $estimated_delivery_date) == 6 || date("N", $estimated_delivery_date) == 7) {
                                    $shipping_days += 2;
                                    $estimated_delivery_date = strtotime("+$shipping_days days");
                                }
                            } else {
                                // this function does not support shipping time > 7 days
                                return "Not supported";
                            }
                            return date('jS M (D)', $estimated_delivery_date); // Format the date nicely.This format => 1st Jan (Wed) 
                        }
                        ?>
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
