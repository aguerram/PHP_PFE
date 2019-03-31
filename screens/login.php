<div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-md-6 col-lg-4 shadow p-4 bg-white">
        <form id="loginform" method="post" action="<?= api("login") ?>">
            <div class="input-group justify-content-center">
                <i class="fa fa-user-circle-o fa-4x text-dark" aria-hidden="true"></i>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <input
                    type="email"
                    class="form-control" required min="3" name="email"  aria-describedby="helpId" placeholder="Email">
            </div>
            <div class="input-group mt-1">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                </div>
                <input
                    type="password"
                    class="form-control" required name="password" aria-describedby="helpId" placeholder="Mot de passe">
            </div>
            <div class="input-group justify-content-end mt-1">
                <button type="submit" class="btn btn-primary btn-block">S'identifier</button>
            </div>
            <div class="input-group justify-content-end mt-1">
                <a href="<?= route("signup") ?>">Vous n'avez pas de compte?</a>
            </div>

        </form>
    </div>
</div>
<script>
    $("#loginform").ajaxForm({
        success:function(res)
        {
            if(!res.loggedin)
            {
                swal({
                    icon:"error",
                    text:"Nom d'utilisateur ou mot de passe incorrect"
                });
                $("input[name=password]").val("");
            }
            else{
               if(res.loggedin == 1)
               {
                   swal({
                       icon:"success",
                       text:"Bonjour"
                   });
                   setTimeout(function () {
                       location.reload();
                   },1000);
               }
               else{
                   swal({
                       icon:"warning",
                       text:"Ce compte est bloqué, veuillez contacter l'administrateur pour plus d'informations"
                   });
                   $("input[name=password]").val("");
               }

            }
        },
        error:function()
        {
            swal({
                icon:"error",
                text:"Quelque chose s'est mal passé"
            });
        }
    });
</script>