<?php
// form value get 
if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$service = $_POST['select_services'];
$message = $_POST['message'];
// message body part 
$message = "<html><body>";
$message .= "<p>Name :".$_POST['name'] ."</p>";
$message .= "<p>Email : ". $_POST['email'] ."</p>";
$message .= "<p>Phone : ". $_POST['number'] ."</p>";
$message .= "<p>Service : ". $_POST['select_services'] ."</p>";
$message .= "<p>Message :".$_POST['message']."</p>";
$message .= "</body></html>";
}
// smtp checker
include('smtp/PHPMailerAutoload.php');
$to="arun@gmail.com";
$subject="Balikis & Rotimi | Online Lead Form";
smtp_mailer($to,$subject,$message); //Send smtp-mailer-function 
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug=3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "mail.arun@gmail.com";
	$mail->Port = "465"; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "arun@gmail.com";
	$mail->Password = 'arun@gmail.com@#$%1234';
	$mail->SetFrom("arun@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo "<script>alert('Thank you for contact us, our team will contact with you very soon');document.location='https://website_url.com'</script>";;
	}
}
?>