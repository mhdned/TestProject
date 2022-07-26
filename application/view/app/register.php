<?php $this->include("app.layouts.header"); ?>

<div class="container">
	<div class="screen">
		<div class="screen__content">
            
            <!-- Form Login -->
			<form class="login" method="POST" action="http://localhost/testproject/user/register">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="name" type="text" class="login__input" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="password" type="password" class="login__input" placeholder="Password">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="repassword" type="password" class="login__input" placeholder="re-Password">
				</div>
				<button type="submit" class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<br>
				<h4><a href="http://localhost/testproject/user">login</a></h4>
			</form>
            <!-- Form Login -->
			
			<div class="social-login">
				<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<?php $this->include("app.layouts.footer"); ?>