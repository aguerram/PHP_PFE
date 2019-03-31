<div class="row">
    <div class="col-12 bg-white col-md-4 shadow-sm m-3">
        <h3 class="text-dark text-center text-uppercase" id="name"></h3>
        <hr>
        <p class="text-left"><i class="fa fa-envelope" aria-hidden="true"></i> <span id="email"></span></p>
        <p class="text-left"><i class="fa fa-calendar" aria-hidden="true"></i> <span id="bday"></span></p>
        <p class="text-left"><i class="fa fa-legal" aria-hidden="true"></i> <span id="level"></span></p>
        <?php
            if($id == $params[1])
            {
                ?>
                <a href="<?= route("settings") ?>" class="btn btn-block btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i> Modifier</a>
                <?php
            }
        ?>
        <br>
    </div>
    <div class="col shadow-sm m-3 bg-white">
        <h5 class="card-header mt-1">Articles de <span class="text-uppercase" id="nameb"></span></h5>
        <div class="list-group pb-2">

        </div>
    </div>
</div>
<script>
    const MAX = 250;
    $.ajax({
        url:"<?= api('getProfile') ?>",
        type:"post",
        data:{"id":<?= $params[1] ?>},
        success:function (data) {
            if(data.success)
            {
                if(data.member)
                {
                    var member = data.member;
                    $("#name").text(member['NOM_MEMBRE']+" "+member['PRENOM_MEMBRE']);
                    $("#nameb").text(member['NOM_MEMBRE']+" "+member['PRENOM_MEMBRE']);
                    $("#email").text(member['LOGIN_MEMBRE']);
                    $("#bday").text(member['DATEN_MEMBRE']);
                    $("#level").text(member['LEVEL'] == 1?'MEMBRE':'ADMIN');
                    var count = 0;
                    data.articles.forEach(function(dt){
                        if(dt.ACTIVE == 1)
                        {
                            var ll = 'article/'+dt.ID_ARTICLE;
                            var link = "<?= route('"+ll+"')?>";
                            var title = dt.TITRE_ARTICLE;
                            var content = dt.CONTENU_ARTICLE;
                            var at = dt.DATE_PUB;
                            if (content.length > MAX) {
                                content = content.substr(0, MAX) + " ...";
                            }
                            var html = ' <a href="'+link+'" class="list-group-item list-group-item-action mt-1"> <div class="d-flex w-100 justify-content-between"> <h5 class="mb-1">'+title+'</h5> <small class="text-muted">'+at+'</small> </div> <p class="mb-1">'+content+'</p> </a>';
                            $(".list-group").append(html);
                            count++;
                        }
                    });
                    if(count < 1 )
                    {
                        $(".list-group").html("<div class='alert alert-warning'>Il n'y a pas encore d'articles publiés</div>");
                    }
                }
                else{
                    location.href = "<?= $env['link'] ?>";
                }
            }
        }
    })
</script>