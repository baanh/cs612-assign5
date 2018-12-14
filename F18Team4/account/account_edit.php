<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<main class="nofloat">
    <div id="edit_account_form">
        <form action="." method="post">
            <h3 class="text-secondary">Edit Account</h3>
            <input type="hidden" name="action" value="update_account">
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" 
                           value="<?php echo htmlspecialchars($email); ?>" class="form-control" id="inputEmail" placeholder="Email">
                           <?php echo $fields->getField('email')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" name="first_name" 
                           value="<?php echo htmlspecialchars($first_name); ?>" class="form-control" id="inputFirstName" placeholder="First Name">
                           <?php echo $fields->getField('first_name')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name="last_name" 
                           value="<?php echo htmlspecialchars($last_name); ?>" class="form-control" id="inputLastName" placeholder="Last Name">
                           <?php echo $fields->getField('last_name')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_1" class="form-control" id="inputNewPassword" placeholder="Password">
                    <?php echo $fields->getField('password_1')->getHTML(); ?>
                    <span class="error"><?php echo $password_message; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputRetypePassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_2" class="form-control" id="inputRetypePassword" placeholder="Retype Password">
                    <?php echo $fields->getField('password_2')->getHTML(); ?>
                </div>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-info" value="Update Account"><br>
            </div>
        </form>
        <form action="." method="post">
            <input type="submit" class="btn btn-light" value="Cancel">
        </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>
