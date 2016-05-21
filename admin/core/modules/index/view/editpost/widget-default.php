<?php
$post = PostData::getById($_GET["id"]);
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar Anuncio
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                  <a href="./?view=index"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                  <a href="./?view=posts"><i class="fa fa-file"></i> Anuncios</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-asterisk"></i> Editar Anuncio
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form role="form" method="post" action="./?action=updatepost" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" name="title" value="<?php echo $post->title;?>" class="form-control" placeholder="Escriba titulo">
                            </div>

<div class="form-group">
                                <label>Imagen destacada</label>
                                <input type="file" name="image">
<?php if($post->image_id!=null):
$image = ImageData::getById($post->image_id);
?>
<br>
<img src="storage/images/<?php echo $image->src;?>" class="img-responsive img-thumbnail" style="width:180px;">
<?php endif;?>

                            </div>

                            <div class="form-group">
                                <label>Contenido</label>
                                <textarea class="form-control"  placeholder="Escriba contenido" rows="10" name="content"><?php echo $post->content;?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" name="address" value="<?php echo $post->address;?>" class="form-control" placeholder="Escriba Direccion">
                            </div>
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" name="phone" value="<?php echo $post->phone;?>" class="form-control" placeholder="Escriba Telefono">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $post->email;?>" class="form-control" placeholder="Escriba Email">
                            </div>

<div class="form-group">
                                <label>&nbsp;</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="use_map" <?php if($post->use_map){ echo "checked"; }?>> Usar Mapa
                                </label>
                                
                            </div>

                            <div class="form-group">
                                <label>Mapa</label>

<fieldset class="gllpLatlonPicker">
    <div class="gllpMap"></div>
    <input type="hidden" name="lat" class="gllpLatitude" value="<?php echo $post->lat;?>"/>
    <input type="hidden" name="lng" class="gllpLongitude" value="<?php echo $post->lng; ?>"/>
    <input type="hidden" class="gllpZoom" value="4"/>
  </fieldset>
                            </div>


<div class="form-group">
                                <label>Categorias</label>
                                <?php
                                    $cats = CategoryData::getAll();
                                    $asigs = PostCategoryData::getAllByPostId($post->id);
                                ?>
                                <?php if(count($cats)>0):?>
                                    <?php foreach($cats as $cat):
                                    $selected = "";
                                    foreach ($asigs as $asig ) {
                                        if($asig->category_id==$cat->id){
                                            $selected="checked";
                                            break;
                                        }
                                    }


                                    ?>
                                <label >
                                    <input type="checkbox" name="category_id[]" value="<?=$cat->id;?>" <?=$selected;?>> <?=$cat->name;?>
                                </label>
                                <?php endforeach;?>
                                <?php endif;?>
                            </div>
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="is_public" <?php if($post->is_public){ echo "checked";}?>> Publicar
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="accept_comments" <?php if($post->accept_comments){ echo "checked";}?>> Aceptar comentarios
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="show_image" <?php if($post->show_image){ echo "checked";}?>> Mostrar imagen destacada
                                </label>

                            </div>
                            <input type="hidden" name="id" value="<?=$post->id;?>">
                            <button type="submit" class="btn btn-primary">Actualizar</button>

                        </form>

                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <!-- /.row -->
<br><br><br><br><br>