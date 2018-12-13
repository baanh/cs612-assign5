
<div align="center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo $app_path; ?>">Home</a>
        </li>
        
        <?php
        require_once('model/database.php');
        require_once('model/category_db.php');

        $categories = get_categories();
        foreach ($categories as $category) :
            $name = $category['categoryName'];
            $id = $category['categoryID'];  
            $url = $app_path . 'catalog?category_id=' . $id;
            ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url; ?>">
                    <?php echo htmlspecialchars($name); ?>
                </a>
            </li>
        <?php endforeach; ?>
        

<aside>
    <h5>Links</h5>
    <ul>
        <li>

        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Logout</a>
        <?php else: ?>
            <a href="<?php echo $account_url; ?>">Login</a>
        <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>
    </ul>
    
    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <h5>Categories</h5>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo $app_path .
                'admin/product?action=list_products' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <!-- <h2>Temp Link</h2>
    <ul>
        <li>
            This link is for testing only.
                 Remove it from a production application
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>        
    </ul> -->


</div>

</aside>

