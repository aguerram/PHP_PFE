<div class="row justify-content-center align-items-center h-100">
    <form id="contact" action="<?= api("contact") ?>" method="post" class="col-6 bg-white p-5 shadow">
        <div class="row">
            <div class="row col-12 justify-content-center">
                <h2 class="d-flex align-items-center text-dark"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;Contact</h2>
            </div>
            <table class="table table-noborder">
                <tbody>
                <tr>
                    <td scope="row">Nom</td>
                    <td><input type="text" required class="form-control" name="name"></td>
                </tr>
                <tr>
                    <td scope="row">Email</td>
                    <td><input type="email" required class="form-control" name="email"></td>
                </tr>
                <tr>
                    <td scope="row">Message</td>
                    <td><textarea class="form-control" name="message" required minlength="5"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-success">Envoyer <i class="fa fa-send" aria-hidden="true"></i></button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
<script>
    $("#contact").ajaxForm({
        success:function (data) {
            if(data.success)
            {
                $("#contact").trigger("reset");
                swal({
                    icon:"success",
                    text:"Votre message à été envoyé"
                })
            }
            else{
                swal({
                    icon:"error"
                })
            }
        }
    })
</script>