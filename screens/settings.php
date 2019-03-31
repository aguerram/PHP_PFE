<div class="row justify-content-center">
    <div class="col-12 col-md-6 bg-white p-3 shadow-sm">
        <form id="signupform" method="post" action="<?= api("updateProfile") ?>">
            <div class="input-group justify-content-center">
                <i class="fa fa-user-circle fa-4x text-dark" aria-hidden="true"></i>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                </div>
                <input
                    type="text"
                    class="form-control" required min="3" name="nom"  aria-describedby="helpId" placeholder="Nom">
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                </div>
                <input
                    type="text"
                    class="form-control" required min="3" name="prenom"  aria-describedby="helpId" placeholder="Prenom">
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                </div>
                <input type="date" required name="datene" class="form-control">
            </div>
            <hr>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <input
                    type="email"
                    class="form-control" required min="3" name="email"  aria-describedby="helpId" placeholder="Email">
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                </div>
                <input
                    type="password"
                    class="form-control" name="password"  aria-describedby="helpId" placeholder="Mot de passe">
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                </div>
                <input
                    type="password"
                    class="form-control" name="r_password"  aria-describedby="helpId" placeholder="répéter  Mot de passe">
            </div>
            <div class="input-group justify-content-end mt-1">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save" aria-hidden="true"></i> Enregistrer</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(function () {
        $.ajax({
            url:"<?= api('getUserById') ?>",
            type:"post",
            success:function (data) {
                if(data.success)
                {
                    var user = data.data;
                    $("input[name=nom]").val(user['NOM_MEMBRE']);
                    $("input[name=prenom]").val(user['PRENOM_MEMBRE']);
                    $("input[name=email]").val(user['LOGIN_MEMBRE']);
                    $("input[name=datene]").val(user['DATEN_MEMBRE']);
                }
            }
        });
        $("form").ajaxForm({
            success:function(res)
            {
                if(res.success)
                {
                    swal({
                        icon:"success",
                        text:"Votre compte a ete créé avec success"
                    });
                }
                else{
                    swal({
                        icon:"error",
                        text:res.msg
                    })
                }
            }
        })
    })
</script>