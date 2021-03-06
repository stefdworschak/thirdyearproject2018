<?php

  $c = new DBClass;
  $all=$c->getElections($_SESSION['org']);
  $votes=$c->getMyVotes($_SESSION['userid']);
  $rep = $_SESSION['position'] == null ? 0 : 1;

  $path = 'core/functions/existing_candidate.php';
  $html = "";
  $curtime = time();
  $view = isset($_GET['eType']) ? $_GET['eType'] : 'current';
  $failed_id = isset($_GET['failed_id']) ? $_GET['failed_id'] : 0;
  $success = isset($_GET['candidate_reg_success']) ? $_GET['candidate_reg_success'] : false;
  $err_type = isset($_GET['err']) ? $_GET['err'] : '';

  //print_r($all);

  if($err_type != ''){
    if($err_type == 'already_candidate'){
        $errors = "<div class='err_output'>You cannot register for more than one election at a time.</div>";
    } else if($err_type == 'no_election_specified' && $failed_id == $all[$i]['id']){
        $errors = "<div class='err_output'>Please select an election from this list.</div>";
    } else if($err_type == 'candidate_reg_err' && $failed_id == $all[$i]['id']){
        $errors = "<div class='err_output'>An unexpected error occurred registering you as candidate. Please try again or contact your administrator.</div>";
    }
  }
  //$html .= '<div class="row">';
  for($i=0; $i < sizeof($all);$i++){

    if($all[$i]['id'] != $failed_id){ $err = ''; }
    else { $err = $errors; }

    if(($view == 'current' && strtotime($all[$i]['expiry_date']) >= $curtime)
        || ($view == 'expired' && strtotime($all[$i]['expiry_date']) < $curtime)) {

        $open = $all[$i]['reg_candidates'] < $all[$i]['num_candidates'];
        $expired = strtotime($all[$i]['expiry_date']) < $curtime;
        //Show "Register as Candidate" button
        //If you have not already registered as candidate to an ongoing election
        //If the election is still ongoing (we do not want people to register to expired elections)
        //If the user is not already elected for a role
        //If the number of registered candidates is not more as the number of slots set when
        //creating the election
        if($_SESSION['my_election'] == null && $expired != true && $rep != 1 && $open == true){ $candidated = '<button class="btn btn-primary">Register as Candidate</button>';}
        //Else if the current election is the election that the user has registered as candidate
        //And the user is not elected for a role
        //If the number of registered candidates is not more as the number of slots set when
        //creating the election
        //Then display a disabled button saying "Registered as Candidate"
        else if($_SESSION['my_election'] == $all[$i]['id'] && $rep != 1 && $open == true) { $candidated = '<button class="btn btn-primary" disabled>Registered as Candidate <i class="fas fa-check"></i></button>'; }
        //Else don't display the button
        else { $candidated=''; }

        //If the user has voted for the current election, display a disabled button titled "Voted"
        if(in_array($all[$i]['id'],$votes)){
          $voted = "<button class='btn btn-success' disabled>Voted <i class='fas fa-check'></i></button>";
        } else if($expired != true) {
          $voted = "<button class='btn btn-danger'>Vote!</button>";
        } else {
          $voted ="";
        }

        if($expired == true){
          if($all[$i]['closed'] == 0) {
            $path = "index.php?view=election_results&election_id=".$all[$i]['id'];
            $candidated = "<button class='btn btn-primary' disabled>Waiting for Results</button>";
          } else {
            $path = "index.php?view=election_results&election_id=".$all[$i]['id'];
            $candidated = "<button class='btn btn-primary'>View Results</button>";
          }

        }

        $html .= "
          <div class='card main_card'>
            <h5 class='card-header'>" . $all[$i]['title'] .  "</h5>
            <div class='card-body'>
              <h5 class='card-title'>
                  <span class='badge badge-secondary'>" . $all[$i]['department'] .  "</span>&nbsp;
                  <span class='badge badge-secondary'>" . $all[$i]['reg_candidates'] . " of " . $all[$i]['num_candidates'] .  "</span>&nbsp;
                  <span class='badge badge-secondary'>" . $all[$i]['expiry_date'] .  "</span><br />
              </h5>
              <p class='card-text'>" . $all[$i]['description'] .  "</p>
              <form id='regCandidate' method='POST' action='". $path ."' enctype='multipart/form-data'>
                <input type='hidden' value='". $all[$i]['id'] ."' name='election_id' />
                " . $candidated . "
              </form>
              <form id='voteElection' method='POST' action='index.php?view=select_candidate' enctype='multipart/form-data'>
                  <input type='hidden' value='". $all[$i]['id'] ."' name='election_id' />
                  " . $voted . "
                </form>
                " . $err . "
            </div>
          </div>
        ";
      }

  } ?>

  <div class="row">
    <div class="card profile_card">
      <h4 class="card-header">All Elections <span id="search_div"><input type="text" id="search"><i class="fas fa-search"></i></span></h4>
      <div class="card-body">

         <?php
            if($success === 'true'){
                echo "<div class='alert alert-success' role='alert'>Your Candidate Profile was created successfully!</div>";
            } else if($err_type == 'vote_success') {
                echo "<div class='alert alert-success' role='alert'>Your Vote was registered successfully!</div>";
            } else if($err_type == 'vote_success') {
                echo "<div class='alert alert-danger' role='alert'>An unexpected error occurred! Your vote could not be registered.</div>";
            }

            if($view == 'current') {
              echo "<h5><strong>Current Elections</strong> | <a href='index.php?eType=expired'>Past Elections</a></h5>";
            } else {
              echo "<h5><a href='index.php'>Current Elections</a> | <strong>Past Elections</strong></h5>";
            }

            if($html == ''){
                echo "<br /><h5>No elections found.</h5>";
            } else {
                echo $html;
            }

         ?>
       </div>
     </div>
   </div>
