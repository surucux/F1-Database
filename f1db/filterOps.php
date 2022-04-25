<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    
    <title>Filter Operations</title>
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
          <h1 class="display-3">Filter Data</h1>
          <p>In this page you can filter data from the database as you desire. There are three filter operations for now. But we will be developing many more as we proceed.</p>
        </div>
      </div>

      <div class="container mt-4 my-2">
<br>
        <div class="row">
            <div class="col-sm">
            <h5>Filter Workers by Team</h5>
            <form action="filterOps.php" method="GET">
                            <div class="form-group">
                            <label for="wid">Team Name</label>
                            <select class="form-control" id="tid" name="tid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT tid,teamName FROM teams"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $pid = $row['tid'];
                                    $name = $row['teamName'];
                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$pid."\">".$name."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>

                </form>
            </div>
            <div class="col-sm">
            <h5>Filter Grand Prixs by Season</h5>
            <form action="filterOps.php" method="GET">
                            <div class="form-group">
                            <label for="wid">Season</label>
                            <select class="form-control" id="sid" name="sid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT season FROM seasons"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $season = $row['season'];

                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$season."\">".$season."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>

                </form>
            </div>
            <div class="col-sm">
            <h5>Filter Results by Grand Prix</h5>
            <form action="filterOps.php" method="GET">
                            <div class="form-group">
                            <label for="wid">Grand Prix</label>
                            <select class="form-control" id="gpid" name="gpid">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT gpName,gpid FROM grandprix"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $gpname = $row['gpName'];
                                $gpid = $row['gpid'];

                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$gpid."\">".$gpname."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>

                </form>
            </div>
    </div>
<br>
    <?php

if (!empty($_GET['tid'])){ 
    echo '<h3>Racers Registered to the Database</h3>
    <table class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Team</th>
        <th scope="col">Season</th>
      </tr>
    </thead><tbody>';

    $tid = $_GET['tid'];

      $sql_statement =  "SELECT * FROM works_for,drivers,teams,people WHERE works_for.wid = drivers.did AND drivers.did = people.pid AND works_for.tid = $tid and teams.tid = $tid";

      $result = mysqli_query($db, $sql_statement);
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result

            $driverID = $row['pid']; 
            $driverName = $row['name']; 
            $teamName = $row['teamName'];
            $season = $row['season'];
            //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
            echo "<tr>
            <th scope=\"row\">".$driverID."</th>
            <td>".$driverName."</td>
            <td>".$teamName."</td>
            <td>".$season."</td>
          </tr>";
        }   
        
        echo '
        <table class="table">
        <thead class="thead-dark">
          <tr>
    
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Team</th>
            <th scope="col">Department</th>
            <th scope="col">Season</th>

          </tr>
        </thead><tbody>';
        echo "<br><h3>Engineers Registered to the Database</h3>";
    
    
          $sql_statement1 =  "SELECT * FROM works_for,engineers,teams,people WHERE works_for.wid = engineers.eid AND engineers.eid = people.pid AND works_for.tid = $tid and teams.tid = $tid";
    
          $result1 = mysqli_query($db, $sql_statement1);
            while($row = mysqli_fetch_assoc($result1)) { // Iterating the result
    
                $driverID = $row['pid']; 
                $driverName = $row['name']; 
                $teamName = $row['teamName'];
                $department = $row['department'];
                $season = $row['season'];
                //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                echo "<tr>
                <th scope=\"row\">".$driverID."</th>
                <td>".$driverName."</td>
                <td>".$teamName."</td>
                <td>".$department."</td>
                <td>".$season."</td>
              </tr>";
            }    

    
  }
?>

<?php

if (!empty($_GET['sid'])){ 
    echo '<h3>Grand Prixs of Season '.$_GET['sid'].'</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Grand Prix Name</th>
                <th scope="col">Circuit</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Season</th>
              </tr>
            </thead>
            <tbody>';

    $season = $_GET['sid'];

    $sql_statement = "SELECT gpName,gpName,date,circuitId,circuitName,country,sid FROM grandprix,circuits,seasons WHERE grandprix.circuitID = circuits.cid AND $season = grandprix.sid ORDER BY grandprix.date ASC"; 

      $result = mysqli_query($db, $sql_statement);
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result

            $gpName = $row['gpName']; 
            $gpDate = $row['date']; 
            $cName = $row['circuitName']; 
            $cCountry = $row['country']; 
            $season = $row['sid']; 

              echo "<tr>
              <th scope=\"row\">".$gpName."</th>
              <td>".$cName."</td>
              <td>".$cCountry."</td>
              <td>".$gpDate."</td>
              <td>".$season."</td>

            </tr>";
        }   
  

    
  }
?>


<?php

if (!empty($_GET['gpid'])){ 
    echo '<h3>Results of Grand Prix</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Driver</th>
                <th scope="col">Grand Prix</th>
                <th scope="col">Position</th>
              </tr>
            </thead>
            <tbody>';

    $gpid = $_GET['gpid'];

    $sql_statement = "SELECT p.name,gp.gpName,r.position
    FROM results r, grandprix gp,drivers d, people p
    WHERE r.gpid = gp.gpid and d.did = r.did and p.pid = r.did and gp.gpid = $gpid
    ORDER BY `r`.`position` ASC"; 

      $result = mysqli_query($db, $sql_statement);
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result

            $gpName = $row['gpName']; 
            $name = $row['name']; 
            $pos = $row['position']; 

              echo "<tr>
              <th scope=\"row\">".$name."</th>
              <td>".$gpName."</td>
              <td>".$pos."</td>

            </tr>";
        }   
  

    
  }
?>
      
      </div>



</body>


</html>


