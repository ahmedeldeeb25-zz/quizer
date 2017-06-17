<?php  session_start(); ?>

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
                <h2>Your are done....</h2>
                 <p>Congrats! You have Completed the quiz</p>
                 <p>Final Score : <?php echo $_SESSION['score']; ?></p>
                 <a href="question.php?n=1" class="start">Retake</a>
            </div>
        </main>
        
        <footer>
            <div class="container">
                Copyright &copy 2014, AhmedE.Eldeeb
            </div>
        </footer>
        
        
    </body>
    
</html>

<?php 

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>