<?php include 'view/header.php'; ?>
<?php include 'view/navigationbar.php'; ?>
<main class="nofloat">
    <h3 class="text-secondary">Featured products</h3>
    <p>A great selection of musical instruments including
        guitars, basses, and drums</p>

    <div class="card-deck">
        <?php
        foreach ($products as $product) :
            // Get product data
            $list_price = $product['listPrice'];
            $discount_percent = $product['discountPercent'];
            $description = $product['description'];

            // Calculate unit price
            $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
            $unit_price = $list_price - $discount_amount;

            // Get first paragraph of description
            $description_with_tags = add_tags($description);
            $i = strpos($description_with_tags, "</p>");
            $first_paragraph = substr($description_with_tags, 3, $i - 3);
            ?>

            <div class="card" >
                <img class="card-img-top" style="height: 300px; width: auto; margin: auto" 
                     src="images/<?php echo htmlspecialchars($product['productCode']); ?>_m.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <p>$<?php echo number_format($unit_price, 2); ?></p>
                        <a style="color:black" href="catalog?product_id=<?php echo $product['productID']; ?>">
                            <?php echo htmlspecialchars($product['productName']); ?>
                        </a>
                    </h5>
                    <!-- <p class="card-text"><?php echo $first_paragraph; ?></p> -->
                </div>
                <div class="card-footer text-center">
                    <a href="<?php echo $app_path . 'cart' ?>?action=add&product_id=<?php echo $product['productID']; ?>&quantity=1" 
                       class="btn btn-warning btn-block">Add to cart</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>
<?php include 'view/footer.php'; ?>