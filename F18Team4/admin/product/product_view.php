<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<?php if (!isset($product_order_count)) { $product_order_count = 0; } ?>
<main class="nofloat">
    <h3 class="text-center text-primary">Product Manager - View Product</h3>
    
    <!-- display product -->
    <?php include '../../view/product.php'; ?>
</main>
<?php include '../../view/footer.php'; ?>