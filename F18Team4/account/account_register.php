<?php include '../view/header.php'; ?>
<?php 
if (!isset($password_message)) { $password_message = ''; } 
?>
<script>
    function setElementValue(name1, name2) {
        if (name2 != '') {
            document.getElementsByName(name1)[0].value = document.getElementsByName(name2)[0].value;
        } else {
            document.getElementsByName(name1)[0].value = '';
        }
    }
    
    function setBillingAddress(checkbox) {
        if (checkbox.checked) {
            setElementValue('bill_line1', 'ship_line1');
            setElementValue('bill_line2', 'ship_line2');
            setElementValue('bill_city', 'ship_city');
            setElementValue('bill_state', 'ship_state');
            setElementValue('bill_zip', 'ship_zip');
            setElementValue('bill_phone', 'ship_phone');
        } else {
            setElementValue('bill_line1', '');
            setElementValue('bill_line2', '');
            setElementValue('bill_city', '');
            setElementValue('bill_state', '');
            setElementValue('bill_zip', '');
            setElementValue('bill_phone', '');
        }
    }
</script>
<main>
    <h3 class="text-secondary">Register</h3>
    <form action="." method="post" id="register_form">

        <h4>Customer Information</h4>
        <input type="hidden" name="action" value="register">

        <label>E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo htmlspecialchars($email); ?>" size="30">
        <?php echo $fields->getField('email')->getHTML(); ?><br>

        <label>Password:</label>
        <input type="password" name="password_1" size="30">
        <?php echo $fields->getField('password_1')->getHTML(); ?>
        <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>

        <label>Retype Password:</label>
        <input type="password" name="password_2" size="30">
        <?php echo $fields->getField('password_2')->getHTML(); ?><br>

        <label>First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo htmlspecialchars($first_name); ?>" 
               size="30">
        <?php echo $fields->getField('first_name')->getHTML(); ?><br>

        <label>Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo htmlspecialchars($last_name); ?>"
               size="30">
        <?php echo $fields->getField('last_name')->getHTML(); ?><br>

        <h4>Shipping Address</h4>
        <label>Address:</label>
        <input type="text" name="ship_line1"
               value="<?php echo htmlspecialchars($ship_line1); ?>"
               size="30">
        <?php echo $fields->getField('ship_line1')->getHTML(); ?><br>

        <label>Line 2:</label>
        <input type="text" name="ship_line2"
               value="<?php echo htmlspecialchars($ship_line2); ?>"
               size="30">
        <?php echo $fields->getField('ship_line2')->getHTML(); ?><br>

        <label>City:</label>
        <input type="text" name="ship_city"
               value="<?php echo htmlspecialchars($ship_city); ?>"
               size="30">
        <?php echo $fields->getField('ship_city')->getHTML(); ?><br>

        <label>State:</label>
        <input type="text" name="ship_state"
               value="<?php echo htmlspecialchars($ship_state); ?>"
               size="30">
        <?php echo $fields->getField('ship_state')->getHTML(); ?><br>

        <label>Zip Code:</label>
        <input type="text" name="ship_zip"
               value="<?php echo htmlspecialchars($ship_zip); ?>"
               size="30">
        <?php echo $fields->getField('ship_zip')->getHTML(); ?><br>

        <label>Phone:</label>
        <input type="text" name="ship_phone"
               value="<?php echo htmlspecialchars($ship_phone); ?>"
               size="30">
        <?php echo $fields->getField('ship_phone')->getHTML(); ?><br>

        <h4>Billing Address</h4>
        <label>&nbsp;</label>
        <input type="checkbox" name="use_shipping"
               <?php if ($use_shipping) : ?>checked<?php endif; ?>
               size="30" onchange="setBillingAddress(this)"> Use shipping address
        <br>

        <label>Address:</label>
        <input type="text" name="bill_line1"
               value="<?php echo htmlspecialchars($bill_line1); ?>"
               size="30">
        <?php echo $fields->getField('bill_line1')->getHTML(); ?><br>

        <label>Line 2:</label>
        <input type="text" name="bill_line2"
               value="<?php echo htmlspecialchars($bill_line2); ?>"
               size="30">
        <?php echo $fields->getField('bill_line2')->getHTML(); ?><br>

        <label>City:</label>
        <input type="text" name="bill_city"
               value="<?php echo htmlspecialchars($bill_city); ?>"
               size="30">
        <?php echo $fields->getField('bill_city')->getHTML(); ?><br>

        <label>State:</label>
        <input type="text" name="bill_state"
               value="<?php echo htmlspecialchars($bill_state); ?>"
               size="30">
        <?php echo $fields->getField('bill_state')->getHTML(); ?><br>

        <label>Zip Code:</label>
        <input type="text" name="bill_zip"
               value="<?php echo htmlspecialchars($bill_zip); ?>"
               size="30">
        <?php echo $fields->getField('bill_zip')->getHTML(); ?><br>

        <label>Phone:</label>
        <input type="text" name="bill_phone"
               value="<?php echo htmlspecialchars($bill_phone); ?>"
               size="30">
        <?php echo $fields->getField('bill_phone')->getHTML(); ?><br>

        <label>&nbsp;</label>
        <input type="submit" class="btn btn-warning" value="Register">
    </form>
</main>
<?php include '../view/footer.php'; ?>