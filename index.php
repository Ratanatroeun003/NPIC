
<?php
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
$available_page = ['login', 'register'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (in_array($page, $available_page)) {
        include 'pages/' . $page . '.php';
    } else {
        echo '<h1>Page not found(404)</h1/';
    }
} else {
    echo '<h1>Page not found(404)</h1/';
}
include 'includes/footer.inc.php';
