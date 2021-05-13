<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Football League</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <script src="https://kit.fontawesome.com/fbad311eca.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/1b93a4ba68.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link href="images/favicon (2).ico" rel="icon" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>
  <section id="title">
    <div class="container">  <!---fluid-->
      <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #111f4d;">
        <a class="navbar-brand" href="homepage.php">Football League Database</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="navbar-item">
              <a class="nav-link" href="team.php">Team</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="player.php">Player</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="coach.php">Coach</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="coach_manages_team.php">Coach Manages Team</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="player_in_team.php">Player In Team</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="match.php">Match</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="stadium.php">Stadium</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link" href="standing.php">Standing</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Title -->

      <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-4 buttons">
          <br><br><br><br>
            <form method="POST" >
              <input type="text" class="form-control" id="playerID" name="playerID" placeholder="Player ID" required><br>
              <input type="text" class="form-control" id="teamID" name="teamID" placeholder="Team ID" required><br>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required><br>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required><br>
              <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required><br>
              <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" required><br>
              <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Birthplace" required><br>
              <button class="btn btn-outline-secondary btn-md" name="insert">Insert</button>
            </form>
        </div>
         
        <div class="col-lg-1">
        </div>

        <div class="col-lg-3">
        <br><br><br><br>
          <form method="POST">
            <input type="text" class="form-control" id="playerID" name="playerID" placeholder="Player ID" required><br>
            <button class="btn btn-outline-secondary btn-md" name="delete">Delete</button>
          </form>
          <br><br><br>
          <form method="POST">
            <input type="text" class="form-control" id="playerID" name="playerID" placeholder="Player ID" required><br>
            <button class="btn btn-outline-secondary btn-md" name="select">Select</button>
          </form>
        </div>
        <div class="col-lg-5">

        </div>
      </div>
    </div>
  </section>


  <?php
  // database connection code
  // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
  
  include "config.php";

  //(isset($_POST['teamID']))
  if (isset($_POST['insert'])) { // If the id post variable is set
  	//  echo "inside if";
      $playerID = $_POST['playerID'];
  		$teamID = $_POST['teamID'];
  		$name = $_POST['name'];
  		$surname = $_POST['surname'];
      $birthday = $_POST['birthday'];
      $birthplace = $_POST['birthplace'];
  		$nationality = $_POST['nationality'];

  // database insert SQL code
  $sql_statement = "INSERT INTO `player` (playerID, name, surname, birthday, teamID, nationality, birthplace)
   									VALUES ($playerID,'$name','$surname', '$birthday' , $teamID, '$nationality', '$birthplace' )";

  // insert in database
  if ($db->query($sql_statement) === TRUE) {
    ?>
    <body style="background-color:#f2f4f7;">
     <?php echo "Inserted Successfully!"; ?>
     <?php
  } else {
    ?>
    <body style="background-color:#f2f4f7;">
      <br>
     <?php echo "Error: ". $db->error; ?>
     <?php
  }
  }

  else if (isset($_POST['delete'])) { // If the id post variable is set
  	//  echo "inside if";
  		$playerID = $_POST['playerID'];

  // database insert SQL code
  $sql_statement = "DELETE FROM `player`
                    WHERE playerID = $playerID";

  // insert in database

  	if ($db->query($sql_statement) === TRUE) {
      ?>
      <body style="background-color:#f2f4f7;">
       <?php
      echo "Affected Rows: " . $db->affected_rows;
  	} else {

  	  echo "Error: " . $sql_statement . "<br>" . $db->error;
  	}
  }

  else if (isset($_POST['select'])) { // If the id post variable is set
  	//  echo "inside if";
  	$playerID = $_POST['playerID'];
    $sql_statement = "SELECT * FROM `player`
                      WHERE playerID = $playerID";

    $result = mysqli_query($db, $sql_statement);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
      $row = mysqli_fetch_assoc($result);

  ?>

  <body style="background-color:#f2f4f7;">
    <div class="row justify-content-md-center">

      <div class="col-md-6 ">
        <br><br>
       <table class=" StandardTable table table-bordered">
         <thead>
           <tr style="text-align:center">
             <th scope="col">Player ID</th>
             <th scope="col">Team ID</th>
             <th scope="col">Name</th>
             <th scope="col">Surname</th>
             <th scope="col">Birthday</th>
             <th scope="col">Nationality</th>
             <th scope="col">Birthplace</th>
           </tr>
         </thead>
         <tbody>
           <tr style="text-align:center">
             <td><?php echo $row['playerID'];?></td>
             <td><?php echo $row['teamID'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['surname'];?></td>
             <td><?php echo $row['birthday'];?></td>
             <td><?php echo $row['nationality'];?></td>
             <td><?php echo $row['birthplace']?></td>
           </tr>

         </tbody>
       </table>
      </div>

    </div>
  </body>

  <?php
}
 else {
   ?>
   <body style="background-color:#f2f4f7;">
    <?php echo "No Results!"; ?>
    <?php
  }

}

?>


  <!-- Footer -->

  <footer id="footer">

    <p></p>

  </footer>

</body>

</html>
