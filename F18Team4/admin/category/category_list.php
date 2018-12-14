<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<main class="nofloat">
    <div class="row">
        <h3 class="text-secondary">Category Manager</h3>
        <table class="table">
            <?php foreach ($categories as $category) : ?>
                <tr>
                <form action="." method="post">
                    <td>
                        <input type="text" name="name" class="form-control"
                               value="<?php echo htmlspecialchars($category['categoryName']); ?>">
                    </td>
                    <td>
                        <input type="hidden" name="action" value="update_category">
                        <input type="hidden" name="category_id"
                               value="<?php echo $category['categoryID']; ?>">
                        <input type="submit" class="btn btn-info" value="Update">
                    </td>
                </form>
                <td>
                    <?php if ($category['productCount'] == 0) : ?>
                        <form action="." method="post" >
                            <input type="hidden" name="action" value="delete_category">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $category['categoryID']; ?>">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    <?php endif; ?>
                </td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <form action="." method="post" id="add_category_form" >
                        <td>
                            <input type="hidden" name="action" value="add_category">
                            <input type="text" name="name" class="form-control" placeholder="New Category">
                        </td>
                        <td><input type="submit" class="btn btn-warning" value="Add"></td>
                    </form>
                </tr>
        </table>
    </div>
</main>
<?php include 'view/footer.php'; ?>