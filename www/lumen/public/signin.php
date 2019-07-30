<!DOCTYPE html>
<html>
<head>
    <title>Login form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
 
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
            <h2>Login Form</h2>
            <hr>
            <form>
                <div class="form-group">
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtemail" autofocus="true" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="txtpass" value="">
                </div>
            </div>
        </div>

            <button type="button" id="btnlogin" class="btn btn-primary mb-2">Login</button>
        </form>
        <div class="alert hidden informasi" role="alert"  ></div>
        </div>
     </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $("#btnlogin").click(function(){
        var ajax = {
            email : $("#txtemail").val(),
            password : $("#txtpass").val()
        }

        $.ajax({
            url: "http://192.168.99.100:8080/login",
            type: "POST",
            crossdomain: true,
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: 'json',
            data: ajax,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);
                $("#txtemail").val("");
                $("#txtpass").val("");
                $(".informasi").removeClass("hidden").addClass('alert-success').html(data.message);
            
                $.removeCookie("api_token");
                $.cookie("api_token", data.api_token);

                setTimeout(() => {
                    window.location.href = "http://192.168.99.100:8080/dashboard.php";
                }, 3000);
            },
            error: function (request, textStatus, errorThrown) {
                console.log(request)
                console.log(errorThrown)
                $(".informasi").removeClass("hidden").addClass('alert-danger').html(request);
            }
        });
    });
 });
</script>
</html>