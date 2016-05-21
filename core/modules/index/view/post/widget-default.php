<?php
$post=PostData::getById($_GET["id"]);
$comments = CommentData::getApprovedByPostId($post->id);
Viewer::addView($post->id,"post_id","post_view");
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
		<h1><?php echo $post->title;?></h1>
	<hr>
<?php if($post->show_image&&$post->image_id!=null):
$image = ImageData::getById($post->image_id);
?>
<br>
<img src="admin/storage/images/<?php echo $image->src;?>" style='width:80px;' class="img-responsive img-thumbnail">
<?php endif;?>
<div class="clearfix"></div>
<div class="lead">
		<?php echo nl2br($post->content);?>
<br><br>    <ul>
    <li>
    <?php if($post->address!=""):?>
      <?php echo $post->address; ?>
    <?php else:?>
      Direccion no definida
    <?php endif;?>
    </li>
    <li>
    <?php if($post->phone!=""):?>
      <?php echo $post->phone; ?>
    <?php else:?>
      Telefono no definido
    <?php endif;?>
    </li>
    <li>
    <?php if($post->email!=""):?>
      <?php echo $post->email; ?>
    <?php else:?>
      Email no definido
    <?php endif;?>
    </li>
    </ul>
</div>

<?php if($post->use_map):?>
<fieldset class="gllpLatlonPicker">
    <div class="gllpMap"></div>
    <input type="hidden" name="lat" class="gllpLatitude" value="<?php echo $post->lat;?>"/>
    <input type="hidden" name="lng" class="gllpLongitude" value="<?php echo $post->lng; ?>"/>
    <input type="hidden" class="gllpZoom" value="4"/>
  </fieldset>
<?php endif;?>
		<br><br>
<?php if(count($comments)>0):?>
<h4>Comentarios (<?php echo count($comments)?>)</h4>
<ul class="media-list">
<?php foreach($comments as $comment):
$answers = CommentData::getApprovedByCommentId($comment->id);
?>
  <li class="media">
    <div class="media-body">
      <h4 class="media-heading"><?php echo $comment->name;?></h4>
      <p><?php echo $comment->content; ?></p>
<?php if(count($answers)>0):?>
<?php foreach($answers as $answer):
?>

  <div class="media">
    <div class="media-body">
      <h4 class="media-heading"><?php echo $answer->name;?></h4>
      <p><?php echo $answer->content; ?></p>
    </div>
  </div>

<?php endforeach; ?>
<?php endif; ?>

    </div>

  </li>

<?php endforeach; ?>
</ul>
<?php endif;?>
		<h4>Deja un comentario</h4>
<form role="form" method="post" action="./?action=addcomment">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Correo Electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Comentario</label>
    <textarea class="form-control" name="comment" required rows="4" placeholder="Escribe tu comentario ..."></textarea>
  </div>
  <input type="hidden" name="post_id" value="<?=$post->id;?>">
  <button type="submit" class="btn btn-default">Enviar comentario</button>
</form>


		<br><br>

		</div>
<div class="col-md-3">
		<?php Action::execute("widgets",array());?>
		</div>
	</div>
	
</div>
</div>