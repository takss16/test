<!-- arrays -->
<?php 
    $userTypes = ["Admin", "Instructor", "Student"];
    $users = [
        [
            "userType" => "Admin",
            "userName" => "admin",
            "password" => "admin123"

        ],
        [
            "userType" => "Instructor",
            "userName" => "dale",
            "password" => "pogi123"

        ],
    ];

    if(isset($_POST['btnLogIn'])){
        $typeOfUser = $_POST['typeOfUser'];
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        
        $isValid = False;

        if(isset($users)){
            foreach($users as $key => $user){
                if(($user['userType'] == $typeOfUser) and ($user['userName'] == $userName) and ($user['password'] == $password)){
                    $isValid = true;
                    break;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaticLogIn</title>
    
<body>
    <?php
        if(isset($_POST['btnLogIn'])){
            $alertSuccess = 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">'."
                    Welcome to the system $userName".'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

            $alertInvaid = 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid UserName/Password
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

            if($isValid == true){
                echo $alertSuccess;
            }
            else{
                echo $alertInvaid;
            }
        }
    ?>

    <div class="container">
        <form method="post" class ="centerAlignment">
            <div class="img-container">
                <i class="fas fa-user"></i>
            </div>

            <div class="user">
                <select name="typeOfUser" class="typeOfUser">
                    <?php 
                        foreach ($userTypes as $userType){
                            echo '<option value="'.$userType.'">'. $userType .'</option>';
                        }
                    ?>
                </select><br>
                <label for="userName">UserName</label>
                <input type="text" name="userName" class="userName" placeholder=" Username"><br>
                
                <input type="password" name="password" class="password" placeholder="Password"><br>

                <button type="submit" name="btnLogIn" class="btnLogIn">Log In</button><b

            </div>
        </form>
    </div>


</body>
</html>