<?php
function usernameExists($username)
{
    global $db;
    $query  = $db->prepare('select * from tbl_users where username = ?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return true;
    }
    return false;
}
function registerUser($name, $username, $passwd)
{
    if (usernameExists($username)) {
        return false;
    }
    global $db;
    $query = $db->prepare('insert into tbl_users (name,username,password) values (?,?,?)');
    $query->bind_param('sss', $name, $username, $passwd);
    $query->execute();
    if ($db->affected_rows) {
        return true;
    }

    return false;
}
function logUserIn($username, $passwd)
{
    global $db;
    $query = $db->prepare('select * from tbl_users where username = ? and password= ?');
    $query->bind_param('ss', $username, $passwd);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_object();
    }
    return false;
}
function loggedInuUser()
{
    global $db;

    if (!isset($_SESSION['user_id'])) {
        return null;
    }

    $user_id = $_SESSION['user_id'];

    $query = $db->prepare('SELECT * FROM tbl_users WHERE id = ?');
    $query->bind_param('i', $user_id);
    $query->execute();

    $result = $query->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_object();
    }
    return null;
}
