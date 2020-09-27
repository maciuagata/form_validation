<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current
$data = $user->data();
if($user->isLoggedIn()) {
?>

        <p>Hello, <?php echo escape($data->name); ?></p>
    <p>Your user id and your profile : <a href="profile.php?user=<?php echo escape($user->data()->user_id);?>"><?php echo escape($user->data()->user_id); ?></a></p>

    <ul>
        <li><a href="logout.php">Log out</a></li>
    </ul>
<?php
}else {

    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register.</a></p>';
}
