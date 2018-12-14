<?php include '../view/header.php'; ?>
<main>
    <h3 class="text-secondary">Your Cart</h3>

    <?php if (cart_product_count() == 0) : ?>
        <p>There are no products in your cart.</p>

    <?php else: ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="update">
            <table id="cart" class="table">
                <thead>
                    <tr>
                        <th class="left" scope="col">Item</th>
                        <th class="right" scope="col">Price</th>
                        <th class="right" scope="col">Quantity</th>
                        <th class="right" scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $product_id => $item) : ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($item['name']); ?>
                                <br><a href="?action=remove&product=<?php echo $product_id ?>">Remove</a>
                            </td>
                            <td class="right">
                                <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                            </td>
                            <td class="right">
                                <select  
                                    name="items[<?php echo $product_id; ?>]" 
                                    value="<?php echo $item['quantity']; ?>">
                                        <?php
                                        for ($i = 1; $i <= 100; $i++) {
                                            if ($i == $item['quantity']) {
                                                echo "<option selected='selected'>$i</option>";
                                            } else {
                                                echo "<option>$i</option>";
                                            }
                                        }
                                        ?>
                                </select>
                            </td>
                            <td class="right">
                                <?php echo sprintf('$%.2f', $item['line_price']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="right" ><b>Subtotal</b></td>
                        <td class="right">
                            <b><?php echo sprintf('$%.2f', cart_subtotal()); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="left">
                            <!-- display most recent category -->
                            <?php
                            if (isset($_SESSION['last_category_id'])) :
                                $category_url = '../catalog' .
                                        '?category_id=' . $_SESSION['last_category_id'];
                                ?>
                                <a class="btn btn-dark" href="<?php echo $category_url; ?>">Back To Shopping</a>
                            <?php endif; ?>
                        </td>
                        <td colspan="2" class="right">
                            <input type="submit" class="btn btn-warning" value="Update Cart">
                            <!-- if cart has items, display the Checkout link -->
                            <?php if (cart_product_count() > 0) : ?>
                                <a href="../checkout" class="btn btn-info">Proceed To Checkout</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>