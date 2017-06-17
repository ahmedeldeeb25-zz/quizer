<?php include "database.php"; ?>
<?php  session_start(); ?>
<?php

  //Check to see if score is set
  if(!isset($_SESSION['score']))
      $_SESSION['score']= 0 ;

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;
    
    // Get the total answers
    $query = "SELECT * FROM questions";
    $results= $mysqli->query($query);
    $total = $results->num_rows;
    
    
    // Get the correct choice 
    
    $query = "SELECT * FROM choices 
    
              WHERE  question_number =$number AND is_correct=1";
    
    //Get th result
    $result = $mysqli->query($query) or die($mysqli->error);;
    
    $row = $result->fetch_assoc();
    
    $correct_answer = $row['ID'];
    
    //Compare
    if($correct_answer == $selected_choice)
        //Answer
        $_SESSION['score']++;
}

   if($number == $total){     
       header("Location: final.php");
       exit();
       
   }else{
        header("Location: question.php?n=".$next);
   }

?>