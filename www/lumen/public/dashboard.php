<!DOCTYPE html>
<html>
<head>
 <title>Dashboard</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
 
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2>DashBoard</h2>
            <hr>

            <h6></h6>
            <div class="form-group welcome">
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label"></label>
                    <label class="col-sm-6 col-form-label username text-right"></label>
                </div>
                
            </div>
            
            <h4>Purchased Products</h4>
            <div class="form-group purchased">
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label"><b>SKU</b></label>
                </div>
                
            </div>

            <h4>Recommended Products</h4>
            <div class="form-group recommended">
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label"><b>SKU</b></label>
                    <label class="col-sm-6 col-form-label"><b>Name</b></label>
                </div>
                
            </div>
        
            <input type="hidden" class="form-control" id="txttoken" autofocus="true" value="">
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

        var api_token = $.cookie("api_token");

        if (api_token === undefined || api_token === '' || api_token === false) {
            window.location.href = "http://192.168.99.100:8080/signin.php";
        }

        $.ajax({
            url: "http://192.168.99.100:8080/user?api_token=" + $.cookie("api_token"),
            type: "GET",
            crossdomain: true,
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
               $(".username").html('Welcome, ' +data.message.name);
              
            },
            error: function (request, textStatus, errorThrown) {
                console.log(request)
                console.log(errorThrown)
            }
        });

        $.ajax({
            url: "http://192.168.99.100:8080/user/products?api_token=" + $.cookie("api_token"),
            type: "GET",
            crossdomain: true,
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                $.each(data, function(index, element) {

                    var datahtml = '<div class="form-group row">';
                    datahtml += '<label class="col-sm-6 col-form-label">'+ element.sku +'</label>';
                    datahtml += '</div>';
                    $('.purchased').append(datahtml);
                })
              
            },
            error: function (request, textStatus, errorThrown) {
                console.log(request)
                console.log(errorThrown)
            }
        });


        $.ajax({
            url: "http://192.168.99.100:8080/user/products/suggestions?api_token=" + $.cookie("api_token"),
            type: "GET",
            crossdomain: true,
            headers: {  'Access-Control-Allow-Origin': '*' },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                $.each(data[0], function(index, element) {

                    var datahtml = '<div class="form-group row">';
                    datahtml += '<label class="col-sm-6 col-form-label">'+ element.sku +'</label><label class="col-sm-6 col-form-label">'+ element.name +'</label>';
                    datahtml += '</div>';
                    $('.recommended').append(datahtml);
                })
              
            },
            error: function (request, textStatus, errorThrown) {
                console.log(request)
                console.log(errorThrown)
            }
        });
 });
</script>
</html>