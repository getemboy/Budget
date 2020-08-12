<?php
mb_internal_encoding('UTF-8');

$title = "Редактиране";

require_once './includes/header.php';

?>

<a href="index.php">Списък</a>

<form method = "POST">

<div> Име:<input type="text" name="name" /> </div>
<div> Сума:<input type="text" name="amount" /> </div>
<div> Тип:<select name="group">
<?php
foreach ($groups as $key => $values) { echo '<option value = "' .$key. '">' .$values. '</option>'; }
?>
 
		</select> 
	</div>
	<div> <input type="submit" name="add"></div>
	</form>

<?php 
include './includes/footer.php';
?>