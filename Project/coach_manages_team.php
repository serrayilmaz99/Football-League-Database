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
        <div class="col-lg-1">

        </div>
        <div class="col-lg-4 buttons">
          <br><br><br><br>
            <form method="POST" >
              <input type="text" class="form-control" id="coachID" name="coachID" placeholder="Coach ID" required><br>
              <input type="text" class="form-control" id="teamID" name="teamID" placeholder="Team ID" required><br>
              <input type="text" class="form-control" id="contractStartDate" name="contractStartDate" placeholder="Contract Start Date" required><br>
              <input type="text" class="form-control" id="contractEndDate" name="contractEndDate" placeholder="Contract End Date" required><br>
              <input type="text" class="form-control" id="fee" name="fee" placeholder="Fee" required><br>
              <button class="btn btn-outline-secondary btn-md "name="insert">Insert</button>
            </form>
        </div>
        <div class="col-lg-3 buttons">
          <br><br><br><br>
            <form   method="POST" >
              <input type="text" class="form-control" id="coachID" name="coachID" placeholder="Coach ID" required><br>
              <input type="text" class="form-control" id="teamID" name="teamID" placeholder="Team ID" required><br>
              <button class="btn btn-outline-secondary btn-md" name="delete">Delete</button>
            </form>
            </div>
          <div class="col-lg-3 buttons">
            <br><br><br><br>
              <form  method="POST" >
                <input type="text" class="form-control" id="coachID" name="coachID" placeholder="Coach ID" ><br>
                <input type="text" class="form-control" id="teamID" name="teamID" placeholder="Team ID" ><br>
                <input type="text" class="form-control" id="contractStartDate" name="contractStartDate" placeholder="Contract Start Date" ><br>
                <input type="text" class="form-control" id="contractEndDate" name="contractEndDate" placeholder="Contract End Date" ><br>
                <input type="text" class="form-control" id="fee" name="fee" placeholder="Fee" ><br>
                <button class="btn btn-outline-secondary btn-md" name="select">Select</button>
                <button class="btn btn-outline-secondary btn-md" name="update">Update</button>
              </form>

        </div>
        </div>
        </section>


        <?php

        // database connection code
        // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

        include "config.php";

        //(isset($_POST['teamID']))
        if (isset($_POST['insert'])) { // If the id post variable is set

        $teamID = $_POST['teamID'];
        $coachID = $_POST['coachID'];
        $contractStartDate = $_POST['contractStartDate'];
        $contractEndDate = $_POST['contractEndDate'];
        $fee = $_POST['fee'];


        // database insert SQL code
        $sql_statement = "INSERT INTO `coach_manages_team` (teamID, coachID, contractStartDate, contractEndDate,fee  )
                    VALUES ($teamID, $coachID ,'$contractStartDate', '$contractEndDate' , $fee)";

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
        $teamID = $_POST['teamID'];
        $coachID = $_POST['coachID'];

        // database insert SQL code
        $sql_statement = "DELETE FROM `coach_manages_team`
                    WHERE teamID = $teamID AND coachID = $coachID";

        // insert in database

        if ($db->query($sql_statement) === TRUE) {
        ?>
        <body style="background-color:#f2f4f7;">
        <?php
        echo "Number of Deleted Rows: " . $db->affected_rows;
        } else {

        echo "Error: " . $sql_statement . "<br>" . $db->error;
        }
        }

        else if (isset($_POST['update'])){
          if(! (  (isset($_POST['teamID'])) && (strlen($_POST['teamID']) != 0) ) || (! (  (isset($_POST['coachID'])) && (strlen($_POST['coachID']) != 0)) )  ){
            ?>
            <body style="background-color:#f2f4f7;">
              <br>
            <?php echo 'Player ID and Coach ID must be specified to update'; //teamID, coachID, contractStartDate, contractEndDate,fee
          }
          else{
            $teamID = $_POST['teamID'];
            $coachID = $_POST['coachID'];
            $number_of_fields_filled = 0;
            $fields = array("teamID","coachID","contractStartDate","contractEndDate","fee");
            foreach($fields as $field){
              if( isset($_POST[$field]) && strlen($_POST[$field]) != 0 ){
                $number_of_fields_filled+=1;
              }
            }
            if($number_of_fields_filled == 0)
            {
              ?>
              <body style ="background-color:#f2f4f7;">
                <br>
              <?php echo "To be updated value must be filled for at least 1 field";
            }
            else{ //UPDATE `team` SET active` = '1', `teamName` = 'asd' WHERE `team`.`teamID` = 1;
                //UPDATE `team` SET `teamName = 'a' WHERE `team`.`teamID` = 1;
                // WHERE teamID = 1;
              $sql_statement = "UPDATE `coach_manages_team` SET ";
              $number_of_commas = $number_of_fields_filled-1;
              foreach($fields as $field){
                if( isset($_POST[$field]) && strlen($_POST[$field]) !=0 )
                {
                  $current_field = $_POST[$field];
                  if(is_numeric($current_field) == FALSE ){
                    $current_field = "'$current_field'";
                  }
                  $sql_statement .= "`$field` = $current_field";
                  if($number_of_commas > 0){
                    $sql_statement.= ", ";
                    $number_of_commas -= 1;
                  }
                  else{
                    $sql_statement .= " WHERE teamID = $teamID AND coachID = $coachID";
                  }
                }
              }
              if($db->query($sql_statement) == TRUE){
                ?>
                <body style="background-color:#f2f4f7;">
                <?php echo "Updated Successfully!";
              }
              else{
                ?>
               <body style="background-color:#f2f4f7;">
                <br>
                <?php echo "Error: ". $db->error ."\n" ;
                echo $sql_statement;
              }
            }

          }
        }


        else if (isset($_POST['select']))   { // If the id post variable is set
            //  if none are filled then show error message   (teamID, coachID, contractStartDate, contractEndDate,fee  )
            $fields = array("teamID","coachID","contractStartDate","contractEndDate", "fee");
            $number_of_fields_filled = 0;

            foreach ($fields as $field){
              if (isset($_POST[$field]) && strlen($_POST[$field]) != 0  ){
                $number_of_fields_filled += 1;
              }
            }
            if($number_of_fields_filled == 0){
              ?>
              <body style="background-color:#f2f4f7;">
                <br>
               <?php echo 'At least 1 field must be filled for the query'; ?>
               <?php
            }
            else{
            $number_of_and_clauses = $number_of_fields_filled -1;
            $sql_statement = "SELECT * FROM `coach_manages_team` WHERE ";
            foreach ($fields as $field){
              if (isset($_POST[$field]) && strlen($_POST[$field]) != 0  ){

                $current_field = $_POST[$field];
                if (is_numeric($current_field) == FALSE){ // if it is not numeric then add quotations to the variable
                  $current_field = '"'. $current_field . '"' ; // this is for sql syntax
                }

                $sql_statement .= "$field = $current_field";
                if($number_of_and_clauses >0)
                {
                  $sql_statement .= " AND ";
                  $number_of_and_clauses -=1;
                }
              }
            }
            //echo $sql_statement;

            $result = mysqli_query($db, $sql_statement);

          if (mysqli_num_rows($result) > 0) {
            // output data of each row which can be 1 or 0 if only teamID(primary key) can be used


          ?>

          <body style="background-color:#f2f4f7;">
            <div class="row justify-content-md-center">
              <div class="col-md-6 ">
              <br><br>
               <table class=" StandardTable table table-bordered">

                 <thead>
                   <tr style="text-align:center">
                     <th scope="col">Coach ID</th>
                     <th scope="col">Team ID</th>
                     <th scope="col">Contract Start Date</th>
                     <th scope="col">Contract End Date</th>
                     <th scope="col">Fee</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php
                while ($row = mysqli_fetch_assoc($result)){
                  ?>
                   <tr style="text-align:center">
                     <td><?php echo $row['coachID'];?></td>
                     <td><?php echo $row['teamID'];?></td>
                     <td><?php echo $row['contractStartDate'];?></td>
                     <td><?php echo $row['contractEndDate'];?></td>
                     <td><?php echo $row['fee'];?></td>
                   </tr>
                   <?php
                   }
                   ?>
                 </tbody>
               </table>
              </div>

            </div>
          </body>
          <?php

        }
         else{
           ?>
           <body style="background-color:#f2f4f7;">
            <?php echo "No Results!"; ?>
            <?php
          }

        }
        }

        ?>


          <!-- Footer -->

          <footer id="footer">

            <p></p>

          </footer>

        </body>

        </html>
