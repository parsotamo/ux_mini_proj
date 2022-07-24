<?php
require 'config/config.php';
include('partials/header.php');
if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    Header('Location: index.php');
}
?>
<div class="container">
    <div class="row mx-auto mt-5">
        <div class="col-6">
            <form action="logout.php" method="post">
                <h3>Tem certeza que deseja sair? </h3>
                <button name="logout" type="submit" class="btn btn-secondary">Sair</button>
            </form>
        </div>
    </div>
</div>

<?php
include('partials/footer.php');
?>