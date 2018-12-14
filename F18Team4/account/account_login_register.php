<?php include '../view/header.php'; ?>
<main>

    <form action="." method="post" id="login_form" style="width:30%;margin:auto">
        <h3 class="text-secondary">Login</h3>
        <input type="hidden" name="action" value="login">

        <div class="form-group">
            <label for="inputEmail" style="width:100%"><b>Email (Must be a valid one)</b></label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            <?php echo $fields->getField('email')->getHTML(); ?>
        </div>
        <div class="form-group">
            <label for="inputPassword"><b>Password</b></label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            <?php echo $fields->getField('password')->getHTML(); ?>
        </div>

        <input type="submit" class="btn btn-warning btn-block" value="Login">
        <?php if (!empty($password_message)) : ?>         
            <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
        <?php endif; ?>
    </form>
    <br>
    <form action="." method="post" style="width:30%;margin:auto">
        <input type="hidden" name="action" value="view_register">
        <input type="submit" class="btn btn-light btn-block" value="Register">
    </form>
</main>
<?php include '../view/footer.php'; ?>
