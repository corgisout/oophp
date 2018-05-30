
<?php



if (!$resultset) {
    return;
}

 ?>
 <div class="sub-navbar">
 <a href="<?= url('movies/movies') ?>">All movies</a>
 <a href="<?= url('movies/search-movies') ?>">Search movies by Title</a>
 <a href="<?= url('movies/search-year') ?>">Search movies by Year</a>
 <a href="<?= url('movies/add-movie') ?>">Add movie</a>
 </div>

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
         <td><img class="thumb" src="<?= $row->image ?>"></td>
         <td><?= $row->title ?></td>
         <td><?= $row->year ?></td>
     </tr>
 <?php endforeach; ?>
 </table>
