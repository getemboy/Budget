<?php 
mb_internal_encoding('UTF-8');

$title = "Форма";

require_once './includes/header.php';

if ($_POST) {
//echo '<pre>'.print_r($_FILES, true) . '</pre>';
    if (count($_FILES)>0) {
        if (move_uploaded_file($_FILES['picture']['tmp_name'], 'pictures'.DIRECTORY_SEPARATOR.$_FILES['picture']['name'])) {
            echo "Файлът е качен успешно";
        }
    }
$date = date("Y/m/d");
$name = trim($_POST['name']);
$name = str_replace('!', '', $name);
$amount = $_POST['amount'];
$amount = str_replace('!', '', $amount);
$amount = str_replace(',', '.', $amount);
$amount = (float)$amount;
$selectedGroup = (int)$_POST['group'];
$error = FALSE;

if(mb_strlen($name) < 2) {
    echo '<p>Името е праклено късо </p>';
    $error = TRUE;
}

if(mb_strlen($amount) < 1 || mb_strlen($amount) > 6) {
    echo '<p>Въвели сте нереална сума</p>';
    $error = TRUE;
}

if (!array_key_exists($selectedGroup, $groups)) {
    echo '<p>Невалидна група</p>';    
    $error = TRUE;
}

if(!$error) {
    $result = $date. '!'.  $name. '!'.$amount. '!'. $selectedGroup. "\n";
    echo $result , PHP_EOL;
    file_put_contents('data.txt', $result, FILE_APPEND);
    echo 'Запис';
}}

?>
<a href="index.php">Списък</a>

<form method = "POST" enctype="multipart/form-data">
	<div> Име:<input type="text" name="name" /> </div>
	<div> Сума:<input type="text" name="amount" /> </div>
	<div> Снимка:<input type="file" name="picture" /> </div>
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