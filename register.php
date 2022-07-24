<?php
require 'config/config.php';
include 'partials/header.php';
require 'config/register.config.php';
if (isset($_SESSION['user'])) {
    Header('Location: index.php');
}
?>

<div class="register_card card shadow mb-3">
    <div class="row g-0 align-items-center">
        <div class="col-md-4 align-self-stretch">
            <img src="assets/images/join_us.jpg" class="register_img rounded-start" alt="Join Us">
        </div>
        <div class="col-md-8 ">
            <div class="card-body align-items-center">
                <h3 class="card-title">Create an Account</h3>
                <form class=" mt-2" action="register.php" method="post">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First name</label>
                            <input type="text" class="form-control 
                            <?php if (isset($_POST['submit']) && count($error_array['fname']) == 0) {
                                echo 'is-valid';
                            } elseif (isset($_POST['submit']) && count($error_array['fname']) > 0) {
                                echo 'is-invalid';
                            } ?>" id="fname" name="reg_fname" value="<?php echo $_SESSION['reg_fname']; ?>" required>
                            <?php if (count($error_array['fname']) > 0) :  ?>
                                <?php foreach ($error_array['fname'] as $fname_error) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $fname_error; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="valid-feedback">
                                    Correct
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last name</label>
                            <input type="text" class="form-control 
                            <?php if (isset($_POST['submit']) && count($error_array['lname']) == 0) {
                                echo 'is-valid';
                            } elseif (isset($_POST['submit']) && count($error_array['lname']) > 0) {
                                echo 'is-invalid';
                            } ?>
                            " id="lname" name="reg_lname" value="<?php echo $_SESSION['reg_lname']; ?>" required>
                            <?php if (count($error_array['lname']) > 0) :  ?>
                                <?php foreach ($error_array['lname'] as $lname_error) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $lname_error; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="valid-feedback">
                                    Correct
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="email1" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control 
                                <?php if (isset($_POST['submit']) && count($error_array['email']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['email']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="email1" aria-describedby="inputGroupPrepend" name="reg_email1" value="<?php echo $_SESSION['reg_email1']; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="email2" class="form-label">Confirm Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control 
                                <?php if (isset($_POST['submit']) && count($error_array['email']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['email']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="email2" aria-describedby="inputGroupPrepend" name="reg_email2" value="<?php echo $_SESSION['reg_email2']; ?>" required>
                                <?php if (count($error_array['email']) > 0) :  ?>
                                    <?php foreach ($error_array['email'] as $email_error) : ?>
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
                            <ul class="list">
                                <li class="list-item"># Password must contain at least one lowercase character</li>
                                <li class="list-item"># Password must contain at least one uppercase character</li>
                                <li class="list-item"># Password must contain at least one digit</li>
                                <li class="list-item"># Password must contain at least one special character</li>
                                <li class="list-item"># Password must be between 8 to 30 characters</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <label title="Hello This Will Have Some Value" for="password1" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">&#128273;</span>
                                <input type="password" class="form-control password 
                                <?php if (isset($_POST['submit']) && count($error_array['password']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['password']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="password1" aria-describedby="inputGroupPrepend" name="reg_password1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password2" class="form-label">Confirm Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">&#128273;</span>
                                <input type="password" class="form-control 
                                <?php if (isset($_POST['submit']) && count($error_array['password']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['password']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="password2" aria-describedby="inputGroupPrepend" name="reg_password2"" required>
                                <?php if (count($error_array['password']) > 0) :  ?>
                                    <?php foreach ($error_array['password'] as $password_error) : ?>
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
                    <button class="btn btn-gradient" type="submit" name='submit'>Signup</button>
            </div>
            </form>
            <div class="card-footer">
                <small class="text-muted">Already have an Account?</small><a href="login.php" class="cta-sign"> Login</a>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('partials/footer.php'); ?>