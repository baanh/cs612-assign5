<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<main class="nofloat">
    <div class="row">
        <h3 class="text-secondary">Outstanding Orders</h3>
        <?php if (count($new_orders) > 0 ) : ?>
            <ul class="list-group" style="width:100%">
                <?php foreach($new_orders as $order) :
                    $order_id = $order['orderID'];
                    $order_date = strtotime($order['orderDate']);
                    $order_date = date('M j, Y', $order_date);
                    $url = $app_path . 'admin/orders' .
                           '?action=view_order&amp;order_id=' . $order_id;
                    ?>
                    <li class="list-group-item">
                        <a href="<?php echo $url; ?>">Order # 
                        <?php echo $order_id; ?></a> for
                        <?php echo $order['firstName'] . ' ' .
                                   $order['lastName']; ?> placed on
                        <?php echo $order_date; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>There are no shipped orders.</p>
        <?php endif; ?>
            <br><br>
        <h3 class="text-secondary" style="margin-top: 50px">Shipped Orders</h3>
        <?php if (count($old_orders) > 0 ) : ?>
            <ul class="list-group" style="width:100%">
                <?php foreach($old_orders as $order) :
                    $order_id = $order['orderID'];
                    $order_date = strtotime($order['orderDate']);
                    $order_date = date('M j, Y', $order_date);
                    $url = $app_path . 'admin/orders' .
                           '?action=view_order&amp;order_id=' . $order_id;
                    ?>
                    <li class="list-group-item">
                        <a href="<?php echo $url; ?>">Order #
                        <?php echo $order_id; ?></a> for
                        <?php echo htmlspecialchars($order['firstName']) . ' ' .
                                   htmlspecialchars($order['lastName']); ?> placed on
                        <?php echo $order_date; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>There are no shipped orders.</p>
        <?php endif; ?>
    </div>
</main>
<?php include 'view/footer.php'; ?>