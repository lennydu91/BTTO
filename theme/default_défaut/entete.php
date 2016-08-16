<header>
    <div id="loginBar">
        <div class="pageWidth">
            <div class="pageContent">
                <h3 id="loginBarHandle">
                    <label for="LoginControl"><a class="concealed noOutline">S'identifier ou s'inscrire</a></label>
                </h3>

                <span class="helper"></span>


            </div>
        </div>
    </div>
    <div id="header">
        <div id="logoBlock">
            <div class="pageWidth">
                <div class="pageContent">




                    <div class="socialicons hiddenResponsiveNarrow">
                        <ul>
                            <li><a href="https://www.facebook.com/btto.fr/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/BTTO_Mc"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>

                    <div id="logo"><a href="http://btto.fr/">
                            <span></span>

                            BackToThe<span>Origin</span>

                        </a></div>

                    <span class="helper"></span>
                </div>
            </div>
        </div>


        <div id="navigation" class="pageWidth withSearch">
            <div class="pageContent">
                <nav>

                    <div class="navTabs">
                        <ul class="publicTabs">

                            <!-- home -->
                            <!--<li class="navTab articles selected">
                                <a href="index.html" class="navLink">Accueil</a>
                                <a href="index.html" class="SplitCtrl" rel="Menu"><i class="fa fa-bars"></i></a>
                            </li>-->
                            <?php
                            for($i = 0; $i < count($_Menu_['MenuTexte']); $i++) {
                                if (isset($_Menu_['MenuListeDeroulante'][$_Menu_['MenuTexteBB'][$i]])) {/*
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
                                */
                                } // Si le lien n'est pas un menu déroulant, on l'affiche tout simplement, ou presque, il faut prévoir que si on est sur la page du lien, le lien doit être en foncé (class="active" fonction bootstrap.
                                else {
                                    // Cette variable contient la valeur du lien de la puce(on enlève donc ?&page= en le remplaçant par '' et on garde que la fin.
                                    $quellePage = strtolower($_Menu_['MenuName'][$i]);

                                    // Si le Get actuel est égal à la variable de la ligne précédente, la puce est active.
                                    if (isset($_GET['page']) AND $quellePage == $_GET['page'])
                                        $active = 'class="navTab articles selected"';

                                    elseif (!isset($_GET['page']) AND $i == 0)
                                        $active = 'class="navTab articles selected"';

                                    // On prévoit que quand il n'y a rien à afficher, la var est vide pour éviter l'erreur.
                                    else $active = 'class="navTab forums Popup PopupControl PopupClosed"';

                                    // On affiche enfin la puce !
                                    echo '
                                    <li ' . $active . '>
                                        <a href="' . $_Menu_['MenuLien'][$i] . '" class="navLink">' . $_Menu_['MenuTexte'][$i] . '</a>
                                        <a href="" class="SplitCtrl" rel="Menu"><i class="fa fa-bars"></i></a>
                                        <div class="tabLinks membersTabLinks">
                                        </div>
                                    </li>';
                                            if (isset($_Joueur_)) {
                                                if ($_Joueur_['rang'] == 1)
                                            echo '
                                                <li class="navTab forums Popup PopupControl PopupClosed">
                                                    <a href="admin.php" class="navLink">Administration</a>
                                                    <a href="" class="SplitCtrl" rel="Menu"><i class="fa fa-bars"></i></a>
                                                    <div class="tabLinks membersTabLinks">
                                                    </div>
                                                </li>';
                                    }}}?>
                        </ul>
                    </div>
                    <span class="helper"></span>
                </nav>
            </div>
        </div>

        <div id="searchBar" class="pageWidth">

            <span id="QuickSearchPlaceholder" title="Rechercher"><i class="fa fa-search"></i></span>
            <fieldset id="QuickSearch">
                <form action="http://btto.fr/forum/index.php?search/search" method="post" class="formPopup">

                    <div class="primaryControls">
                        <!-- block: primaryControls -->
                        <input type="search" name="keywords" value="" class="textCtrl" placeholder="Rechercher..." title="Entrez votre recherche et appuyez sur entrer" id="QuickSearchQuery" />
                        <!-- end block: primaryControls -->
                    </div>

                    <div class="secondaryControls">
                        <div class="controlsWrapper">

                            <!-- block: secondaryControls -->
                            <dl class="ctrlUnit">
                                <dt></dt>
                                <dd><ul>
                                        <li><label><input type="checkbox" name="title_only" value="1"
                                                          id="search_bar_title_only" class="AutoChecker"
                                                          data-uncheck="#search_bar_thread" /> Rechercher par titre uniquement</label></li>
                                    </ul></dd>
                            </dl>

                            <dl class="ctrlUnit">
                                <dt><label for="searchBar_users">Posté par un membre:</label></dt>
                                <dd>
                                    <input type="text" name="users" value="" class="textCtrl AutoComplete" id="searchBar_users" />
                                    <p class="explain">Séparer les noms avec une virgule.</p>
                                </dd>
                            </dl>

                            <dl class="ctrlUnit">
                                <dt><label for="searchBar_date">Plus récent que:</label></dt>
                                <dd><input type="date" name="date" value="" class="textCtrl" id="searchBar_date" /></dd>
                            </dl>


                        </div>
                        <!-- end block: secondaryControls -->

                        <dl class="ctrlUnit submitUnit">
                            <dt></dt>
                            <dd>
                                <input type="submit" value="Rechercher" class="button primary Tooltip" title="Trouver maintenant" />
                                <div class="Popup" id="commonSearches">
                                    <a rel="Menu" class="button NoPopupGadget Tooltip" title="Recherches utiles" data-tipclass="flipped"><span class="arrowWidget"></span></a>
                                    <div class="Menu">
                                        <div class="primaryContent menuHeader">
                                            <h3>Recherches utiles</h3>
                                        </div>
                                        <ul class="secondaryContent blockLinksList">
                                            <!-- block: useful_searches -->
                                            <li><a href="index1c7e.html?find-new/posts&amp;recent=1" rel="nofollow">Messages récents</a></li>

                                            <!-- end block: useful_searches -->
                                        </ul>
                                    </div>
                                </div>
                                <a href="index19b2.html?search/" class="button moreOptions Tooltip" title="Recherche avancée">Plus...</a>
                            </dd>
                        </dl>

                    </div>
                </form>
            </fieldset>

        </div>
    </div>
</header>