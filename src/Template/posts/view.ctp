<p><?php echo $postid->title;?></p>
<p><?php echo $postid->description;?></p>
<?php echo $this->html->link('Back',['action'=>'index'],
    ['class'=>'btn btn-primary']
);?>
