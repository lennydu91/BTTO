<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Activer navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#"><?php echo $_Serveur_['General']['name']; ?></a>
	</div>
	<div id="navbar" class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<?php
		for($i = 0; $i < count($_Menu_['MenuTexte']); $i++)
			{
				// Si il y a une listé déroulante contenant le texte du texte de ce tour de boucle, le lien devient un menu déroulant.
				if(isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]))
				{/*
					// On affiche la structure de base du menu déroulant de Bootstrap :
					?>
					<li class="dropdown"><a href="<?php echo $_Menu_['MenuLien'][$i]; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_Menu_['MenuTexte'][$i]; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php
				
					// On affiche la puce dans le menu déroulant depuis une boucle, qui fait autant de tour qu'il y a de lignes à afficher dans la liste déroulante.
					for($k = 0; $k < count($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]]); $k++)
					{
						// Dans le cas où le texte de la puce vaut "-divider-", on met une ligne de division à la place du texte (fonctionnalité css de bootstrap). 
						
						if($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == 'LastLinkDontDelete'){
							
						}elseif($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k] == '-divider-')
						{
							echo'<li class="divider"></li>';
						}
						// Sinon on met un lien avec texte + adresse.
						else
						{
							echo '<li><a href="' .$_Menu_['MenuListeDeroulanteLien'][$_Menu_['MenuTexteBB'][$i]][$k]. '" style="font-weight: 600;color: #4f8db3;">' .$_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]][$k]. '</a></li>';
						}
					}
					
					// On ferme la liste du déroulant, et on remonte à la premiere boucle :p.
					?>
					</ul>	
					</li>
					<li class="divider-vertical"></li>
				<?php
				*/}
				
				// Si le lien n'est pas un menu déroulant, on l'affiche tout simplement, ou presque, il faut prévoir que si on est sur la page du lien, le lien doit être en foncé (class="active" fonction bootstrap.
				else
				{
					// Cette variable contient la valeur du lien de la puce(on enlève donc ?&page= en le remplaçant par '' et on garde que la fin.
					$quellePage = str_replace('index.php?&page=', '', $_Menu_['MenuLien'][$i]);
					
					// Si le Get actuel est égal à la variable de la ligne précédente, la puce est active.
					if(isset($_GET['page']) AND $quellePage == $_GET['page']) 
						$active = ' class="active"';
					
					// Si il n'y a pas de get(on est donc sur l'index) et qu'on est au premier tour de boucle --> le premier lien(souvent un lien vers l'accueil justement) est actif (foncé).
					elseif(!isset($_GET['page']) AND $i == 0) 
						$active = ' class="active"';
					
					// On prévoit que quand il n'y a rien à afficher, la var est vide pour éviter l'erreur.
					else $active = '';
					
					// On affiche enfin la puce ! 
					echo '<li' .$active. '><a href="' .$_Menu_['MenuLien'][$i]. '">' .$_Menu_['MenuTexte'][$i]. '</a></li>';
				}
			}
		?>
	  </ul>
	</div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->