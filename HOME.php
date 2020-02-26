<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

		
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Intelligent HOME</title>


<link rel="stylesheet" href="style.css" type="text/css" />

	
	<script src="timer.js"></script>



<!--------------------------------------------------------- Kitchen----------------------------------->

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
         <script type="text/javascript">
            
           $(document).ready(function(){
			$('.kitchen').click(function(){
				var clickBtnValue = $(this).val();
				var ajaxurl = 'HOME.php',
				data =  {'action': clickBtnValue};
				$.post(ajaxurl, data, function (response) {
					clickBtnValue == 'Kitchen OFF' ? $('.kitchen').val('Kitchen ON') : $('.kitchen').val('Kitchen OFF')
			});
		});
	});
         </script>
		 
		 <?php
			if (isset($_POST['action'])) {
				switch ($_POST['action']) {
					case 'Kitchen ON':
						KitchenOff();
					break;
					case 'Kitchen OFF':
						KitchenOn();
					break;
					}
				}
				
				function KitchenOn() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '1' WHERE `id`= '1'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
				function KitchenOff() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '0' WHERE `id`= '1'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
		?>
		 
<!--------------------------------------------------------- Livingroom----------------------------------->
   
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
         <script type="text/javascript">
            
           $(document).ready(function(){
			$('.livingroom').click(function(){
				var clickBtnValue = $(this).val();
				var ajaxurl = 'HOME.php',
				data =  {'action': clickBtnValue};
				$.post(ajaxurl, data, function (response) {
					clickBtnValue == 'Livingroom OFF' ? $('.livingroom').val('Livingroom ON') : $('.livingroom').val('Livingroom OFF')
			});
		});
	});
         </script>
		 
		 <?php
			if (isset($_POST['action'])) {
				switch ($_POST['action']) {
					case 'Livingroom ON':
						LivingroomOff();
					break;
					case 'Livingroom OFF':
						LivingroomOn();
					break;
					}
				}
				
				function LivingroomOn() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '1' WHERE `id`= '3'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
				function LivingroomOff() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '0' WHERE `id`= '3'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
		?>
		
		<!--------------------------------------------------------- Bathroom----------------------------------->


		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
         <script type="text/javascript">
            
           $(document).ready(function(){
			$('.bathroom').click(function(){
				var clickBtnValue = $(this).val();
				var ajaxurl = 'HOME.php',
				data =  {'action': clickBtnValue};
				$.post(ajaxurl, data, function (response) {
					clickBtnValue == 'Bathroom OFF' ? $('.bathroom').val('Bathroom ON') : $('.bathroom').val('Bathroom OFF')
			});
		});
	});
         </script>
		 
		 <?php
			if (isset($_POST['action'])) {
				switch ($_POST['action']) {
					case 'Bathroom ON':
						BathroomOff();
					break;
					case 'Bathroom OFF':
						BathroomOn();
					break;
					}
				}
				
				function BathroomOn() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '1' WHERE `id`= '5'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
				function BathroomOff() {
				echo "The insert function is called.";
					
					$link = mysqli_connect("localhost", "root", "", "test");
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());}
					$sql = "UPDATE `rooms` SET `ofon`= '0' WHERE `id`= '5'";
					if(mysqli_query($link, $sql)){
					echo "Records update successfully.";
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
				mysqli_close($link);
				
				exit;
				}
		?>
		
		
</head>

<body onload="odliczanie();">
	<div id="container">
	
		<div class="rectangle">
			<div id="logo">
			<?php

			echo "<p>Welcome! ".$_SESSION['user'].'! [ <a href="logout.php">Log out!</a> ]</p>';
			
			?>
			</div>
			<div id="zegar">
			<a href="https://time.is/Krakow" id="time_is_link" rel="nofollow" style="font-size:50px"></a>
			<span id="Krakow_z733" style="font-size:36px"></span>
			<script src="//widget.time.is/t.js"></script>
			<script>
			time_is_widget.init({Krakow_z733:{}});
			</script>
			</div>
		
		</div>
		
			<div class="square">	
				<div id="kitchen">
					<form action="HOME.php" method="post">
						<input class="kitchen" style="font-size: 60px; color: white;" value="Kitchen OFF">
					</form>
				</div>
				<div id="livingroom">
					<form action="HOME.php" method="post">
						<input class="livingroom" style="font-size: 60px; color: white;" value="Livingroom OFF">
					</form>
				</div>
				<div style="clear:both;"></div>
				<div id="bathroom">
					<form action="HOME.php" method="post">
						<input class="bathroom" style="font-size: 60px; color: white;" value="Bathroom OFF">
					</form>
				</div>
				
				<div class="info">
				<br />Kontakt</a>
				</div>
				<div style="clear:both;"></div>
				<div class="rectangle2">2019 &copy; Aleksander Krajanowski, Michał Wudyka</div>
			</div>
	</div>
</body>
</html>
