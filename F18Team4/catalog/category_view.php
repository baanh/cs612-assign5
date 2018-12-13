<?php include '../view/header.php'; ?>
<?php include '../view/navigationbar.php'; ?>
<?php include '../view/sidebar.php'; ?>
<main class="nofloat">
    <h3 class="text-secondary"><?php echo htmlspecialchars($category_name); ?></h3>
    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        <div class="list-group">
        <?php foreach ($products as $product) : ?>
        <p>
            <a href="<?php echo '?product_id=' . $product['productID']; ?>" class="list-group-item list-group-item-action">
                <?php echo htmlspecialchars($product['productName']); ?>
            </a>
        </p>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>