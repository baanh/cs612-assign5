<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<main class="nofloat">
    <?php if (count($products) == 0) : ?>
        <p>There are no products for this category.</p>
    <?php else : ?>

        <div class="list-group">
            <h3 class="text-secondary">
                Product Manager - <?php echo htmlspecialchars($current_category['categoryName']); ?>
            </h3>
            <p>To view, edit, or delete a product, select the product.</p>
            <p>To add a product, select the "Add Product" link.</p>
            <?php foreach ($products as $product) : ?>
                <p>
                    <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>" class="list-group-item list-group-item-action">
                       <?php echo htmlspecialchars($product['productName']); ?>
                    </a>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>

        <h3 class="text-secondary">Links</h3>
        <p><a href="index.php?action=show_add_edit_form" class="list-group-item list-group-item-action">Add Product</a></p>
    </div>
</main>
<?php include '../../view/footer.php'; ?>