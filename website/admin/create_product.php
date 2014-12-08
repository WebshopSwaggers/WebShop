<?php include "includes/config.php"; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrapStyle.css">
	<title>Vlambeer - Product toevoegen</title>
</head>    
<body>
<div class="container">
<form action="includes/controllers/productController.php" method="POST" class="form-horizontal" roll="form">
        <div class="form-group">
            <label for="name" class="col-lg-2 control-label">Name*</label>
          <div class="col-lg-10">
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
   </div>
        <div class="form-group">
            <label for="price" class="col-lg-2 control-label">Price*</label>
          <div class="col-lg-10">
        <input type="text" class="form-control" id="price" name="price" required>
      </div>
   </div>
        <div class="form-group">
            <label for="description" class="col-lg-2 control-label">Description*</label>
          <div class="col-lg-10">
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
   </div>
        <div class="form-group">
            <label for="image" class="col-lg-2 control-label">image*</label>
          <div class="col-lg-10">
        <input type="file" class="form-control" id="image" name="image" required>
      </div>
   </div>
        <div class="form-group">
            <label for="catagory" class="col-lg-2 control-label">Category*</label>
          <div class="col-lg-10">
        <input type="text" class="form-control" id="catagory" name="catagory">
      </div>
   </div>  
  <div class="form-group">
            <label for="createProduct" class="col-lg-2 control-label"></label>
          <div class="col-lg-10">
        <input  name="createProduct" type="submit" value="createProduct">
      </div>
   </div>
    </form>
    </div>
    </body>
</html>