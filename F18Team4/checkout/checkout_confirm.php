<?php include '../view/header.php'; ?>
<br>
<main class="nofloat">
    <h3 class="text-secondary">Confirm Order</h3>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3 class="text-secondary">Shipping Address</h3>
                <p><?php echo htmlspecialchars($shipping_address['line1']); ?><br>
                    <?php if (strlen($shipping_address['line2']) > 0) : ?>
                        <?php echo htmlspecialchars($shipping_address['line2']); ?><br>
                    <?php endif; ?>
                    <?php
                    echo htmlspecialchars($shipping_address['city'] . ', ' .
                            $shipping_address['state'] . ' ' .
                            $shipping_address['zipCode']);
                    ?><br>
                    <?php echo htmlspecialchars($shipping_address['phone']); ?>
                </p>
                <form action="../account" method="post">
                    <input type="hidden" name="action" value="edit_shipping">
                    <input type="submit" class="btn btn-warning" value="Edit Shipping Address">
                </form>
            </div>
    
    <table id="cart" class="table">
        <tr id="cart_header">
            <th class="left" >Item</th>
            <th class="right">Price</th>
            <th class="right">Quantity</th>
            <th class="right">Total</th>
        </tr>
        <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                </td>
                <td class="right">
                    <?php echo $item['quantity']; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer">
            <td colspan="3" class="right"><b>Subtotal</b></td>
            <td class="right">
                <?php echo sprintf('$%.2f', $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right"><?php echo $state; ?> Tax</td>
            <td class="right">
                <?php echo sprintf('$%.2f', $tax); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right">Shipping</td>
            <td class="right">
                <?php echo sprintf('$%.2f', $shipping_cost); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right"><b>Total</b></td>
            <td class="right">
                <b><?php echo sprintf('$%.2f', $total); ?></b>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="right">
                <a class="btn btn-success" href="<?php echo '?action=payment'; ?>">Proceed To Payment</a>
            </td>
        </tr>
    </table>
</main>
<?php include '../view/footer.php'; ?>
