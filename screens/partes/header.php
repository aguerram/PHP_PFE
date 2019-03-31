<nav class="navbar  navbar-expand-lg navbar-light bg-light shadow-sm ">
    <a class="navbar-brand" href="<?= $env['link'] ?>"><img style="height: 52px" src="<?= assets("img/logo.png") ?> "/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link <?= $route == "home" ? "active" : "" ?>" href="<?= $env['link'] ?>">Home</a>
            </li>


            <li class="nav-item">
                <a class="nav-link <?= $route == "contact" ? "active" : "" ?>"
                   href="<?= route("contact") ?>">Contact</a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Evenements
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= route('eventsort/tout') ?>"><i class="fa fa-calendar-o"
                                                                                          aria-hidden="true"></i>
                            Tout</a>
                        <a class="dropdown-item" href="<?= route('eventsort/art') ?>"><i class="fa fa-calendar-o"
                                                                                         aria-hidden="true"></i> Art</a>
                        <a class="dropdown-item" href="<?= route('eventsort/festival') ?>"><i class="fa fa-calendar-o"
                                                                                              aria-hidden="true"></i>
                            Festival</a>
                        <a class="dropdown-item" href="<?= route('eventsort/sport') ?>"><i class="fa fa-calendar-o"
                                                                                           aria-hidden="true"></i> Sport</a>
                        <a class="dropdown-item" href="<?= route('eventsort/music') ?>"><i class="fa fa-calendar-o"
                                                                                           aria-hidden="true"></i>
                            Musique</a>
                    </div>
                </li>
            <?php
            if ($loggedin) {
                ?>

                
                <?php
                if ($loggedin) { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $route == "tdb" ? "active" : "" ?>" href="<?= $env['link'] ?>?route=tdb">Tableau
                            de
                            bord</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item" id="countmsgcontainer" style="display: none">
                    <a class="nav-link" href="<?= route('tdb') ?>" tabindex="-1" aria-disabled="true">
                        <i class="fa fa-globe"></i><span class="badge badge-pill badge-primary" id="countmsg"></span>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link <?= $route == "login" ? "active" : "" ?>" href="<?= route("login") ?>"><i
                                class="fa fa-user" aria-hidden="true"></i> Se connecter</a>
                </li>
                <?php
            }
            ?>

        </ul>
        <form action="<?= route('search') ?>" method="post" class="form-inline my-2 my-lg-0">
            <input name="s" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php if($loggedin): ?>
        <ul class="navbar-nav">
            <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Paramètres
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= route('profile/' . $id) ?>"><i class="fa fa-user"
                                                                                      aria-hidden="true"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="signout" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Déconnexion</a>
                </div>
                <script>
                    $("#signout").click(function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "<?=api("signout") ?>",
                            type: "post",
                            success: function (da) {
                                if (da.success)
                                    location.href = da.location;
                            }
                        })
                    })
                </script>
            </li>
        </ul>
        <?php endif; ?>
    </div>

</nav>
<script>
    $.ajax({
        type: "post",
        url: "<?= api('countComments') ?>",
        success: function (data) {
            if (data.success) {
                $("#countmsg").text(data.data);
                if (data.data > 0) {
                    $("#countmsgcontainer").show();
                }

            }
        }
    })
    function search(e) {
        e.preve
        alert("fdf");
    }
</script>