<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>



<div class="container">
<h5 class="text-center">Checkout</h5>
  <form method="POST" action="./package_pay/index.php">
    <div class="form-group">
      <label for="email">First Name:</label>
      <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
    </div>

    <div class="form-group">
      <label for="email">Last Name:</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
    </div>

    <div class="form-group">
      <label for="email">Zip Code:</label>
      <input type="text" class="form-control" placeholder="Enter Zip Code" name="zip">
    </div>

    <div class="form-group">
      <label for="email">Email ID:</label>
      <input type="text" class="form-control" placeholder="Enter Email ID" name="email">
    </div>

    <div class="form-group">
      <label for="email">Phone Number:</label>
      <input type="text" class="form-control" placeholder="Enter Phone Number" name="number">
    </div>

    <div class="form-group">
      <label for="email">Address:</label>
      <!-- <input type="text" class="form-control" placeholder="Enter Address" name="address"> -->
      <textarea name="address" rows="3" class="form-control" placeholder="Enter Address"></textarea>
    </div>

    <div class="form-group">
      <label for="email">Amount:</label>
      <input type="text" class="form-control" placeholder="Enter Amount" name="amount" value="<?= $_POST['package_amount'] ?>.00" readonly>
    </div>

    <div class="form-group">
      <label for="email">Package Name:</label>
      <input type="text" class="form-control" placeholder="Enter" name="state" value="<?= $_POST['package_name'] ?>" readonly>
    </div>
    
    
    <button type="submit" class="btn btn-primary" name="pay">Pay Now</button>
  </form>
</div>

</body>
</html>
