<?php include "database.php"; ?>
<?php  session_start(); ?>

<?php
//Set question number
 $number = (int) $_GET['n'];
//Get The question
$query="SELECT * FROM questions WHERE  questions_number = $number";

//Get result
$result = $mysqli->query($query) or die($mysqli->error);
$question = $result->fetch_assoc();

//Get the choices 

$query="SELECT * FROM choices WHERE  question_number = $number";

//Get result
$results = $mysqli->query($query) or die($mysqli->error);


//Number of questions 

$query="SELECT * FROM questions ";

//Get result
$total = $mysqli->query($query);



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
                <div class="current">Question <?php echo $number;?></php?> of <?php echo $total->num_rows;?></div>
                 <p class="question">
                     <?php echo $question['text']; ?> 
                 </p>
                 <form method="post" action="process.php">
                     <ul class="choices">
                         <?php while($row = $results->fetch_assoc()){ ?>
                         <li><input name="choice" type="radio" value="<?php echo $row['ID']; ?>" /> <?php echo $row['text']; ?></li>
                         <?php } ?>
                         
                     </ul>
                     <input type="submit" value="submit" />
                     <input type="hidden" value="<?php echo $number ?>" name="number" />
                 </form>
            </div>
        </main>
        
        <footer>
            <div class="container">
                Copyright &copy <?php echo date("Y");?>, AhmedE.Eldeeb
            </div>
        </footer>
        
        
    </body>
    
</html>