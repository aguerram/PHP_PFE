<nav aria-label="breadcrumb col-12">
    <ol class="breadcrumb col-12">
        <li class="breadcrumb-item"><a href="<?= $env['link'] ?>">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Les évènements</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="d-flex justify-content-center" style="flex-wrap: wrap;" id="eventlist">
        <div class="d-flex justify-content-center align-items-center" style="height:calc(100vh - 72px)">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-dark"></i>
        </div>
    </div>
</div>
<script>
    function imageErr(image) {
        image.onerror = "";
        image.src =  "<?= $env['link'] ?>/assets/img/no_image.png";
        return true;
    }
const MAX = 250;
$.ajax({
    type: "post",
    dataType: "json",
    url: "<?= $env["link"] ?>api/getEvents.php",
    success: function(data) {
        if (data.success) {
            var storage = "<?= $env['storage'] ?>";
            $("#eventlist").html("");
            var found= false;
            data.data.forEach(function(dt) {
                if(dt.active == 1 && (dt.type == '<?= $params[1] ?>' || '<?= $params[1] ?>' == 'tout'))
                {
                    found = true;
                    var ll = 'event/'+dt.id;
                    var link = "<?= route('"+ll+"')?>";
                    var title = dt.titre;
                    var content = dt.description;
                    if (content.length > MAX) {
                        content = content.substr(0, MAX) + " ...";
                    }
                    var imglink = storage + dt.image;
                    var apnd = "<div class='card col-12 col-md-4 col-lg-3 p-0 m-2'> <img style='height: 255px;' onerror='imageErr(this)' src='" +
                        imglink + "' class='card-img-top' alt='" + title +
                        "'> <div class='card-body col-12'><h5 class='card-title'>" + title +
                        "</h5> <p class='card-text text-justify'>" + content + "</p> <a href='" + link +
                        "' class='btn btn-primary'>Voir plus</a> </div></div>";
                    $("#eventlist").append(apnd);
                }

            });
            if(!found)
            {
                $("#eventlist").html("<div class='alert alert-warning'><i class='fa fa-info-circle'></i> Il n'y a pas d'événements</div>");

            }
        }
    }
})
</script>