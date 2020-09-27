<?php


require_once 'core/init.php';

if(!$user_id = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($user_id);

    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>

        <h3>Name: <?php echo escape($data->name); ?></h3>
        <p>Email: <?php echo escape($data->email); ?></p>
        <p>Last name: <?php echo escape($data->last_name); ?></p>
        <p>Phone: <?php echo escape($data->phone); ?></p>
        <p>Registered at: <?php echo escape($data->registered_at); ?></p>


        <ul>
            <li><a href="logout.php">Log out</a></li>
        </ul>
<?php
    }
}