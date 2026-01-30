<?php
if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
}
header("location: ./?page=login");
exit;
