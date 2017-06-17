<?php include "database.php"; ?>

<?php 

$query="SELECT * FROM questions";

$result = $mysqli->query($query) or die("There is an error");
$total = $result->num_rows;

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
                <h2>Test your PHP Knowledge</h2>
                 
                 <ul>
                     <li><strong>Number of Questions:</strong><?php echo $total ;?></li>
                     <li><strong>Type :</strong> Multiple choice</li>
                     <li><strong>Estimated Time : </strong><?php echo $total* .5 ?></li>
                 </ul>
                 
                 <a href="question.php?n=1" class="start"> Start Quiz</a>
            </div>
        </main>
        
        <footer>
            <div class="container">
                Copyright &copy <?php echo date("Y") ;?>, AhmedE.Eldeeb
            </div>
        </footer>
        
        
    </body>
    
</html>