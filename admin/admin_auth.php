<?php
include '../inc/head.php';
?>
<div class="container admin_auth">
<h3>Необходима авторизация в этом разделе</h3>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form id="adminForm" method="POST" action="">
		  <div class="form-group">		    
		    <input type="text" class="form-control" name="login" id="admin_login" placeholder="Введите логин">    
		  </div>
		  <div class="form-group">		    
		    <input type="password" name="password" class="form-control" id="admin_password" placeholder="введите пароль">
		  </div>  
		  <button type="submit" name="adminSubmit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="col-md-4"></div>
</div>
</div>

<?php
include '../inc/footer.php';
?>