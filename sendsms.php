<?php
        session_start();
        
        $_SESSION['my_num'] = $_POST['phone'];
        
        echo '<script> alert("OTP Send Successfully") </script>';
        $ch = @mysqli_connect("localhost", "posigraph_health_smadhan", "xC3Eug~T$+ps", "posigraph_health_smadhanDB");
        $Mob = 8603310087;
        $otp = rand('100000', '999999');  
        $_SESSION['otp']  = $otp;
        $link = mysqli_connect("localhost", "posigraph_health_smadhan", "xC3Eug~T$+ps", "posigraph_health_smadhanDB");               
        //Your authentication key
        $authKey = "20785AGUsrJlJs4Bf6350c198P15";        
        //Multiple mobiles numbers separated by comma
        $mobileNumber = $_POST['phone'];       
        //Sender ID,While usi
        $senderId = "FCENGG";
        $country = "91";
        $DLT_TE_ID = "1207166582423955897";        
        //Your message to send, Add URL encoding here.
        $message = 'Your Fire Care Engineers login OTP is'  .$otp;        
        //Define route 
        $route = "4";
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'country' => $country,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'DLT_TE_ID' => $DLT_TE_ID,
            'route' => $route
        );        
        //API URL
        $url="http://bulksms.insightinfosystem.com/api/sendhttp.php";
        
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));                
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);                
        //get response
        $output = curl_exec($ch);
        
        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }        
        curl_close($ch);

        ?>