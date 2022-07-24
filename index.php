<?php
require 'config/config.php';
include('partials/header.php');
require 'config/index.config.php';
if (!isset($_SESSION['user'])) {
    Header('Location: login.php');
}
?>
<div class="row justify-content-center mt-5">
    <div class="col-lg-5 col-md-8 col-sm-9 col-10">
        <h3 class="primary-text"><?php echo $numMsg; ?></h3>
        <?php if ($num_rows > 0) : ?>
            <?php while ($msg = mysqli_fetch_array($query)) : ?>
                <?php
                ?>
                <div class="card bg-light message-card
                 mb-3">
                    <div class="card-header">To: <?php echo $msg['email'] ?></div>
                    <div class="card-body">
                        <p class="card-text  messsage-text"><?php echo $msg['message']; ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <small>
                            From: <?php echo $msg['name']; ?>
                        </small>
                        <small class="text-muted post-date"><?php echo $msg['created_at'] ?></small>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php
    include('partials/footer.php');
    ?>