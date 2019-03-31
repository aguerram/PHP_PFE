<div>

    <nav aria-label="breadcrumb col-12">
        <ol class="breadcrumb col-12">
            <li class="breadcrumb-item"><a href="<?= $env['link'] ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Article</li>
        </ol>
    </nav>
    <div class="card col-12 p-0" style="border-radius:0;">
        <div id="imagearticle">

        </div>
        <div class="card-body col-12 " style="border-radius:0">
            <h5 class="card-title" id="title"></h5>
            <p class="card-text text-justify" id="content"></p>
            <p class="row justify-content-around clearnotactivated">
                <small><i class="fa fa-user"></i> Par : <span id="userid"></span> </small>
                <small><i class="fa fa-calendar"></i> Publié à : <span id="at"></span></small>
            </p>
            <div id="commentsection" class="m-1 m-md-2 m-lg-4 shadow-sm clearnotactivated">
                <?php
                if ($loggedin) {
                    ?>
                <form class="p-0 p-md-2" method="post" action="<?= api("addCommentUser") ?>">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
                        <div class="col-sm-10">
                            <textarea required name="comment" type="text" class="form-control" placeholder="Commentaire"></textarea>
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

            } else {
                ?>
                <a href="<?= route('login') ?>" class="btn btn-link"><i class="fa fa-sign-in"></i> Connectez-vous pour ajouter un commentaire ?</a>
                <?php

            } ?>

                <hr>
                <div>
                    <div class="list-group" id="comments"></div>
                </div>
            </div>
        </div>
        <div>
            <!-- GOGLE MAP API -->
            
        </div>
    </div>
</div>
<script>
    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?= $env["link"] ?>api/getArticleById.php",
        data: {
            "id": <?= $params[1] ?>
        },
        success: function(data) {
            if (data.success) {
                var da = data.data;
                if (da.ACTIVE == 1 || data.editor) {
                    var prof = "<?= route('profile/') ?>";
                    $("#title").text(da['TITRE_ARTICLE']);
                    $("#at").text(da['DATE_PUB']);
                    $("#content").text(da['CONTENU_ARTICLE']);
                    $("#arid").val(da['ID_ARTICLE']);
                    $("#imagearticle").html('<img src="<?= $env['storage'] ?>' + da['IMG_ARTICLE'] + '" class="card-img-top" style="border-radius:0" alt="...">');

                    var ah = '<a id="userid" href="' + prof + da['ID_MEMBRE'] + '">' + data.by + '</a>';

                    $("#userid").html(ah);
                    //Comments
                    data.comments.forEach(function(e) {
                        var byuser = e['full_name'];
                        var attime = e['at'];
                        var contentcom = e['content'];
                        var html = '<div href="#" class="list-group-item list-group-item-action mt-1"><div class="d-flex w-100 justify-content-between "><h5 class="mb-1">' + byuser + '</h5><small><i class="fa fa-clock-o"></i> ' + attime + '</small></div><p class="mb-1 ml-4">' + contentcom + '</p></div>';
                        $("#comments").append(html);
                    });
                } else {
                    $("#content").html("<div class='alert alert-danger'><i class='fa fa-stop-circle'></i> Le contenu de cette page ne peut pas être affiché pour certaines raisons</div>");
                    $(".clearnotactivated").html("");
                }

            }
        }
    })
    $("form").ajaxForm({
        success: function(data) {
            if (data.success) {
                swal({
                    icon: "success",
                    text: "Votre commentaire a été ajouté avec success"
                })
                $("form").trigger("reset");
                setTimeout(function() {
                    location.reload()
                }, 1000);
            } else {
                swal({
                    icon: "success",
                    text: "Une erreur inattendue s'est produite"
                })
            }
        }
    })
</script> 