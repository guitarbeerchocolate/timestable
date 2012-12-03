<?php
require_once 'classes/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Times table challenge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">    
    <link href="application/application.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body><!-- Part 1: Wrap all page content here -->
    <div id="wrap">
      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Times table <span class="challenge">challenge</span></h1>
        </div>
          <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">    
            <?php
            $themeLocation = 'themes/';
            $table = 1;
            $defaultTheme = 'dogs';
            $questions = 12;
            $order = 'first';
            if($_GET['table'] && is_numeric($_GET['table']))
            {
              $table = $_GET['table'];
            }
            if($_GET['questions'] && is_numeric($_GET['questions']))
            {
              $questions = $_GET['questions'];
            }
            if($_GET['theme'])
            {
              if(file_exists($themeLocation.$_GET['theme']))
              {
                $defaultTheme = $_GET['theme'];
              }
              $themeLocation = $themeLocation.$defaultTheme;              
            }
            if($_GET['order'] && ($_GET['order']=='second'))
            {
              $order='second';
            }            
            for($i=0; $i < $questions; $i++)
            { 
              $testNum = rand(1,12);
              $correctAnswer = $table*$testNum;
              echo '<div class="';
              if($i==0)
              {
                echo 'active ';
              }
              echo 'item">';
              echo '<form class="form-inline">';
              echo '<input type="hidden" class="answer" value="';
              echo $correctAnswer;
              echo '">';
              if($order=='first')
              {
                echo '<label>'.$testNum.' x '.$table.' = </label> ';  
              }
              else
              {
                echo '<label>'.$table.' x '.$testNum.' = </label> ';
              }
              echo '<input type="text" class="input-small attempt"> ';
              // echo '<button type="submit">Submit</button>';
              echo '</form>';
              echo '</div>';
            }                    
            ?>        
          </div>
        </div>
        <span id="clock">0</span> seconds
        <div id="push"><span id="total">0</span> out  of <?php echo $questions;?></div>   
        
        <img id="themeImage" src="themes/dogs/blank.jpg" />
      </div>

      <div id="footer">
        <div class="container">
          <p class="muted credit">Times table challenge <a href="http://www.effectivewebdesigns.co.uk">Mick Redman</a>.</p>
        </div>
      </div>

      <!-- Le javascript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>      
      <script>
      total = 0;
      counter = 0;
      answered = 0;
      incorrect = 0;
      score = 0;
      (function()
      {  
        $('form:not(.filter) :input:visible:first').focus();
        var timer = setInterval(function ()
        {
          ++counter;
          $('#clock').text(counter);
        }, 1000);

        $('form.form-inline').submit(function()
        {
          thisAttemptInput = $(this).find('input.attempt');
          thisAnswer = $(this).find('input.answer');

          if($(thisAnswer).val()==$(thisAttemptInput).val())
          {
            $('#total').text(++total);
            $('.carousel').carousel('next');            
            $('#themeImage').attr('src','themes/'+'<?php echo $defaultTheme; ?>'+'/'+total+'.jpg');
          }
          else
          {
            $('#total').text(total);
            $('.carousel').carousel('next');
            $('#themeImage').attr('src','themes/dogs/blank.jpg');
            incorrect++; 
          }
          
          if(++answered==<?php echo $questions;?>)
          {
            $('#myCarousel').empty();
            clearInterval(timer);
            happy = '<h1>Congratulations!</h1>';
            score = counter+(incorrect*4);
            happy += '<h2>Your score is '+score+' seconds</h2>';            
            targetURL = '<?php echo $_SERVER['REQUEST_URI']; ?>';
            happy += '<a href="'+targetURL+'">Play again?</a>';
            $('#myCarousel').html(happy);
            $('#themeImage').attr('src','themes/dogs/blank.jpg');            
          }          
          nextDiv = $('.item').next();
          nextForm = nextDiv.find('form');
          nextInput = nextForm.find('.attempt');
          nextInput.focus();          
          return false;
        });

      })();
      function startstopReset()
        {
          startstopCurrent = 0;
          startstopTimer.stop().once();
        }
      </script>
    </body>
  </html>