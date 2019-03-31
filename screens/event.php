<div>

    <nav aria-label="breadcrumb col-12">
        <ol class="breadcrumb col-12">
            <li class="breadcrumb-item"><a href="<?= $env['link'] ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evenement</li>
        </ol>
    </nav>
    <div class="card col-12 p-0" style="border-radius:0;">
        <div id="imagearticle">

        </div>
        <div class="card-body col-12 " style="border-radius:0">
            <h5 class="card-title" id="title"></h5>
            <p class="card-text text-justify" id="content"></p>
            <p class="row justify-content-around clearnotactivated">
                <small><i class="fa fa-calendar"></i> Date de départ : <b><span id="start_date"></span></b><br>
                    <i class="fa fa-calendar"></i> Date de fin : <b><span id="end_date"></span></b></small>
                <small><i class="fa fa-calendar"></i> Publié à: <b><span id="at"></span></b></small>
            </p>
            <div id="commentsection" class="m-1 m-md-2 m-lg-4 shadow-sm clearnotactivated">
                <?php
                if (!$loggedin) {
                    ?>
                    <form class="p-0 p-md-2">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nom complete</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nom complete">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" placeholder="Commentaire"></textarea>
                            </div>
                        </div>
                    </form>
                    <?php
                } else if (false) {
                    ?>
                    <form class="p-0 p-md-2" method="post" action="<?= api("addCommentUser") ?>">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
                            <div class="col-sm-10">
                                <textarea required name="comment" type="text" class="form-control"
                                          placeholder="Commentaire"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="arid" name="arid" value="">
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-send" aria-hidden="true"></i>
                                Envoyer
                            </button>
                        </div>
                    </form>

                    <?php
                }
                ?>

                <hr>
                <div>
                    <div class="list-group" id="comments"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?= $env["link"] ?>api/getEventById.php",
        data: {"id": <?= $params[1] ?>},
        success: function (data) {
            if (data.success) {
                var da = data.data;
                if (da.active == 1 || data.editor) {
                    $("#title").text(da['titre']);
                    $("#at").text(da['at']);
                    $("#content").text(da['description']);
                    $("#arid").val(da['id']);
                    $("#start_date").html(da['datedep']);
                    $("#end_date").html(da['datefin']);
                    $("#imagearticle").html('<img src="<?= $env['storage'] ?>' + da['image'] + '" class="card-img-top" style="border-radius:0" alt="...">');


                    //Comments
                    data.comments.forEach(function (e) {
                        var byuser = e['full_name'];
                        var attime = e['at'];
                        var contentcom = e['content'];
                        var html = '<div href="#" class="list-group-item list-group-item-action mt-1"><div class="d-flex w-100 justify-content-between "><h5 class="mb-1">' + byuser + '</h5><small><i class="fa fa-clock-o"></i> ' + attime + '</small></div><p class="mb-1 ml-4">' + contentcom + '</p></div>';
                        $("#comments").append(html);
                    });
                }
                else {
                    $("#content").html("<div class='alert alert-danger'><i class='fa fa-stop-circle'></i> Le contenu de cette page ne peut pas être affiché pour certaines raisons</div>");
                    $(".clearnotactivated").html("");
                }

            }
            else {
                $("#content").html("<div class='alert alert-danger'><i class='fa fa-stop-circle'></i> Le contenu de cette page ne peut pas être affiché pour certaines raisons</div>");
                $(".clearnotactivated").html("");
            }
        }
    })

</script>