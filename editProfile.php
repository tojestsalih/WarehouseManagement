<?php
require_once './php/config/Logic.php';

$logic = new Logic();
if (!isset($_SESSION["isLogged"]) || !$_SESSION["isLogged"] || !$_SESSION["user"]) {
    header("Location: http://localhost/WarehouseManagement/index.php");
}
$user = [$_SESSION['user']][0];


//$user = $_SESSION["user"];
//print_r($user);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" href ="css/bootstrap.min.css"/>
        <script src="js/bootstrap.bundle.min.js"></script>
        
        <title>Edit Profile</title>
    </head>
    <body>
        <div class="container">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="http://localhost/WarehouseManagement/warehouse_tables.php">Warehouse Management</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">







                        </ul>
                        <div class="d-flex">


                            <a href="addProduct.php"> 
                                <button class="btn btn-sm btn-outline-success me-2"  type="button">Add Product</button>
                            </a>
                            <a href="addCategory.php"> 
                                <button class="btn btn-sm btn-outline-success me-2"  type="button">Add Category</button>
                            </a>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $user->name; ?>
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu" position="relative" aria-labelledby="navbarDropdown">
                                    <form action = 'editProfile.php' method = "get" >
                                        <li>
                                            <input class="dropdown-item" type="hidden" name ="profile-email" value ="<?php echo $user->email ?>"/>
                                            <button class="dropdown-item" type='submit' name='edit-profile'>Edit</button>
                                        </li>
                                    </form>
                                    <li><hr class="dropdown-divider"></li>
                                    <form method="get"><li><input class="dropdown-item" type ="submit" name = "logout" value="Log out"/></li></form>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            <div class = "col-6">
                <form action="warehouse_tables.php" method="get">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name ='name'  value="<?php echo $user->name;?>">
                        
                    </div>
                    <div class="form-group">
                        <label >Surname</label>
                        <input type="text" class="form-control" name='surname'  value="<?php echo $user->surname;?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name='email'aria-describedby="emailHelp" value="<?php echo $user->email;?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <!-- comment                    
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>             
                    
                    --> 
                    <input type="hidden" name="user-id" value="<?php echo $user->user_id; ?>" />
                    <button type="submit" name='update-profile' class="btn btn-primary">Update profile</button>
                </form>
            </div>


        </div>

    </body>
</html>


