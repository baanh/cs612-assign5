<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<script src='../../js/validation.js'></script>
<main class="nofloat">
    <?php
    if (isset($product_id)) {
        $heading_text = 'Edit Product';
    } else {
        $heading_text = 'Add Product';
    }
    ?>
    <div class="row">
        <form action="index.php" method="post" id="add_product_form" onsubmit="return validate(this)">
            <h3 class="text-secondary">Product Manager - <?php echo $heading_text; ?></h3>
            <?php if (isset($product_id)) : ?>
                <input type="hidden" name="action" value="update_product">
                <input type="hidden" name="product_id"
                       value="<?php echo $product_id; ?>">
                   <?php else: ?>
                <input type="hidden" name="action" value="add_product">
            <?php endif; ?>
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>">
            <div class="form-group row">
                <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
                <div class="col-sm-6">
                    <select name="category_id" class="form-control" id="inputCategory">
                        <?php
                        foreach ($categories as $category) :
                            if ($category['categoryID'] == $product['categoryID']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $category['categoryID']; ?>"<?php echo $selected ?>>
                                <?php echo htmlspecialchars($category['categoryName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCode" class="col-sm-4 col-form-label">Code</label>
                <div class="col-sm-6">
                    <input type="text" name="code" 
                           value="<?php echo htmlspecialchars($product['productCode']); ?>" class="form-control" id="inputCode" placeholder="Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" 
                           value="<?php echo htmlspecialchars($product['productName']); ?>" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputListPrice" class="col-sm-4 col-form-label">List Price</label>
                <div class="col-sm-6">
                    <input type="text" name="price" 
                           value="<?php echo $product['listPrice']; ?>" class="form-control" id="inputListPrice" placeholder="List Price">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDiscount" class="col-sm-4 col-form-label">Discount Percent</label>
                <div class="col-sm-6">
                    <input type="text" name="discount_percent" 
                           value="<?php echo $product['discountPercent']; ?>" class="form-control" id="inputDiscount" placeholder="Discount Percent">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDescription" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" rows="10" cols="70" class="form-control" id="inputDescription">
                        <?php echo $product['description']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8"><input type="submit" class="btn btn-info" value="Save Changes"></div>
            </div>
        </form>
        <div id="formatting_directions">
            <h3 class="text-secondary">How to work with the description</h3>
            <ul>
                <li>Use two returns to start a new paragraph.</li>
                <li>Use an asterisk to mark items in a bulleted list.</li>
                <li>Use one return between items in a bulleted list.</li>
                <li>Use standard HMTL tags for bold and italics.</li>
            </ul>
        </div>
    </div>
</main>
<?php include '../../view/footer.php'; ?>