<?php 
$title = "Списък";
require_once './includes/header.php';

error_reporting(0);
$sum = 0;
?>

<a href = "form.php"> Добави нов Разход</a>

<form method = "Post">
	<div> Тип: <select name="filter_group">
	<option value = '0'> Всички </option>
 <?php 
 foreach ($groups as $key => $values) { 
     echo '<option';
 if (isset($_POST['filter_group']) && $_POST['filter_group'] == $key) {
     echo ' selected ';
 }
 echo  ' value = "' .$key. '">' .$values. '</option>'; }
 ?>
 </select>
 	</div> 
 	<div> Ден <input type="date" name = "date">
 	</div>
	<div> Филтер <input type="submit" name="filter"></div>
	</form>
</form>


<table  border="1">
<tr>
<td>Дата</td>
<td>Име</td>
<td>Сума</td>
<td>Група</td>
</tr>
<?php 

$filter = $_POST["filter_group"];
if(isset($_POST["date"])) {$date =  str_replace('-', '/', $_POST["date"]);}
if(file_exists('data.txt')) {
    $result = file('data.txt');
    foreach ($result as $value) {
        $columns = explode('!', $value);
        if (!$filter) {
            if (isset($date) && $date == $columns[0]){
                require './includes/rows.php';
            }
            if (!$date) {
                require './includes/rows.php';
            }
        }
        if ($filter == trim($columns[3])) {
            if (isset($date) && $date == $columns[0]){
                require './includes/rows.php';
            }
            if (!$date) {
                require './includes/rows.php';
            }
        }
    }
}
?>

<tr>
<td>Обща сума</td>
<td>   </td>
<td><?php echo $sum; ?></td>
<td>   </td>
</tr>
</table>
<?php 

include './includes/footer.php';
?>

