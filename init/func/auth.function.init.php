<?php
function usernameExists($username)
{
    global $db;
    $query  = $db->prepare('select * from tbl_user where username = ?');
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
    $query = $db->prepare('insert into tbl_user (name,username,password) values (?,?,?)');
    $query->bind_param('sss', $name, $username, $passwd);
    $query->execute();
    if ($db->affected_rows) {
        return true;
    }

    return false;
}
