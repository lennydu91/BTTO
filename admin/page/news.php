<h1><center><strong>Gestion des news du site</strong></center></h1>

<div class="alert alert-dismissable alert-success"><center>Les news sont visibles sur l'accueil, elles informent vos joueurs des nouveautées relatives à votre communautée, pensez à rédiger des news souvent cela prouve votre activité, ça fait toujours plaisir à un joueur de voir un nouveau message!</center></div>

<h3><center>Créer une news</center></h3>
<div class="alert alert-dismissable alert-success"><center>Pour ajouter une news, rien de plus simple, il suffit en effet de lui attribuer un titre, et... Un message !</center></div>

<form method="POST" action="?&action=postNews">

    <div class="form-group">
        <label class="control-label">Titre de la news</label>
        <div >
            <input type="text" name="titre" class="form-control" placeholder="ex: Sortie du launcher !">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Contenu de la news</label>
        <div >
            <textarea id="news_1" name="message" style="height: 275px; margin: 0px; width: 100%;"></textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Envoyer" />

</form>

<div class="alert alert-dismissable alert-success"><center>Sachez que le CMS n'affiche que les 10 dernières news, les anciennes disparaitrons donc au fur et à mesure. Je vous conseille de garder les vieilles news et de supprimer que les fails !</center></div>

</form>

<?php if(!empty($tableauNews)) { ?>
    <h3><center>Editer une news</center></h3>



<ul class="nav nav-tabs">
    <?php for($i = 0; $i < count($tableauNews); $i++) { ?>
    <li><a <?php if($i == 0) echo 'class="active"'; ?> href="#news<?php echo $tableauNews[$i]['id']; ?>" data-toggle="tab"><?php echo $tableauNews[$i]['titre']; ?></a></li>
    <?php     } ?>
</ul>


<div class="tab-content">
    <?php for($i = 0; $i < count($tableauNews); $i++) { ?>
     <div class="tab-pane <?php if($i == 0) echo 'active'; ?>" id="news<?php echo $tableauNews[$i]['id']; ?>">

         <form method="POST" action="?&action=editNews&id=<?php echo $tableauNews[$i]['id']; ?>" class="well">
             
            <div class="row">
                <div class="form-group col-md-8">
                        <label>Titre de la news</label>
                        <input type="text" class="form-control" name="titre" value="<?php echo $tableauNews[$i]['titre']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Supprimer la news définitivement</label>
                    <a href="?action=supprNews&newsId=<?php echo $tableauNews[$i]['id']; ?>" class="btn btn-danger form-control">Supprimer la News</a>
                </div>
            </div>
            <?php echo '<textarea id="news_' . $tableauNews[$i]['id'] . 'C" name="message" style="height: 275px; margin: 0px; width: 100%;">' . $tableauNews[$i]['message'] . '</textarea>';?>
            <?php echo '<script type ="text/javascript"> CKEDITOR.replace( \'news_' . $tableauNews[$i]['id'] . 'C\' ); </script>';?>
            <hr>
            <input type="submit" class="btn btn-success" value="Modifer le message" />
</form>

     </div>
     <?php     } ?>
</div>
<?php } ?>
   
   

</br>
</br>
<script type="text/javascript">
    CKEDITOR.replace( 'news_1' );
</script>