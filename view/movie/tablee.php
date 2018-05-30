<?php
namespace Anax\View;

?>

<table>
    <tr class="first">
         <th>Rad</th>
         <th>Id</th>
         <th>Bild</th>
         <th>Titel</th>
         <th>År</th>
    </tr>
    <?php $id = -1; foreach ($resultset as $row) :
        $id++;
    ?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td> <img width="125px" src="<?= $this->asset($row->image); ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
        <td><a href="<?= $this->url('movies/edit?id=' . $row->id) ?>">Edit</a> | <a href="<?= $this->url('movies/delete-movie?id=' . $row->id) ?>">Delete</a></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
