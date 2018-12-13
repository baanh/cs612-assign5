<?php
require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('../util/valid_admin.php');
include 'view/header.php';
?>

<main>

    <div class="container">
        <div class="row">
            <div class="col-" align="left">
                <?php include 'view/sidebar_admin.php'; ?>
            </div>
            <div class="col-">
                <h1>Admin Menu</h1>
                <p><a href="product">Product Manager</a></p>
                <p><a href="category">Category Manager</a></p>
                <p><a href="orders">Order Manager</a></p>
                <p><a href="account">Account Manager</a></p>
            </div>

        </div>
    </div>


</main>

<?php include 'view/footer.php'; ?>
