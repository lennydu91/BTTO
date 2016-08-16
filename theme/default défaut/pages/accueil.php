<?php /*?><div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i = 0; $i < $iSliders; $i++) { ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
        <?php } ?>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php for($i = 0; $i < $iSliders; $i++) { ?>
            <div class="item <?php if($i == 0) echo 'active'; ?>">
                <img class="first-slide" src="theme/upload/slider/<?php echo $sliders[$i]['image']; ?>" alt="L'image charge :p Si ce message reste trop longtemps, rechargez votre navigateur !">
                <div class="container">
                    <div class="carousel-caption">
                        <?php if($i == 0); ?>
                        <h1>Example headline.</h1>
                        <p><?php echo $sliders[$i]['message']; ?></p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        <?php if($i == 1); ?>
                        <h1>Example headline.</h1>
                        <p><?php echo $sliders[$i]['message']; ?></p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        <?php if($i == 2); ?>
                        <h1>Example headline.</h1>
                        <p><?php echo $sliders[$i]['message']; ?></p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>
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
</div> <?php */?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="theme/upload/slider/<?php echo $sliders[0]['image']; ?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $sliders[0]['titre']; ?></h1>
                    <p><?php echo $sliders[0]['message']; ?></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="theme/upload/slider/<?php echo $sliders[1]['image']; ?>" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $sliders[1]['titre']; ?></h1>
                    <p><?php echo $sliders[1]['message']; ?></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="theme/upload/slider/<?php echo $sliders[2]['image']; ?>" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $sliders[2]['titre']; ?></h1>
                    <p><?php echo $sliders[2]['message']; ?></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
