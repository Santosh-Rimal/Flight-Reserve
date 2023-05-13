<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Animation</title>
	<style type="text/css">
		div{
			position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		}
		li{
			list-style: none;
			display: inline-block;
			margin: 20px;
			padding: 30px;
			border-radius: 50%;
		}
		li:nth-child(1){
			color: red;
			animation-delay: 0.5s;
			background-color: green;
		}
			li:nth-child(2){
			color: blue;
			animation-delay: 0.1s;
			background-color: green;
		}
		}
			li:nth-child(3){
			color: white;
			animation-delay: 0.8s;
			background-color: green;
		}
		div ul li{
			animation: move 2s linear infinite;
		}
		@keyframes move{
			0%{transform: translateY(0); color: green; background-color: white;}
			25%{transform: translateY(-50px);color: pink; background-color: red;}
			50%{transform: translateY(-100px);color: red; background-color: white;}
			75%{transform: translateY(-130px);color: blue; background-color: pink;}}
			85%{transform: translateY(-100px);color: whit; background-color: yellow;}}
			95%{transform: translateY(-50px); color: red; background-color: blue;}}
			100%{transform: translateY(0px);color: white; background-color: aliceblue;}}
		}
	</style>
</head>
<body>
<div>
	<ul>
	<li>
		Everest
	</li>
		<li>
		Height
	</li>
		<li>
		Holidays
	</li>
	</ul>
</div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="number" name="n1">
<input type="number" name="n2">
<input type="submit" name="s">
</form>
<?php  
if(isset($_REQUEST['s'])){
$a=$_REQUEST['n1'];
$b=$_REQUEST['n2'];
$c=$a+$b;

?>
<!DOCTYPE html>
<?php 
echo '<input type="number" name="n3" value="<?php echo $c ;?>">';
}
 ?>
</body>
</html>
