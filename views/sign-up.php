<?php
require_once '../includes/config.php';
require_once '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../includes/layouts/header.php' ?>
<body>
<main role="main">
    <section class="section-signs">
        <div class="container">
            <form class="form-signs" action="<?= URLROOT ?>/src/accounts-sign-up.php" method="POST">
                <img src="<?= URLROOT ?>/assets/img/asrilzaw.png" height="100" class="mx-auto" alt="..." loading="lazy">
                <h3>Please Sign Up</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Retype Password" name="retype_password" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
            </form>
        </div>
    </section>
</main>
<?php require_once '../includes/layouts/scripts.php'; ?>
</body>
</html>
