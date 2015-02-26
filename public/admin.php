<?php
require_once("../includes/session.php");
require_once("../includes/functions.php");
?>


<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>


<h2>Admin Menu</h2>
    <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>



<?php
include("../includes/layout/footer.php");
?>