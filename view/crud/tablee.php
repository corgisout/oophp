<table style="font-size: 12px">
<thead>
<th>Id</th>
<th>Title</th>
<th>Type</th>
<th>Path</th>
<th>Slug</th>
<th>Published</th>
<th>Created at</th>
<th>Updated at</th>
<th>Deleted</th>
<th>Action</th>
</thead>
<tbody>
<?php foreach ($res as $row) {?>
<tr>
<td><?=$row->id?></td>
<td><?=$row->title?></td>
<td><?=$row->type?></td>
<td><?=$row->path?></td>
<td><?=$row->slug?></td>
<td><?=$row->published?></td>
<td><?=$row->created?></td>
<td><?=$row->updated?></td>
<td><?=$row->deleted?></td>
<td><a href="delete?id=<?=$row->id?>">Delete</a>| <a href="edit?id=<?=$row->id?>">Edit</a></td>
</tr>
<?php }
;?>
</tbody>
</table>
