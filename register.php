<?php

//include a php file
require_once 'core/init.php';

// check sent data
if (Input::exists()) {
    //check if input fields are set

    if(Token::check(Input::get('token'))) {
        // security check ensuring the token being submitted is the same as the one generated on the page
        $validate = new Validate();

        //checks the written rules
         $validate->check($_POST, array(
            'email' => array(
                'email' => 'Email',
                'required' => true,
                'max' => 254
            ),
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'users'
            ),
            'last_name' => array(
                'name' => 'last_name',
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'users'
            ),
            'phone' => array(
                'name' => 'Phone',
                'required' => true,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 8
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
        ));

        //When validate is passed, create new user
        if ($validate->passed()) {
            $user = new User();

            try {
                // Create a new user and inserting entries in users table.
                $user->create(array(
                    'email' => Input::get('email'),
                    'name' => Input::get('name'),
                    'last_name' => Input::get('last_name'),
                    'phone' => Input::get('phone'),
                    'password' => Hash::make(Input::get('password')),
                    'registered_at' => date('Y-m-d H:i:s'),
                    'last_login_at' => date('Y-m-d H:i:s')
                ));

                // display the success message when account is created (once)
                Session::flash('home', 'Welcome ' . Input::get('name') . '! Your account has been registered. You may now log in.');
                //redirect to homepage
                Redirect::to('index.php');
                //when catch an error,shows it
            } catch(Exception $e) {
                $_error = false;
                echo $_error, '<br>';
            }
        } else {
            //displays error if any should occur.
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}
//function check valid email
function validEmail($email){
    // Check the formatting is correct
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    return FALSE;
    }
    
    // Next check the domain is real.
    $domain = explode("@", $email, 2);
    return checkdnsrr($domain[1]); // returns TRUE/FALSE;
    }
    
    // Example
    validEmail('vardas@domenas.com'); // Returns TRUE
    validEmail('fake@fakedomenas.com'); // Returns FALSE

?>

<form action="" method="post">
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" pattern="[a-z._%+-].+@domenas.com" value="<?php echo escape(Input::get('email')); ?>" id="email">
    </div>

    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">
    </div>

    <div class="field">
        <label for="lastname">Last name</label>
        <input type="text" name="last_name" id="lastname" value="<?php echo escape(Input::get('last_name')); ?>">
    </div>

    <div class="field">
        <label for="phone">Phone number</label>
        <input type="tel" name="phone" id="phone" value="<?php echo escape(Input::get('phone')); ?>">
    </div>

    <div class="field">
        <label for="password">Choose a password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="password_again">Enter your password again</label>
        <input type="password" name="password_again" id="password_again" value="">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register">
</form>