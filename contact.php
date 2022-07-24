<?php
require 'config/config.php';
require 'config/contact.config.php';
include('partials/header.php');
if (!isset($_SESSION['user'])) {
    Header('Location: login.php');
}

?>
<section class="contact-card shadow">
    <form action="contact.php" method="post">
        <div class="row">
            <div class="card-body align-items-center">
                <h3 class="card-title">Contact</h3>
                <form class=" mt-2" action="contact.php" method="post">
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control 
                            <?php if (isset($_POST['submit']) && count($error_array['name']) == 0) {
                                echo 'is-valid';
                            } elseif (isset($_POST['submit']) && count($error_array['name']) > 0) {
                                echo 'is-invalid';
                            } ?>" id="name" name="ctc_name" value="<?php echo $_SESSION['ctc_name']; ?>" required>
                            <?php if (count($error_array['name']) > 0) :  ?>
                                <?php foreach ($error_array['name'] as $name_error) : ?>
                                    <div class="invalid-feedback">
                                        <?php echo $name_error; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="valid-feedback">
                                    Correct
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control 
                                <?php if (isset($_POST['submit']) && count($error_array['email']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['email']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                " id="email" aria-describedby="inputGroupPrepend" name="ctc_email" value="<?php echo $_SESSION['ctc_email']; ?>" required>
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
                            <label for="message" class="form-label">Message</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">&#9998;</span>
                                <textarea class="form-control <?php if (isset($_POST['submit']) && count($error_array['message']) == 0) {
                                                                    echo 'is-valid';
                                                                } elseif (isset($_POST['submit']) && count($error_array['message']) > 0) {
                                                                    echo 'is-invalid';
                                                                } ?>" value="<?php echo $_SESSION['ctc_message']; ?>" name="ctc_message" id="message" cols="5" rows="7" required></textarea>
                                <?php if (isset($_POST['submit']) && count($error_array['message']) == 0) {
                                    echo 'is-valid';
                                } elseif (isset($_POST['submit']) && count($error_array['message']) > 0) {
                                    echo 'is-invalid';
                                } ?>
                                <?php if (count($error_array['message']) > 0) :  ?>
                                    <?php foreach ($error_array['message'] as $message_error) : ?>
                                        <div class=" invalid-feedback">
                                            <?php echo $message_error; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="valid-feedback">
                                        Correct
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <button class="btn btn-gradient" type="submit" name="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </form>
</section>

<?php include('partials/footer.php'); ?>