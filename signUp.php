<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/signUp.css">
    <title>Sing Up</title>
</head>
<body>
    <?php
        require('./connection.php');
        if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {  
            if ($password === $confirmPassword) {  
                // Hash the password  
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  
                $p = crud::connect()->prepare('INSERT INTO tbl_crudform(firstName,lastName,email,pw) VALUES(:f,:l,:e,:p)');  
                $p->bindValue(':f', $firstName);  
                $p->bindValue(':l', $lastName);  
                $p->bindValue(':e', $email);  
                $p->bindValue(':p', $hashedPassword);  
                $p->execute();  
                echo 'Successfully registered';  
            } else {  
                echo 'Passwords do not match';  
            }  
        } else {  
            echo 'All fields are required';  
        }  
    ?>
    <div class="form">
        <div class="title">
            <p>Sign Up</p>
        </div>
        <form action="" method="post" >
            <input type="text" name="firstName" id="" placeholder="Frist name">
            <input type="text" name="lastName" id="" placeholder="Last name">
            <input type="text" name="email" id="" placeholder="Email">
            <input type="text" name="password" id="" placeholder="Password">
            <input type="text" name="confirmPassword" id="" placeholder="Confirm password">
            <input type="submit" value="Sign Up" name="btnSignUp">
        </form>
    </div>
</body>
</html>