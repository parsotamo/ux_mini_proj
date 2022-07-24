<?php
// importing configurations and partials
require 'config/config.php';
require 'config/login.config.php';
include('partials/header.php');
?>
<main class="login_card card shadow mb-3">
    <div class="row g-0">
        <div class="col-12 ">
            <div class="">
                <img src="assets/images/welcome.jpg" class="login_img rounded-top" alt="Welcome">
            </div>
            <div class="card-body align-items-center">
                <form class=" mt-2" action="login.php" method="post">
                    <div class="row g-2">

                        <div class="col-12">
                            <label for="email2" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control 
                                <?php
                                // checking if form was submitted and if there are erros in the error array
                                if (isset($_POST['submit']) && count($error_array) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="email" aria-describedby="inputGroupPrepend" name="login_email" value="<?php echo $_SESSION['login_email']; ?>" required>
                                <?php if (count($error_array) > 0) :  ?>
                                    <?php foreach ($error_array as $email_error) : ?>
                                        <div class="invalid-feedback">
                                            <?php echo $email_error; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="valid-feedback">
                                        Correct
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">&#128273;</span>
                                <input type="password" class="form-control 
                                <?php
                                // checking if form was submitted and if there are erros in the error array
                                if (isset($_POST['submit']) && count($error_array) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="password" aria-describedby="inputGroupPrepend" name="login_password" required>
                                <?php if (count($error_array) > 0) :  ?>
                                    <?php foreach ($error_array as $password_error) : ?>
                                        <div class=" invalid-feedback">
                                            <?php echo $password_error; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="valid-feedback">
                                        Correct
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button class="btn btn-gradient" type="submit" name='submit'>Login</button>
                        <div class="card-footer">
                            <small class="text-muted">Don't have an account yet?</small><a href="register.php" class="cta-sign"> Signup</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('partials/footer.php'); ?>