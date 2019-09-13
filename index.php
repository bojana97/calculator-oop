<?php require 'class/calculator.class.php';?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet"  type="text/css" href="css/styles.css"/>
    <title>Calculator</title>
</head>

<body>
<div class="content">
<?php 
	//	set numbers of factors
	$factor1=10;
	$factor2=10;

	//on submit create object, get result, insert record into db 
	if(isset($_POST['combinationBtn']))
	{
		$calculate= new Calculator($_POST['combinationBtn']); 
		$calculate->splitElements();
		$calculate->getResult();
		$calculate->insert();

		//display result
		echo '<div id="result-div">
				<p id="result-p"> Result: '.$calculate->factor1 .' x ' .$calculate->factor2 .' = ' .$calculate->result;'</p>
			</div>';
	}
?>

<!-- create combination table -->
<table class="content-table">
<form action="" method="post">
  <thead>
    <tr>
	<th> # </th>
	<?php for($i = 1; $i <= $factor2; $i++) :?>
		<th><?= $i ?></th>
	<?php   endfor   ?>
    </tr>
  </thead>
  <tbody>
    <tr>
	<?php for( $i=1; $i <= $factor1; $i++): ?>
	  <th class="vertical-header"><?= $i ?></th>
	  <?php  for( $j=1; $j <= $factor2; $j++):   ?>
		<td><input class="btn" type="submit" value="<?= $i .' x ' .$j ?>" name="combinationBtn"  ></td>
	<?php endfor ?>
    </tr>
	<?php endfor ?>
  </tbody>
  </form>
</table>
</div>
</body>
</html>