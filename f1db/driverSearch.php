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
        <div class="row">
        <div class="col-8">
        <h1 class="display-3">Search Drivers</h1>
          <p>Here you can gain detailed info about drivers.</p>
        </div>
        <div class="col-4">
        <form action="driverSearch.php" method="GET">
                            <div class="form-group">
                            <label for="wid">Driver</label>
                            <select class="form-control" id="did" name="did">
                            <?php 

                                include "config.php"; // Makes mysql connection

                                $sql_statement = "SELECT name,pid FROM drivers, people WHERE drivers.did = people.pid"; 

                                $result = mysqli_query($db, $sql_statement); // Executing query

                                while($row = mysqli_fetch_assoc($result)) { // Iterating the result
                                $name = $row['name'];
                                $pid = $row['pid'];

                                    //echo $seasonID . " " . $driverID . " " . $driverName . " ". $teamName ."<br>"; 
                                    echo "<option value=\"".$pid."\">".$name."</option>";
                                } 

                                ?>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-success">Get Details</button>

                </form>
        </div>
      </div>
          
        </div>
      </div>


<div class="container mb-5">
<?php

if (!empty($_GET['did'])){ 
    $cid = $_GET['did'];

    $sql_statement = "SELECT name,teamName,startedRacing,raceWins,photo FROM drivers, people,works_for,teams WHERE drivers.did = people.pid and teams.tid = works_for.tid and works_for.wid = drivers.did and drivers.did = $cid"; 

    $result = mysqli_query($db, $sql_statement);
    $row = mysqli_fetch_assoc($result); // Iterating the result

            $cName = $row['name']; 
            $cCountry = $row['teamName']; 
            $laps = $row['startedRacing']; 
            $length = $row['raceWins']; 
            $circuitImg = $row['photo']; 

            echo "<div class=\"card mx-auto\" style=\"width: 25rem;\">
            <img class=\"card-img-top px-2 py-2\" src=".$circuitImg." alt=\"Circuit Image\">
            <div class=\"card-body\">
              <h5 class=\"card-title\">".$cName."</h5>
              <p class=\"card-text\">Races for ". $cCountry ."</p>
            </div>
            <ul class=\"list-group list-group-flush\">
              <li class=\"list-group-item\">Race wins: ".$length."</li>
              <li class=\"list-group-item\">Started racing: ".$laps."</li>
            </ul>
          </div>";
  }
?>
</div>
      
<br><br>

</body>
</html>


