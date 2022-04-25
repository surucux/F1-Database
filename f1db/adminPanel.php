<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 Database</title>
</head>
<body>

<?php
if(!empty($_POST['user'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($user == "admin"
    && $pass == "admin")
    {
            include("deleteOps.php");
    }
    
}
else
    {

        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">F1DB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="createPerson.php">Insert</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="deleteOps.php">Delete</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="filterOps.php">Filter</a>
            </li>

          </ul>

        </div>
        <span class="navbar-text">
          <div class=""><button class="btn btn-primary btn-sm" onClick="window.location.reload();">Refresh View</button></div>

          </span>

      </nav>
    
            <div class="container mx-auto mt-3">
                    <form action="adminPanel.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Username</label>
                    <input type="text" class="form-control" name="user" id="user" aria-describedby="emailHelp" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <?
    }

?>
</body>
</html>