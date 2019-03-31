<?php

$search = $_POST['s'];
?>
<div class="row">
    <p><i class="fa fa-search"></i> Resultats de : <b><?= $search ?></b></p>
    <div class="col-12">
        <h3 class="text-dark"><i class="fa fa-list" aria-hidden="true"></i> Articles : </h3>
        <table class="table bg-white p-5">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Consulter</th>
            </tr>
            </thead>
            <tbody id="articles">

            </tbody>
        </table>
    </div>
</div>
<script>
    function imageErr(image) {
        image.onerror = "";
        image.src = "<?= $env['link'] ?>/assets/img/no_image.png";
        return true;
    }
    $.ajax({
        url: "<?= api('search') ?>",
        type: "post",
        data: {"s": "<?= $_POST['s'] ?>".trim()},
        success: function (data) {
            if (data.success) {
                var d = data.data;
                const MAX = 200;
                var events = d['event'];
                var article_link = "<?= route('article/') ?>";
                var articles = d['article'];
                var assets = "<?= $env['storage'] ?>";
                articles.forEach(function (e) {
                    var titre = e.TITRE_ARTICLE;
                    var contenu = e.CONTENU_ARTICLE;
                    if (contenu.length > MAX) {
                        contenu = contenu.substr(0, MAX) + " ...";
                    }
                    var image = '<img onerror="imageErr(this)" class="col" src="'+assets+e.IMG_ARTICLE +'"/>';
                    var consulter = '<a class="btn btn-primary" href="'+article_link+e.ID_ARTICLE+'"><i class="fa fa-eye"></i></a>';
                    var html = '<tr><th scope="row">'+titre+'</th><td>'+contenu+'</td><td>'+image+'</td> <td>'+consulter+'</td> </tr>';
                    $("#articles").append(html);
                })
            }
        }
    })
</script>