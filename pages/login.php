<?php
$username = '';
$usernameErr = $passwdErr = '';
if (isset($_POST['username'], $_POST['passwd'])) {
    $username = trim($_POST['username']);
    $passwd = trim($_POST['passwd']);
    if (empty($passwd)) {
        $passwdErr = 'Please input password';
    }
    if (empty($username)) {
        $usernameErr = 'Please input username';
    }
    if (empty($usernameErr) &&  empty($passwdErr)) {
        $user =  logUserIn($username, $passwd);
        if ($user !== false) {
            header('Location: ./?page=dashboard');
        } else {
            echo '<div class = "alert alert-danger" role = "alert">Login Fail</div?';
        }
    }
}
?>
<form class="col-lg-6 col-xs-8 col-md-8 mx-auto p-2" method="post" action="./?page=login">
    <h3>Login</h3>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control <?php echo empty($usernameErr) ? '' : 'is-invalid' ?>">
        <div class="invalid-feedback"><?php echo $usernameErr ?></div>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="passwd" type="password" class="form-control <?php echo empty($passwdErr) ? '' : 'is-invalid' ?>">
        <div class="invalid-feedback"><?php echo $passwdErr ?></div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>