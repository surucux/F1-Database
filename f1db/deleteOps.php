<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    
    <title>Delete Operations</title>
</head>
<body>

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
            <li class="nav-item active">
              <a class="nav-link" href="circuitSearch.php">Circuits</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="driverSearch.php">Drivers</a>
            </li>

          </ul>

        </div>
        <span class="navbar-text">
          <div class=""><button class="btn btn-primary btn-sm" onClick="window.location.reload();">Refresh View</button></div>

          </span>

      </nav>

      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Delete Data</h1>
          <p>Here you can end people's F1 career. A quick reminder, please do not try to end Verstappen's career.</p>
        </div>
      </div>
      <div class="container mt-4 my-2">
      <?php
                include "config.php";
                if (!empty($_POST['pid'])){ // Check sname is not empty $sname = $_POST['sname'];
                  $personID = $_POST['pid'];

                  if($personID == 4){
                    echo "<div class=\"alert alert-danger\" role=\"alert\">How dare you try to delete Max Verstappen!? Try someone else, like Hamilton.</div>";

                  }
                  else{
                    $sql_statement =  "DELETE FROM people WHERE people.pid = $personID";

                    $result = mysqli_query($db, $sql_statement);
                    if($result == 1){
                      echo "<div class=\"alert alert-success\" role=\"alert\">Deletion of user ID ".$personID." succeeded.</div>";
                    }
                    else{
                      echo "<div class=\"alert alert-danger\" role=\"alert\">Deletion of user ID ".$personID." failed. Error Code: ".$result."</div>";
                    }
                  }
                }
                else if(!empty($_POST['gpid'])){
                    $gpid = $_POST['gpid'];
                    $sql_statement =  "DELETE FROM grandprix WHERE grandprix.gpid = $gpid";

                    $result = mysqli_query($db, $sql_statement);
                    if($result == 1){
                      echo "<div class=\"alert alert-success\" role=\"alert\">Deletion of Grand Prix ID ".$gpid." succeeded.</div>";
                    }
                    else{
                      echo "<div class=\"alert alert-danger\" role=\"alert\">Deletion of Grand Prix ID ".$gpid." failed. Error Code: ".$result."</div>";
                    }

                }
                else if(!empty($_POST['wid'])){
                  $wid = $_POST['wid'];
                  $sql_statement =  "DELETE FROM works_for WHERE works_for.wid = $wid";

                  $result = mysqli_query($db, $sql_statement);
                  if($result == 1){
                    echo "<div class=\"alert alert-success\" role=\"alert\">Deassociation of Worker ID ".$wid." succeeded.</div>";
                  }
                  else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Deassociation of Worker ID ".$wid." failed. Error Code: ".$result."</div>";
                  }

              }


                  ?>
<br>
        <div class="row">
            <div class="col-sm">
            <h5>Delete Person from the Database</h5>
            <form action="deleteOps.php" method="POST">
                            <div class="form-group">
                            <label for="wid">Name</label>
                            <select class="form-control" id="pid" name="pid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT pid,name FROM people"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $pid = $row['pid'];
                                    $name = $row['name'];
                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$pid."\">".$name."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </div>
            <div class="col-sm">
            <h5>Delete Grand Prix from the Database</h5>
            <form action="deleteOps.php" method="POST">
                            <div class="form-group">
                            <label for="wid">GP Name</label>
                            <select class="form-control" id="gpid" name="gpid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT gpName,gpid FROM grandprix"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $gpId = $row['gpid'];
                                    $gpName = $row['gpName'];
                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$gpId."\">".$gpName."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </div>
            <div class="col-sm">
            <h5>Deassociate Person with Team</h5>
            <form action="deleteOps.php" method="POST">
                            <div class="form-group">
                            <label for="wid">Worker - Team</label>
                            <select class="form-control" id="wid" name="wid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT people.pid,people.name,teams.teamName
                                FROM works_for, people,teams
                                WHERE works_for.wid = people.pid AND works_for.tid = teams.tid"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                    $pid = $row['pid'];
                                    $pName = $row['name'];
                                    $tName = $row['teamName'];

                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$pid."\">".$pName." - ".$tName."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Deassociate</button>

                </form>
            </div>
    </div>

      
      </div>



      
</body>
</html>


