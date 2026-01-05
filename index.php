
<?php
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include 'pages/' . $page . '.php';
}
include 'includes/footer.inc.php';
