<?php

if(isset($_POST['submit'])){

      $name = $_POST["name"];  
       $mobile= $_POST["mobile"];
     $email= $_POST["email"];
      $subject = $_POST["subject"];  
      $text =$_POST["txtmsg"];
      $rand_val = rand(99999,999999);
    
$to = 'in.ajitgupta9639gmail.com'; 
$from = $email; 
$fromName = $name; 
 

$htmlContent = ' 
    <html> 
    <head> 
      <title>Welcome to LABES Salon at your home.</title>
    </head> 
    <body> 
        <h1>New Enquiry</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            
            <tr> 
                <th>&nbsp;</th><th align="left">Name:</th><td>'.$name.'</td> 
            </tr> 

            <tr style="background-color: #e0e0e0;"> 
                <th>&nbsp;</th><th align="left">Contact:</th><td>'.$mobile.'</td> 
            </tr> 

            <tr> 
                <th>&nbsp;</th><th align="left">Email:</th><td>'.$email.'</td> 
            </tr> 

            <tr> 
                <th>&nbsp;</th><th align="left">Subject:</th><td>'.$subject.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>&nbsp;</th><th align="left">Message:</th><td>'.$text.'</td> 
            </tr>

        </table> 
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
//$headers .= 'Cc: welcome@example.com' . "\r\n"; 
//$headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){
        $url = 'http://textup.co.in/api/send/?key_id=3DC4D74EBC37483EB4BE696FC2D4D4FE&key_secret=50DCB9B9C7B34D0CB85FF0D8188BB886&phone_number='.$mobile.'&template_id=CC9463E5C0E6449EA8DB987A32A2920F';
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
        $url = 'http://textup.co.in/api/send/?key_id=3DC4D74EBC37483EB4BE696FC2D4D4FE&key_secret=50DCB9B9C7B34D0CB85FF0D8188BB886&phone_number=8603310087&template_id=CC9463E5C0E6449EA8DB987A32A2920F&variable='.'1234 is your OTP for login';
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

    //echo 'Email has sent successfully.'."<br>"; 
echo '<script>alert("Email has sent successfully.");</script>';
     // echo "1".$to."<br>";  
     // echo "2".$subject."<br>";  
     // echo "3".$htmlContent."<br>";  
     // echo "4".$headers."<br>";
      //echo "5".$from."<br>";    
}else{ 
   echo 'Email sending failed.'; 
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form method="POST">
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="text" name="mobile" placeholder="Enter mobile"><br>
        <input type="text" name="email" placeholder="Enter email"><br>
        <input type="text" name="subject" placeholder="Enter subject"><br>
        <input type="text" name="txtmsg" placeholder="Enter text"><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>