<div class="shadow-sm mt-5 p-2 bg-white fullheight">
    <div class="row ">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fa fa-comment"></i> Commentaires <span class="badge badge-pill badge-warning" id="numbercmnts"></span></a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-add" role="tab" aria-controls="profile"><i class="fa fa-plus"></i> Ajouter article</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#event-add" role="tab" aria-controls="profile"><i class="fa fa-plus"></i> Ajouter Evenement</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list-sd" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fa fa-list"></i> Les articles</a>
                <a class="list-group-item list-group-item-action" id="list-events-user" data-toggle="list" href="#list-evenements" role="tab" aria-controls="messages"><i class="fa fa-list"></i> Les événements</a>

                <?php
                if ($isadmin) {
                        ?>
                <!--  ADMIN -->
                <br>
                <div class="list-group-item list-group-item-danger disabled" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fa fa-lock" aria-hidden="true"></i> Admin
                </div>

                <a class="list-group-item list-group-item-action" id="list-articles-list" data-toggle="list" href="#list-articles" role="tab" aria-controls="messages">Tous les articles</a>
                <a class="list-group-item list-group-item-action" id="list-members-list-click" data-toggle="list" href="#list-members" role="tab" aria-controls="messages"><i class="fa fa-users" aria-hidden="true"></i> Tous les members</a>
                <a class="list-group-item list-group-item-action" id="list-events-click" data-toggle="list" href="#list-events-admin-tab" role="tab" aria-controls="messages"><i class="fa fa-calendar-o" aria-hidden="true"></i> Tous les évènements</a>
                <a class="list-group-item list-group-item-action" id="list-contact-click" data-toggle="list" href="#list-contact" role="tab" aria-controls="messages"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact messages</a>

                <?php

            }
        ?>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div id="comments" class="list-group">
                    </div>
                </div>
                <!-- 
                    ADD ARTICLE
                 -->
                <div class="tab-pane fade" id="list-add" role="tabpanel" aria-labelledby="list-profile-list">
                    <div>
                        <form id="addArticle" action="<?= $env['link'] ?>api/addArticle.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Titre</label>
                                <input required type="text" name="titre" id="" class="form-control" placeholder="Titre" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Type d'article</label>
                                <select class="form-control" name="type" id="">
                                    <option value="MONUMENTS HISTORIQUES">MONUMENTS HISTORIQUES</option>
                                    <option value="PLACE TOURISTIQUE">PLACE TOURISTIQUE</option>
                                    <option value="HOTEL">HOTEL</option>
                                    <option value="RESTAURANT">RESTAURANT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Contenu</label>
                                <textarea required class="form-control" name="contenu" id="" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Historique</label>
                                <textarea class="form-control" name="historique" id="" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Coordonnée X</label>
                                <input step="0.01" type="number" class="form-control" name="cordx" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Coordonnée Y</label>
                                <input step="0.01" type="number" class="form-control" name="cordy" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input required accept="image/*" type="file" class="form-control-file" name="image" id="" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                Enregistrer
                            </button>
                            <br>
                            <div id="msgAddArticle"></div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="event-add" role="tabpanel" aria-labelledby="list-profile-list">
                    <div>
                        <form id="addEvent" action="<?= $env['link'] ?>api/addEvent.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Titre</label>
                                <input required type="text" name="titre" id="" class="form-control" placeholder="Titre" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Type de l'evenement</label>
                                <select class="form-control" name="type" id="">
                                    <option value="art">Art</option>
                                    <option value="sport">Sport</option>
                                    <option value="music">Musique</option>
                                    <option value="festival">Festival</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Date de départ</label>
                                <input type="date" required name="datedepart" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Date de fin</label>
                                <input type="date" required name="datefin" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea required class="form-control" name="desc" id="" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Coordonnée X</label>
                                <input step="0.01" type="number" class="form-control" name="cordx" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Coordonnée Y</label>
                                <input step="0.01" type="number" class="form-control" name="cordy" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input required accept="image/*" type="file" class="form-control-file" name="image" id="" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                Enregistrer
                            </button>
                            <br>
                            <div id="msgAddArticle"></div>
                        </form>
                    </div>
                </div>

                <!-- 
                    LIST DES ARTICLE
                 -->
                 <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coordonnées</th>
                                <th scope="col">Image</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="member_articles">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-evenements" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coordonnées</th>
                                <th scope="col">Image</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="member_events">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-articles" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coordonnées</th>
                                <th scope="col">Image</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="all_articles">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-events-admin-tab" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coordonnées</th>
                                <th scope="col">Image</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="all_events">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-members" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date ne</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="all_members">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-contact" role="tabpanel" aria-labelledby="list-messages-list">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody id="all_contact">

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function imageErr(image) {
        image.onerror = "";
        image.src = "<?= $env['link'] ?>/assets/img/no_image.png";
        return true;
    }
    $(function() {
        $("#addArticle").ajaxForm({
            success: function(data) {
                if (data.success) {
                    swal({
                        icon: "success",
                        text: data.msg
                    });
                    $("#addArticle")[0].reset();
                    setTimeout(function () {
                        location.reload()
                    },1000);
                } else {
                    swal({
                        icon: "error",
                        text: data.msg
                    })
                }
            },
            error: function(err) {
                swal({
                    icon: "error",
                    text: "Une erreur inattendue s'est produite"
                })
            }
        })

        $("#addEvent").ajaxForm({
            success: function(data) {
                if (data.success) {
                    swal({
                        icon: "success",
                        text: data.msg
                    });
                    $("#addEvent")[0].reset();
                    setTimeout(function () {
                        location.reload()
                    },1000);
                } else {
                    swal({
                        icon: "error",
                        text: data.msg
                    })
                }
            },
            error: function(err) {
                swal({
                    icon: "error",
                    text: "Une erreur inattendue s'est produite"
                })
            }
        })

        $.ajax({
            type: "post",
            url: "<?= api('getMemberComments') ?>",
            success: function(data) {
                if (data.success) {
                    data.data.forEach(function(e) {
                        var byuser = e['full_name'];
                        var attime = e['at'];
                        var contentcom = e['content'];
                        var checklink = '<?= api("validateComment") ?>?id=' + e['id'];
                        var trashlink = '<?= api("deleteComment") ?>?id=' + e['id'];
                        var btns = '<div class="btn-group"><a href="' + checklink + '"  class="btn btn-sm btn-success action-link"><i class="fa fa-check" aria-hidden="true"></i></a><a href="' + trashlink + '"  class="btn btn-sm btn-danger action-link"><i class="fa fa-trash" aria-hidden="true"></i></a></div>';
                        var html = '<div href="#" class="list-group-item list-group-item-action mt-1"><div class="d-flex w-100 justify-content-between "><h5 class="mb-1">' + byuser + '</h5><small>' + attime + '</small></div><p class="mb-1">' + contentcom + '</p>' + btns + '</div>';
                        $("#comments").append(html);
                    })

                    $("#numbercmnts").text(data.data.length);
                }
            }
        });

        $.ajax({
            type: "post",
            url: "<?= api('getArticles') ?>",
            data: {
                "member_id": true
            },
            success: function(data) {
                if (data.success) {
                    var storage = "<?= $env['storage'] ?>";
                    var api = "<?= api('actionOnArticle') ?>";
                    data.data.forEach(function(dt) {
                        var title = dt.TITRE_ARTICLE;
                        var type = dt.TYPE_ARTICLE;
                        var cordx = dt.CORDGEOX;
                        var cordy = dt.CORDGEOY;
                        var img = storage + dt.IMG_ARTICLE;
                        var id = dt.ID_ARTICLE;
                        var deletelink = api + "?id=" + id + "&action=delete&from=user";
                        var updatelink = "#";

                        var status = '<i class="fa fa-times text-danger"></i>';
                        if (dt.ACTIVE == 1) {
                            status = '<i class="fa fa-check text-success"></i>';
                        }
                        var showarticle = "<?= route('article/"+id+"') ?>";
                        var html = '<tr><th scope="row">' + id + '</th><td>' + title + '</td><td>' + type + '</td><td>' + cordx + ' / ' + cordy + '</td><td><img onerror="imageErr(this)" src="' + img + '" style="max-width:96px"/></td><td>' + status + '</td><td class="btn-group"><a href="' + showarticle + '" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a><a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td></tr>';
                        $("#member_articles").append(html);
                    })
                }

            }
        });


        $.ajax({
            type: "post",
            url: "<?= api('getContact') ?>",
            success: function(data) {
                if (data.success) {
                    var api = "<?= api('actionOnContact') ?>";
                    data.data.forEach(function(dt) {
                        var name = dt.name;
                        var email = dt.email;
                        var msg = dt.message;
                        var id = dt.id;
                        var deletelink = api + "?id=" + id + "&action=delete&from=user";
                        var updatelink = "#";

                        var html = '<tr><th scope="row">' + id + '</th><td>' + name + '</td><td>' + email + '</td><td>' + msg + '</td><td><a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td></tr>';
                        $("#all_contact").append(html);
                    })
                }

            }
        });

        $.ajax({
            type: "post",
            url: "<?= api('getEvents') ?>",
            data: {
                "member_id": true
            },
            success: function(data) {
                if (data.success) {
                    var storage = "<?= $env['storage'] ?>";
                    var api = "<?= api('actionOnEvent') ?>";
                    data.data.forEach(function(dt) {
                        var title = dt.titre;
                        var type = dt.type;
                        var cordx = dt.cordx;
                        var cordy = dt.cordy;
                        var img = storage + dt.image;
                        var id = dt.id;
                        var deletelink = api + "?id=" + id + "&action=delete&from=user";
                        var updatelink = "#";

                        var status = '<i class="fa fa-times text-danger"></i>';
                        if (dt.active == 1) {
                            status = '<i class="fa fa-check text-success"></i>';
                        }
                        var showarticle = "<?= route('event/"+id+"') ?>";
                        var html = '<tr><th scope="row">' + id + '</th><td>' + title + '</td><td>' + type + '</td><td>' + cordx + ' / ' + cordy + '</td><td><img onerror="imageErr(this)" src="' + img + '" style="max-width:96px"/></td><td>' + status + '</td><td class="btn-group"><a href="' + showarticle + '" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a><a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td></tr>';
                        $("#member_events").append(html);
                    })
                }

            }
        });
        $.ajax({
            type: "post",
            url: "<?= api('getArticles') ?>",
            success: function(data) {
                if (data.success) {
                    var storage = "<?= $env['storage'] ?>";
                    var api = "<?= api('actionOnArticle') ?>";
                    data.data.forEach(function(dt) {
                        var title = dt.TITRE_ARTICLE;
                        var type = dt.TYPE_ARTICLE;
                        var cordx = dt.CORDGEOX;
                        var cordy = dt.CORDGEOY;
                        var img = storage + dt.IMG_ARTICLE;
                        var id = dt.ID_ARTICLE;
                        var deletelink = api + "?id=" + id + "&action=delete&from=admin";
                        var updatelink = api + "?id=" + id + "&action=activate&from=admin";
                        var btnactivate = '<a href="' + updatelink + '" type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                        var status = '<i class="fa fa-times text-danger"></i>';
                        if (dt.ACTIVE == 1) {
                            status = '<i class="fa fa-check text-success"></i>';
                            btnactivate = '';
                        }
                        var showarticle = "<?= route('article/"+id+"') ?>";
                        var html = '<tr><th scope="row">' + id + '</th><td>' + title + '</td><td>' + type + '</td><td>' + cordx + ' / ' + cordy + '</td><td><img onerror="imageErr(this)" src="' + img + '" style="max-width:96px"/></td><td>' + status + '</td><td class="btn-group"><a href="' + showarticle + '" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a><a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>' + btnactivate + '</td></tr>';
                        $("#all_articles").append(html);
                    })
                }
            }
        });
        $.ajax({
            type: "post",
            url: "<?= api('getEvents') ?>",
            success: function(data) {
                if (data.success) {
                    var storage = "<?= $env['storage'] ?>";
                    var api = "<?= api('actionOnEvent') ?>";
                    data.data.forEach(function(dt) {
                        var title = dt.titre;
                        var type = dt.type;
                        var cordx = dt.cordx;
                        var cordy = dt.cordy;
                        var img = storage + dt.image;
                        var id = dt.id;
                        var deletelink = api + "?id=" + id + "&action=delete&from=admin";
                        var updatelink = api + "?id=" + id + "&action=activate&from=admin";
                        var btnactivate = '<a href="' + updatelink + '" type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                        var status = '<i class="fa fa-times text-danger"></i>';
                        if (dt.active == 1) {
                            status = '<i class="fa fa-check text-success"></i>';
                            btnactivate = '';
                        }
                        var showarticle = "<?= route('event/"+id+"') ?>";
                        var html = '<tr><th scope="row">' + id + '</th><td>' + title + '</td><td>' + type + '</td><td>' + cordx + ' / ' + cordy + '</td><td><img onerror="imageErr(this)" src="' + img + '" style="max-width:96px"/></td><td>' + status + '</td><td class="btn-group"><a href="' + showarticle + '" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a><a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>' + btnactivate + '</td></tr>';
                        $("#all_events").append(html);
                    })
                }
            }
        });

        $.ajax({
            type: "post",
            url: "<?= api('getMembers') ?>",
            success: function(data) {
                if (data.success) {
                    var storage = "<?= $env['storage'] ?>";
                    var api = "<?= api('actionOnMember') ?>";
                    data.data.forEach(function(dt) {
                        var nom = dt.NOM_MEMBRE;
                        var prenom = dt.PRENOM_MEMBRE;
                        var id = dt.ID_MEMBRE;
                        var datene = dt.DATEN_MEMBRE;
                        var email = dt.LOGIN_MEMBRE;
                        var deletelink = api + "?id=" + id + "&action=delete&from=admin";
                        var updatelink = api + "?id=" + id + "&action=block&from=admin";
                        var showuser = "<?= route('profile/"+id+"') ?>";

                        var btnactivate = '<a href="' + updatelink + '" type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-stop"></i></a>';
                        var status = '<i class="fa fa-user text-dark"></i>';
                        var btndelete = '<a href="' + deletelink + '" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                        var showbtn = '<a href="' + showuser + '" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                        if (dt.LEVEL > 1) {
                            status = '<i class="fa fa-lock text-success"></i>';
                            btnactivate = '';
                            btndelete = '';
                        } else if (dt.LEVEL == 0) {
                            status = '<i class="fa fa-times-circle text-danger"></i>';
                            updatelink = api + "?id=" + id + "&action=unblock&from=admin";
                            btnactivate = '<a href="' + updatelink + '" type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i></a>';
                        }
                        var html = '<tr><th scope="row">' + id + '</th><td>' + nom + '</td><td>' + prenom + '</td><td>' + prenom + '</td><td>' + email + '</td><td>' + status + '</td><td class="btn-group">' + showbtn + btnactivate + btndelete + '</td></tr>';
                        $("#all_members").append(html);
                    })
                }
            }
        })
    })
</script>
<?php
if (isset($_GET['t'])) {
    if ($_GET['t'] == 'la') {
        ?>
<script>
    $("#list-articles-list").trigger("click");
</script>
<?php

} else if ($_GET['t'] == 'lu') {
    ?>
<script>
    $("#list-profile-list-sd").trigger("click");
</script>
<?php

} else if ($_GET['t'] == 'lla') {
    ?>
<script>
    $("#list-members-list-click").trigger("click");
</script>
<?php

}
else if ($_GET['t'] == 'lue') {
    ?>
<script>
    $("#list-events-user").trigger("click");
</script>
<?php

}else if ($_GET['t'] == 'lau') {
    ?>
<script>
    $("#list-events-click").trigger("click");
</script>
<?php
}
else if ($_GET['t'] == 'lc') {
    ?>
<script>
    $("#list-contact-click").trigger("click");
</script>
<?php
}
}
?> 