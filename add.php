<?php include "database.php"; ?>
<?php 
   
   if(isset($_POST['submit'])){
       $question_num=$_POST['question_number'];
       $question_text=$_POST['question_text'];
       $correct_choice=$_POST['correct_choice'];
       //Choices array
       $choices =array();
       
       $choices[0] = $_POST['choice1'];
       $choices[1] = $_POST['choice2'];
       $choices[2] = $_POST['choice3'];
       $choices[3] = $_POST['choice4'];
       
       $query ="INSERT INTO questions (questions_number,text)
                   VALUES ('$question_num','$question_text')";
       
       $insert_row = $mysqli->query($query) or die($mysqli->error);
       
       if($insert_row){
           foreach($choices as $choice => $value){
               if($value != ''){
                   if($correct_choice == $choice+1)
                       $is_correct =1 ;
                   else
                       $is_correct =0 ;
               }
               //Add choices query
               $query = "INSERT INTO choices (question_number,is_correct,text)
                       VALUES ('$question_num','$is_correct','$value')";
               $insert_row= $mysqli->query($query) or die($mysqli->error);
           }
           
           $msg = "Question has been added successfuly";
           
       }      
   }

$query = "SELECT *FROM questions";
$questions= $mysqli->query($query) or die($mysqli->error);
$total = $questions->num_rows;
$next = $total+1;

?>
<!DOCTYPE HTML>

<html>
    <head>
        <title>PHP Quizzer</title>
        <meta  charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" />
    </head>
    
    <body>
        
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>
        
        <main>
             <div class="container">
                 <h2>Add a Question</h2>
                 
              <form method="post" action="add.php">
                  <p>
                      <label>Question number : </label>
                      <input  type="number" value="<?php echo $next;?>" name="question_number" />
                  </p>
                  
                   <p>
                      <label>Question Text : </label>
                      <input  type="text" name="question_text" />
                  </p>
                  
                   <p>
                      <label>Choice #1: </label>
                      <input  type="text" name="choice1" />
                   </p>
                   <p>
                      <label>Choice #2: </label>
                      <input  type="text" name="choice2" />
                   </p>
                   <p>
                      <label>Choice #3: </label>
                      <input  type="text" name="choice3" />
                   </p>
                   <p>
                      <label>Choice #4: </label>
                      <input  type="text" name="choice4" />
                   </p>
                  
                  
                  <p>
                      <label>Correct Choice Number : </label>
                      <input  type="number" name="correct_choice" />
                   </p>
                  
                  <p>
                      
                      <input  type="submit" name="submit" value="submit" />
                   </p>
                  
                  
                  
              </form>
            </div>
        </main>
        
        <footer>
            <div class="container">
                Copyright &copy 2014, AhmedE.Eldeeb
            </div>
        </footer>
        
        
    </body>
    
</html>