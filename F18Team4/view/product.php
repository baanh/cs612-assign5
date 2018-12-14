<?php
// Parse data
$category_id = $product['categoryID'];
$product_code = $product['productCode'];
$product_name = $product['productName'];
$description = $product['description'];
$list_price = $product['listPrice'];
$discount_percent = $product['discountPercent'];

// Add HMTL tags to the description
$description_with_tags = add_tags($description);

// Calculate discounts
$discount_amount = round($list_price * ($discount_percent / 100), 2);
$unit_price = $list_price - $discount_amount;

// Format discounts
$discount_percent_f = number_format($discount_percent, 0);
$discount_amount_f = number_format($discount_amount, 2);
$unit_price_f = number_format($unit_price, 2);

// Get image URL and alternate text
$image_filename = $product_code . '_m.png';
$image_path = $app_path . 'images/' . $image_filename;
$image_alt = 'Image filename: ' . $image_filename;

if (!isset($product_order_count)) { $product_order_count = 0; }
?>

<div class="row">
    <div class="col-sm-4">
        <p class="text-center"><img src="<?php echo $image_path; ?>"
                                    alt="<?php echo $image_alt; ?>" /></p>
            <?php if (isset($_SESSION['admin'])): ?>
            <div id="edit_and_delete_buttons" class="text-center">
                <form action="." method="post" id="edit_button_form" >
                    <input type="hidden" name="action" value="show_add_edit_form">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" class="btn btn-info" value="Edit Product">
                </form>
                <?php if ($product_order_count == 0) : ?>
                    <form action="." method="post" id="delete_button_form" >
                        <input type="hidden" name="action" value="delete_product">
                        <input type="hidden" name="product_id"
                               value="<?php echo $product['productID']; ?>">
                        <input type="hidden" name="category_id"
                               value="<?php echo $product['categoryID']; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete Product">
                    </form>
                <?php endif; ?>
            </div>

            <div id="image_manager" class="text-center">
                <form action="." method="post" enctype="multipart/form-data" id="upload_image_form">
                    <input type="hidden" name="action" value="upload_image">
                    <input type="file" class="btn btn-light" name="file1" style="width: 200px">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="submit" class="btn btn-light" value="Upload Image">
                </form>
                <p><a href="../../images/<?php echo $product['productCode']; ?>.png">
                        View large image</a></p>
                <p><a href="../../images/<?php echo $product['productCode']; ?>_s.png">
                        View small image</a></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-sm-8">
        <h3 class="text-secondary"><?php echo htmlspecialchars($product_name); ?></h3>
        <p><b>List Price:</b>
            <?php echo '$' . $list_price; ?></p>
        <p><b>Discount:</b>
            <?php echo $discount_percent_f . '%'; ?></p>
        <p><b>Your Price:</b>
            <?php echo '$' . $unit_price_f; ?>
            (You save
            <?php echo '$' . $discount_amount_f; ?>)</p>
        <b>Quantity:</b>&nbsp;
        <form class="form-inline" action="<?php echo $app_path . 'cart' ?>" method="get" 
              id="add_to_cart_form">
            <input type="hidden" name="action" value="add" />
            <input type="hidden" name="product_id"
                   value="<?php echo $product_id; ?>" />

            <div class="form-group">
                <!-- <input type="text" class="form-control" id="quantityInput" name="quantity" value="1" size="2"> -->
                <select class="form-control" name="quantity" value="1" width="75px">
                    <?php
                    for ($i = 1; $i <= 100; $i++) {
                        echo "<option>$i</option>";
                    }
                    ?>
                </select>
            </div>
            &nbsp;<input type="submit" class="btn btn-warning" value="Add to Cart" />
        </form>
        <br>
        <h3 class="text-secondary">Description</h3>
        <?php echo $description_with_tags; ?>
    </div>
</div>