<?php
    session_start();
    require_once(__DIR__."\\functions\Shortner.php");
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="url shortener">
    <title>Make it Short!</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<br>
<center>
    <h1>Make it Short!</h1>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<p class='success'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo "<p class='alert'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    if (isset($_GET['error']) && $_GET['error'] == 'db') {
        echo "<p class='alert'>Error in connecting to database!</p>";
    }
    if (isset($_GET['error']) && $_GET['error'] == 'inurl') {
        echo "<p class='alert'>Not a valid URL!</p>";
    }
    if (isset($_GET['error']) && $_GET['error'] == 'dnp') {
        echo "<p class='alert'>Ok! So I got to know you love playing! But don't play here!!!</p>";
    }
    ?>
  <!-- Canvas -->
<canvas class="orb-canvas"></canvas>
<!-- Overlay -->
<div class="overlay">
  <!-- Overlay inner wrapper -->
  <div class="overlay__inner">
    <!-- Title -->
    <h1 class="overlay__title text-gradient">
      Make It Short

    </h1>
    <p class="overlay__description">

      <strong>Paste the URL to be shortened</strong>
    </p>
    
    <div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
<form action="shorten.php" method="post">
					<input id="user input" type="text" class="input" placeholder="Enter a URL here">
				</div>
				<div class="group" style='position:relative'>

					<input id="custom1" type="text" class="input input-c" data-type="password" placeholder="Enable custom text">
          
          <div class="onoffswitch">
          <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" onclick="toggle()">
          <label class="onoffswitch-label" for="myonoffswitch"></label>
        </div>
				</div>
				
				
      </div>
    </div>
    <!-- Description -->
    

    <!-- Buttons -->
    <div class="overlay__btns" style='display:flex; gap:10px'>

      <button class="overlay__btn overlay__btn--colors">
        <span>Change Colours</span>
        <span class="overlay__btn-emoji">🎨</span>
      </button>
      <button id ="formbutton" class="overlay__btn overlay__btn--colors">
        <span>Submit</span>
        
     
    </button>
    </form>
    </div>
  </div>
</div>
    <script>
      function toggle () {
        if (document.getElementById('myonoffswitch').checked) {
          document.getElementById('custom').placeholder = 'Enter your custom text'
          document.getElementById('custom').disabled = false
          document.getElementById('custom').focus()
        }
        else {
          document.getElementById('custom').value = ''
          document.getElementById('custom').placeholder = 'Enable custom text'
          document.getElementById('custom').disabled = true
          document.getElementById('custom').blur()
          document.getElementById('input').focus()
        }
      }
    </script>
</body>
</html>
