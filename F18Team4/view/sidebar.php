<aside>
    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <ul class="list-group list-group-flush">
        <li class="list-group-item btn-light active"><b>Browse Categories</b></li>
        <?php foreach ($categories as $category) : ?>
        <li class="list-group-item btn-light">
            <a style="color:black;text-decoration:none" href="<?php echo $app_path .
                'catalog?action=list_products' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</aside>

