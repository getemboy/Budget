<?php
echo  '<tr>
<td>'.$columns[0].'</td>
<td>'.$columns[1].'</td>
<td>'.$columns[2].'</td>
<td>'.$groups[trim($columns[3])].'</td>
<td> <a href = "mod.php"> Редактиране</a> </td>
</tr>';
$sum += $columns[2];