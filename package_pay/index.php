<?php

	include "./../conn.php";
    if(isset($_POST['registration_pay'])){        
		
// 		echo "<pre>";
// 		print_r($_POST);
// 		exit;
		
    $date = $_POST['date'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $mother_tongue = $_POST['mother_tongue'];
    $marital_status = $_POST['marital_status'];
    $monthly_income = $_POST['monthly_income'];
    $education = $_POST['education'];
	$address = $_POST['address'];

    $assigned_doctor = 'not assigned';
    $assigned_dietition = 'not assigned';
    $assigned_healthexpert = 'not assigned';
    $user_status = 'unactive';
    
    $image_data = "";
    
    $txn_id = $_POST['txnid'];
    $amount = $_POST['amount'];
    $product_info = $_POST['productinfo'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
	$password = $_POST['udf1'];
	$udf1 = $_POST['udf1'];
	$gender = $_POST['gender'];
    $rand_id = $_POST['txnid'];
    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email'"));
    if($check > 0){
      echo "<script>alert('You have already registered')</script>";
    }else{
    
        // $cont_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT('id') as `cid` FROM `user_doctor`"));
        // $x = $cont_dr['cid'];
        // $y = $x + 2;
        // $z = $y;
        
        // $ins1 = mysqli_query($conn , "INSERT INTO `user_doctor`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");
        // $ins2 = mysqli_query($conn , "INSERT INTO `user_diet`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");
        // $ins3 = mysqli_query($conn , "INSERT INTO `user_healthexpert`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");

    $ins = mysqli_query($conn , "INSERT INTO `signup`(`first_name`, `last_name`, `gender`, `phone_number`, `password` ,`email`, `address`, `dob`, `height`, `weight`, `age`, `mother_tongue`, `marital_status`, `monthly_income`, `education`,`package_name`,`package_amount`,`rand_id`, `assigned_doctor`, `assigned_dietition`, `assigned_healthexpert`, `user_status`) VALUES ('$fname','$lname','$gender','$number','$password','$email','$address','$date','$height','$weight','$age','$mother_tongue','$marital_status','$monthly_income','$education','$product_info','$amount','$rand_id','$assigned_doctor','$assigned_dietition','$assigned_healthexpert','$user_status')");
    if($ins){
        echo"";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
    }
    }


/*
Note : It is recommended to fetch all the parameters from your Database rather than posting static values or entering them on the UI.

POST REQUEST to be posted to below mentioned PayU URLs:

For PayU Test Server:
POST URL: https://test.payu.in/_payment

For PayU Production (LIVE) Server:
POST URL: https://secure.payu.in/_payment
*/

//Unique merchant key provided by PayU along with salt. Salt is used for Hash signature 
//calculation within application and must not be posted or transfered over internet. //-->

$key="EAaCkB";
$salt="EIseBcWSUeDGFggSblZOQoaBKIaD9YBF";

$_SESSION['salt'] = $salt;
$action = 'https://secure.payu.in/_payment';

$html = '';

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){

	/* Request Hash
	----------------
	For hash calculation, you need to generate a string using certain parameters 
	and apply the sha512 algorithm on this string. Please note that you have to 
	use pipe (|) character as delimeter. 
	The parameter order is mentioned below:
	
	sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT)
	
	Description of each parameter available on html page as well as in PDF.
	
	Case 1: If all the udf parameters (udf1-udf5) are posted by the merchant. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT)
	
	Case 2: If only some of the udf parameters are posted and others are not. For example, if udf2 and udf4 are posted and udf1, udf3, udf5 are not. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email||udf2||udf4|||||||SALT)

	Case 3: If NONE of the udf parameters (udf1-udf5) are posted. Then,
	hash=sha512(key|txnid|amount|productinfo|firstname|email|||||||||||SALT)
	
	In present kit and available PayU plugins UDF5 is used. So the order is -	
	hash = sha512(key|txnid|amount|productinfo|firstname|email|||||udf5||||||SALT)
	
	*/
	//generate hash with mandatory parameters and udf5
	// $hash = hash('sha512', $key.'|'.$txn_id.'|'.$amount.'|'.$product_info.'|'.$fname.'|'.$lname.'|'.$zip.'|'.$number.'|'.$address.'|'.$city.'|'.$state.'|'.$country.'|'.$email.'||||||'.$salt);

	$hash = hash('sha512', $key.'|'.$txn_id.'|'.$amount.'|'.$product_info.'|'.$fname.'|'.$email.'|'.$udf1.'||||||||||'.$salt);
		
	$_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response
	
	$html = '<form action="'.$action.'" id="payment_form_submit" method="post">
			
			<input type="hidden" id="surl" name="surl" value="'.getCallbackUrl().'" />
			<input type="hidden" id="furl" name="furl" value="'.getCallbackUrl().'" />
			<input type="hidden" id="curl" name="curl" value="'.getCallbackUrl().'" />
			<input type="hidden" id="key" name="key" value="'.$key.'" />
			<input type="hidden" id="txnid" name="txnid" value="'.$txn_id.'" />
			<input type="hidden" id="amount" name="amount" value="'.$amount.'" />
			<input type="hidden" id="productinfo" name="productinfo" value="'.$product_info.'" />
			<input type="hidden" id="firstname" name="firstname" value="'.$fname.'" />
			<input type="hidden" id="Lastname" name="Lastname" value="'.$lname.'" />			
			<input type="hidden" id="email" name="email" value="'.$email.'" />
			<input type="hidden" id="phone" name="phone" value="'.$number.'" />
			<input type="hidden" id="address1" name="address1" value="'.$address.'" />
			<input type="hidden" id="address2" name="address2" value="'.(isset($_POST['address2'])? $_POST['address2'] : '').'" />						
			<input type="hidden" id="udf1" name="udf1" value="'.$_POST['udf1'].'" />
			<input type="hidden" id="hash" name="hash" value="'.$hash.'" />
			</form>
			<script type="text/javascript">
				document.getElementById("payment_form_submit").submit();	
			
			</script>';
	
}
  
//This function is for dynamically generating callback url to be postd to payment gateway. Payment response will be
//posted back to this url. 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$uri = str_replace('/index.php','/',$_SERVER['REQUEST_URI']);
	return $protocol . $_SERVER['HTTP_HOST'] . $uri . 'response.php';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PayUBiz PHP7 Kit</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;		
	}	
</style>
<body>
	<div class="main">
		<div>
			<img src="images/logo.png" />
		</div>
		<div>
			<h3>PayUBiz PHP7 Kit</h3>
		</div>		
		<!-- Form Block //-->
		<span style="float:left; display:inline-block;">
			<!--// Form with required parameters to be posted to Payment Gateway. For details of each required 
			parameters refer Integration PDF. //-->
			<form action="" id="payment_form" method="post">
			
			<!-- Contains information of integration type. Consult to PayU for more details.//-->
			<input type="hidden" id="udf5" name="udf5" value="PayUBiz_PHP7_Kit" />					
    
			<div class="dv">
				<span class="text"><label>Transaction/Order ID:</label></span>
				<span>
				<!-- Required - Unique transaction id or order id to identify and match 
				payment with local invoicing. Datatype is Varchar with a limit of 25 char. //-->
				<input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
			</div>
		
			<div class="dv">
				<span class="text"><label>Amount:</label></span>
				<span>
				<!-- Required - Transaction amount of float type. //-->
				<input type="text" id="amount" name="amount" placeholder="Amount" value="6.00" /></span>    
			</div>
    
			<div class="dv">
				<span class="text"><label>Product Info:</label></span>
				<span>
				<!-- Required - Purchased product/item description or SKUs for future reference. 
				Datatype is Varchar with 100 char limit. //-->
				<input type="text" id="productinfo" name="productinfo" placeholder="Product Info" value="P01,P02" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>First Name:</label></span>
				<span>
				<!-- Required - Should contain first name of the consumer. Datatype is Varchar with 60 char limit. //-->
				<input type="text" id="firstname" name="firstname" placeholder="First Name" value="" /></span>
			</div>
		
			<div class="dv">
				<span class="text"><label>Last Name:</label></span>
				<span>
				<!-- Should contain last name of the consumer. Datatype is Varchar with 50 char limit. //-->
				<input type="text" id="Lastname" name="Lastname" placeholder="Last Name" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Zip Code:</label></span>
				<span>
				<!-- Datatype is Varchar with 20 char limit only 0-9. //-->
				<input type="text" id="Zipcode" name="Zipcode" placeholder="Zip Code" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Email ID:</label></span>
				<span>
				<!-- Required - An email id in valid email format has to be posted. Datatype is Varchar with 50 char limit. //-->
				<input type="text" id="email" name="email" placeholder="Email ID" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Mobile/Cell Number:</label></span>
				<span>
				<!-- Required - Datatype is Varchar with 50 char limit and must contain chars 0 to 9 only. 
				This parameter may be used for land line or mobile number as per requirement of the application. //-->
				<input type="text" id="phone" name="phone" placeholder="Mobile/Cell Number" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Address1:</label></span>
				<span>					
				<input type="text" id="address1" name="address1" placeholder="Address1" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Address2:</label></span>
				<span>						
				<input type="text" id="address2" name="address2" placeholder="Address2" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>City:</label></span>
				<span>						
				<input type="text" id="city" name="city" placeholder="City" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>State:</label></span>
				<span><input type="text" id="state" name="state" placeholder="State" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>Country:</label></span>
				<span><input type="text" id="country" name="country" placeholder="Country" value="" /></span>
			</div>
    
			<div class="dv">
				<span class="text"><label>PG:</label></span>
				<span>
				<!-- Not mandatory but fixed code can be passed to Payment Gateway to show default payment 
				option tab. e.g. NB, CC, DC, CASH, EMI. Refer PDF for more details. //-->
				<input type="text" id="Pg" name="Pg" placeholder="PG" value="CC" /></span>
			</div>
    
			<div><input type="button" id="btnsubmit" name="btnsubmit" value="Pay" onclick="frmsubmit(); return true;" /></div>
			</form>
		</span>
		
		
		<?php if($html) echo $html; //submit request to PayUBiz  ?>
		
		
	</div> <!-- End of Main Div //-->
	
	<!-- Below script makes final submission of form to Payment Gateway. This script is for present Demo/Test request 
	form only. In case of live integration, other methods may be used for request form submission. Salt is confidential
	so should not be passed over internet.//-->
	<script type="text/javascript">		
		
		// function frmsubmit()
		// {
		// 	document.getElementById("payment_form").submit();	
		// 	return true;
		// }
	
	</script>
	
</body>
</html>
	