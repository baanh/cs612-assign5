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
        
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['user'])) :
            ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo $account_url; ?>">My Account</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo $logout_url; ?>">Logout</a>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link btn-primary" href="<?php echo $account_url; ?>">Login</a></li>
        <?php endif; ?>
            
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $app_path . 'cart'; ?>"><img src="<?php echo $app_path . 'images/cart-2x.png'?>">Cart</a>
        </li>
    </ul>

    <!-- <h2>Temp Link</h2>
    <ul>
        <li>
            This link is for testing only.
                 Remove it from a production application
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>        
    </ul> -->

</div>
