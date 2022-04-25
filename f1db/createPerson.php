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
          <h1 class="display-3">Insert Data</h1>
          <p>Most beatiful looking insertion page, ever. In this page you can create new Grand Prixs, add new people, teams and associate new people them with teams</p>
        </div>
      </div>


<div class="container my-1">

<?php
                include "config.php";
                if (!empty($_POST['workerType'])){ // Check sname is not empty $sname = $_POST['sname'];
                  $workerType =  $_POST['workerType'];
                  $workerID = $_POST['wid'];
                  $teamID = $_POST['team'];

                  if($workerType == "racer"){
                    //racer
                    $sql_statement = "INSERT INTO `drivers` (`did`, `startedRacing`, `raceWins`) VALUES ('$workerID', '0', '0')";
                    $result = mysqli_query($db, $sql_statement);

                    $sql_statement = "INSERT INTO `works_for` (`wid`, `tid`, `season`) VALUES ('$workerID', $teamID, '2021')";
                    $result1 = mysqli_query($db, $sql_statement);


                    if($result == 1 && $result1 == 1){
                      echo "<div class=\"alert alert-success\" role=\"alert\">"."Racer added Succesfully"."</div>";
                    }
                    else{
                      echo "<div class=\"alert alert-danger\" role=\"alert\">"."An error occured.".$result."</div>";

                    }
                  }
                  else if($workerType == "engineer"){
                    $dep = $_POST['department'];
                    $sql_statement = "INSERT INTO `engineers` (`eid`, `department`) VALUES ('$workerID', '$dep')";
                    $result = mysqli_query($db, $sql_statement);

                    $sql_statement = "INSERT INTO `works_for` (`wid`, `tid`, `season`) VALUES ('$workerID', $teamID, '2021')";
                    $result1 = mysqli_query($db, $sql_statement);


                    if($result == 1 && $result1 == 1){
                      echo "<div class=\"alert alert-success\" role=\"alert\">"."Engineer added Succesfully"."</div>";
                    }
                    else{
                      echo "<div class=\"alert alert-danger\" role=\"alert\">"."An error occured.".$result."</div>";

                    }
                  }
                  
                }

                else if (!empty($_POST['name'])){
                  $name = $_POST['name'];
                  $sql_statement = "INSERT INTO people(name) VALUES ('$name')";
                  $result = mysqli_query($db, $sql_statement);
                  if($result == 1){
                    echo "<div class=\"alert alert-success\" role=\"alert\">"."User Added Succesfully"."</div>";
                  }
                  else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\">"."An error occured.".$result."</div>";

                  }
                }
                else if(!empty($_POST['gpname'])){

                  $cid = $_POST['cid'];
                  $gpname = $_POST['gpname'];
                  $gpdate = $_POST['gpdate'];
                  $season = $_POST['sid'];

                  $sql_statement = "INSERT INTO grandprix(sid,gpName,date,circuitID) VALUES ('$season','$gpname','$gpdate','$cid')";
                  $result = mysqli_query($db, $sql_statement);

                  if($result == 1){
                    echo "<div class=\"alert alert-success\" role=\"alert\">".$gpname." has been created succesfully!"."</div>";
                  }
                  else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\">"."An error occured.".$result.$gpdate.$gpname.$cid."</div>";

                  }
                }
                else if(!empty($_POST['teamName'])){

                  $teamName = $_POST['teamName'];

                  $sql_statement = "INSERT INTO teams(teamName) VALUES ('$teamName')";
                  $result = mysqli_query($db, $sql_statement);

                  if($result == 1){
                    echo "<div class=\"alert alert-success\" role=\"alert\">Team ".$teamName." has been created succesfully. Good luck on the races!"."</div>";
                  }
                  else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\">"."An error occured.".$teamName ."</div>";

                  }
                }
                  ?>
</div>

<div class="row mx-auto">
<div class="col-8">

<h3>Upcoming Grand Prix List</h3>
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
            <tbody>
              <?php 

              include "config.php"; // Makes mysql connection

              $sql_statement = "SELECT gpName,gpName,date,circuitId,circuitName,country,sid FROM grandprix,circuits,seasons WHERE grandprix.circuitID = circuits.cid AND seasons.season = grandprix.sid ORDER BY grandprix.date ASC"; 

              $result = mysqli_query($db, $sql_statement); // Executing query

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

              ?>
            </tbody>
          </table>
</div>
  <div class="col-4">
    <br><br>
  <h4>Create a new Grand Prix</h4>
                <form action="createPerson.php" method="POST">
                <div class="form-group">
                      <label for="name">Grand Prix Name</label>
                      <input type="text" class="form-control" id="gpname" name="gpname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="wid">Circuit</label>
                      <select class="form-control" id="cid" name="cid">
                      <?php 

                        include "config.php"; // Makes mysql connection

                        $sql_statement = "SELECT circuitName,cid FROM circuits"; 

                        $result = mysqli_query($db, $sql_statement); // Executing query

                        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                          $cid = $row['cid'];
                            $cname = $row['circuitName'];
 
                            echo "<option value=\"".$cid."\">".$cname."</option>";
                        } 

                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="wid">Season</label>
                      <select class="form-control" id="sid" name="sid">
                      <?php 

                        include "config.php"; // Makes mysql connection

                        $sql_statement = "SELECT season FROM seasons"; 

                        $result = mysqli_query($db, $sql_statement); // Executing query

                        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                          $season = $row['season'];
                            echo "<option value=\"".$season."\">".$season."</option>";
                        } 

                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="start">Grand Prix date:</label>

                    <input type="date" id="gpdate" name="gpdate">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
  </div>
  
</div>
<br>
<br>
<div class="row mx-auto">
  
  <div class="col-8">
  <div class="row">
    <div class="col">
    <h3>People Registered to the Database</h3>
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "config.php"; // Makes mysql connection

                    $sql_statement = "SELECT * FROM `people`"; 

                    $result = mysqli_query($db, $sql_statement); // Executing query

                    while($row = mysqli_fetch_assoc($result)) { // Iterating the result

                        $personID = $row['pid']; 
                        $name = $row['name']; 
                        //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                        echo "<tr>
                        <th scope=\"row\">".$personID."</th>
                        <td>".$name."</td>
                      </tr>";
                    } 

                    ?>
                  </tbody>
                </table>
    </div>
    <div class="col">
    <h3>Racers Registered to the Database</h3>
            <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Team</th>
              </tr>
            </thead>
            <tbody>
              <?php 

              include "config.php"; // Makes mysql connection

              $sql_statement = "SELECT seasons.season,drivers.did,people.name,teams.teamName FROM drivers,seasons,teams,works_for,people WHERE works_for.season = 2021 AND teams.tid = works_for.tid AND drivers.did = works_for.wid AND drivers.did = people.pid"; 

              $result = mysqli_query($db, $sql_statement); // Executing query

              while($row = mysqli_fetch_assoc($result)) { // Iterating the result

                  $driverID = $row['did']; 
                  $driverName = $row['name']; 
                  $teamName = $row['teamName'];
                  //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                  echo "<tr>
                  <th scope=\"row\">".$driverID."</th>

                  <td>".$driverName."</td>
                  <td>".$teamName."</td>
                </tr>";
              } 

              ?>
            </tbody>
          </table>
    </div>
    <div class="col">
    <h3>Engineers Registered to the Database</h3>
            <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Team</th>
                <th scope="col">Department</th>
              </tr>
            </thead>
            <tbody>
              <?php 

              include "config.php"; // Makes mysql connection

              $sql_statement = "SELECT seasons.season,engineers.eid,people.name,teams.teamName,engineers.department FROM engineers,seasons,teams,works_for,people WHERE works_for.season = 2021 AND teams.tid = works_for.tid AND engineers.eid = works_for.wid AND engineers.eid = people.pid"; 

              $result = mysqli_query($db, $sql_statement); // Executing query

              while($row = mysqli_fetch_assoc($result)) { // Iterating the result

                  $driverID = $row['eid']; 
                  $department = $row['department'];
                  $driverName = $row['name']; 
                  $teamName = $row['teamName'];
                  //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                  echo "<tr>
                  <th scope=\"row\">".$driverID."</th>

                  <td>".$driverName."</td>
                  <td>".$teamName."</td>
                  <td>".$department."</td>
                </tr>";
              } 

              ?>
            </tbody>
          </table>
    </div>

  </div>
  </div>
  <div class="col-4">

                <h4>Add Person to the Database</h4>
                <form action="createPerson.php" method="POST">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                  </form>
                  <br><br>
                  <h4>Create a new team</h4>
                <form action="createPerson.php" method="POST">
                    <div class="form-group">
                      <label for="name">Team Name</label>
                      <input type="text" class="form-control" id="teamName" name="teamName" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>

                  </form>
<br><br>
                  <h4>Associate People With Teams</h4>
                <form action="createPerson.php" method="POST">
                    <div class="form-group">
                      <label for="wid">Name</label>
                      <select class="form-control" id="wid" name="wid">
                      <?php 

                        include "config.php"; // Makes mysql connection

                        $sql_statement = "SELECT pid,name FROM people WHERE pid NOT IN (SELECT wid FROM works_for)"; 

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


                    <div class="form-group">
                      <label for="name">Department (If Applicable)</label>
                      <input type="text" class="form-control" id="department" name="department" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Team</label>
                      <select class="form-control" id="team" name="team">
                      <?php 

                        include "config.php"; // Makes mysql connection

                        $sql_statement = "SELECT teamName,tid FROM teams"; 

                        $result = mysqli_query($db, $sql_statement); // Executing query

                        while($row = mysqli_fetch_assoc($result)) { // Iterating the result

                            $teamName = $row['teamName'];
                            $teamID = $row['tid'];
                            //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                            echo "<option value=\"".$teamID."\">".$teamName."</option>";
                        } 

                        ?>
                      </select>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="workerType" id="exampleRadios1" value="racer" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Racer
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="workerType" id="exampleRadios2" value="engineer">
                      <label class="form-check-label" for="exampleRadios2">
                        Engineer
                      </label>
                    </div> <br>

                    <button type="submit" class="btn btn-primary">Associate</button>

                  </form>


  </div>
</div>


      
</body>
</html>

