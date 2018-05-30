<h1><?=$data['title']?></h1>

<?php foreach ($data['posts'] as $post) {?>
<h3><a href="post/<?=$post->slug?>"><?=$post->title?></a></h3>
<p><b><?=$post->created?></b></p>
<p><?=$post->data?></p>
<hr>
<?php }
;?>
