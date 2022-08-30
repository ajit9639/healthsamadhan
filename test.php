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
  
  <form action="gateway/index.php" method="POST">
  
  <div class="form-group">
      <label for="usr">txnid:</label>
      <input type="text" class="form-control" name="txnid" value="<?= rand(99,9999) ?>">
    </div>   

    <div class="form-group">
      <label for="usr">phone:</label>
      <input type="text" class="form-control" name="phone">
    </div>   


    <div class="form-group">
      <label for="usr">First Name:</label>
      <input type="text" class="form-control" name="firstname">
    </div>    
    
    <div class="form-group">
      <label for="usr">Email:</label>
      <input type="text" class="form-control" name="email">
    </div>
    
    <div class="form-group">
      <label for="usr">Number:</label>
      <input type="text" class="form-control" name="number">
    </div>
    
    <div class="form-group">
      <label for="usr">productinfo:</label>
      <input type="text" class="form-control" name="productinfo">
    </div>
    <div class="form-group">
      <label for="pwd">amount:</label>
      <input type="text" class="form-control" name="amount">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
