<?php
include '../php/list.php'
?>
<?php
while ($row = $resul_set->fetch_assoc()){
?>
<tr>
    <th scope="row"><?= $row['user_id'] ?></th>
    <td><?= $row['title'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['x'] ?></td>
    <td><?= $row['y'] ?></td>
</tr>
<tr>
    <?php
    }
    ?>
