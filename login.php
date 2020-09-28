<?php


require_once 'core/init.php';

if(Input::exists()) {
    //checks if input fields are set

    if(Token::check(Input::get('token'))) {
        //checks if security token generated on the page matches the one being submitted

        //create rules for the fields being submitted on page
        $validate = new Validate();
        $validate->check($_POST, array(
            'email' => array('required' => true),
            'password' => array('required' => true)
        ));

        //log user in when validation passed
        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('email'), Input::get('password'), $remember);

            if($login) {

                //redirect to home page
                Redirect::to('index.php');
            } else {
                echo '<p>Incorrect email or password</p>';
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for='email'>Email</label>
        <input type="text" name="email" id="email">
    </div>

    <div class="field">
        <label for='password'>Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="remember">
            <input type="checkbox" name="remember" id="remember">Remember me
        </label>
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Login">
</form>

<div>
    <p>Don't have an account? </p> <a href="register.php">Create New Account</a>
</div>