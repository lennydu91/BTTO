<style>
a.tooltips2 {
  position: relative;
  display: inline;
}
a.tooltips2 span {
  position: absolute;
  width:140px;
  color: #FFFFFF;
  background: #000000;
  border: 2px solid #6D6D6D;
  height: 37px;
  line-height: 37px;
  text-align: center;
  visibility: hidden;
  border-radius: 8px;
  box-shadow: -1px 0px 6px #000000;
}
a.tooltips2 span:before {
  content: '';
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -12px;
  width: 0; height: 0;
  border-top: 12px solid #6D6D6D;
  border-right: 12px solid transparent;
  border-left: 12px solid transparent;
}
a.tooltips2 span:after {
  content: '';
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -8px;
  width: 0; height: 0;
  border-top: 8px solid #000000;
  border-right: 8px solid transparent;
  border-left: 8px solid transparent;
}
a:hover.tooltips2 span {
  visibility: visible;
  opacity: 1;
  bottom: 40px;
  left: 70%;
  margin-left: -76px;
  z-index: 999;
  height: 41px;
}
</style>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="overflow: hidden;width: 100%;margin: 0 auto 30px auto;position: relative;height: 400px;margin-top: -20px;border-bottom: 4px solid #e74c3c;">
							<ol class="carousel-indicators" style="bottom: 0px;">
							<?php for($i = 0; $i < $iSliders; $i++) { ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
							<?php } ?>
							</ol>

							<div class="carousel-inner">
							<?php for($i = 0; $i < $iSliders; $i++) { ?>
								<div class="item <?php if($i == 0) echo 'active'; ?>">
									<img src="theme/upload/slider/<?php echo $sliders[$i]['image']; ?>" style="overflow: hidden;width: 100%;margin: 0 auto 30px auto;height: 420px;" alt="L'image charge :p Si ce message reste trop longtemps, rechargez votre navigateur !">
									<div class="carousel-caption">
										<span style="font-family: Minecraftia;font-weight: 300;"><?php echo $sliders[$i]['message']; ?></span>
									</div>
								</div>
							<?php } ?>
						  </div>

								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
	<div class="container" style="border-left: 2px solid rgba(255, 0, 0, 0.12);border-right: 2px solid rgba(255, 0, 0, 0.12);">
	        	<div class="row">
						<?php for($i = 0; $i < 3; $i++)
						{ ?>
						<div class="col-md-4 col-sm-6">
						<div class="service-wrapper" style="border-radius:0px">
						<center>
							<img class="img-thumbnail" src="theme/upload/navRap/<?php echo $lectureAccueil['Infos'][$i]['image']; ?>" alt="Erreur" style="width: 350px; height: 160px;">	
							</br>
							<p><strong><?php echo $lectureAccueil['Infos'][$i]['message']; ?></strong></p>
							<p><a class="btn btn-default" href="<?php echo $lectureAccueil['Infos'][$i]['lien']; ?>" role="button">Aller »</a></p>
						</center>
						</div>
						</div>
						<?php } ?>
					</div>

		<div class="row">
		<h1 class="titre"><center>Informations:</center></h1>
				<?php
				$i = 0;
				if(isset($news))
					while($i < count($news))
					{
					?>	
						<div class="panel panel-primary" style="border-radius:0px;margin-left: 5px;margin-right: 5px;">
							<div class="panel-heading" style="font-family: Minecraftia;font-size: 18px;border-radius:0px"><center><?php echo $news[$i]['titre']; ?></center>
							<a class="tooltips2 pull-right" style="font-family: minecraftia; margin-top: -25px;font-size: 13px;" href="index.php?&page=profil&profil=<?php echo $news[$i]['auteur']; ?>"><img src="http://api.craftmywebsite.fr/skin/face.php?u=<?php echo $news[$i]['auteur']; ?>&s=32&v=front" alt="none" /><span> <?php echo $news[$i]['auteur']; ?></span></a>				
							</div>
							<div class="panel-body"><?php echo $news[$i]['message']; ?></div>	
							<div class="panel-footer"><?php echo 'Posté le '.date('d/m/Y', $news[$i]['date']).' &agrave; '.date('H:i:s', $news[$i]['date']); ?> par <strong><a href="index.php?&page=profil&profil=<?php echo $news[$i]['auteur']; ?>"><?php echo $news[$i]['auteur']; ?></a></strong></div>							
						</div>
					<?php $i++; }
				else
					echo '<div class="alert alert-warning">Aucune news n\'a été crée à ce jour...</div>'; ?>
		</div>
	</div>