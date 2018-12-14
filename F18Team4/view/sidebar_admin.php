<aside>
    <ul class="list-group list-group-flush">
        <li class="list-group-item btn-light active"><b>Administration</b></li>
        <?php if (isset($_SESSION['admin'])) : ?>
            <li class="list-group-item btn-light"><a style="color:black;text-decoration:none" href="<?php echo $app_path ?>admin/product">Product Manager</a></li>
            <li class="list-group-item btn-light"><a style="color:black;text-decoration:none" href="<?php echo $app_path ?>admin/category">Category Manager</a></li>
            <li class="list-group-item btn-light"><a style="color:black;text-decoration:none" href="<?php echo $app_path ?>admin/orders">Order Manager</a></li>
            <li class="list-group-item btn-light"><a style="color:black;text-decoration:none" href="<?php echo $app_path ?>admin/account">Account Manager</a></li>
        <?php endif; ?>
        <li class="list-group-item btn-light">
            <?php
            // Check if user is logged in and
            // display appropriate account links
            $account_url = $app_path . 'admin/account';
            $logout_url = $account_url . '?action=logout';
            if (isset($_SESSION['admin'])) :
                ?>
                <a style="color:black;text-decoration:none" href="<?php echo $logout_url; ?>">Logout</a>
            <?php else: ?>
                <a style="color:black;text-decoration:none" href="<?php echo $account_url; ?>">Admin Login</a>
            <?php endif; ?>
        </li>
    </ul>
</aside>
