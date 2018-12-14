<?php
require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('../util/valid_admin.php');
include 'view/header.php';
include 'view/sidebar_admin.php';
?>

<main class="nofloat">
    <h3 class="text-secondary">Admin Menu</h3>
    <div class="list-group">
        <p><a href="product" class="list-group-item list-group-item-action">Product Manager</a></p>
        <p><a href="category" class="list-group-item list-group-item-action">Category Manager</a></p>
        <p><a href="orders" class="list-group-item list-group-item-action">Order Manager</a></p>
        <p><a href="account" class="list-group-item list-group-item-action">Account Manager</a></p>
    </div>
</main>

<?php include 'view/footer.php'; ?>
