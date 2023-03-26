<div id="principalDiv" class="container">
	<div class="row justify-content-center">
		<div class = "col-8 col-sm-8 col-lg-6 col-xl-4 col-xxl-4 tittleForm" >
			<h1>Login</h1>
		</div>
	</div>
	<div class="row justify-content-center">
		<div id="formLogin" class = "col-8 col-sm-8 col-lg-6 col-xl-4 col-xxl-4" >
			<div id="PositiveAlert" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>You have successfully Login.</strong> 
            </div>
			<div id="NegativeAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>An example danger alert.</strong> 
            </div>
			<form>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Username</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" class="form-control" id="password">
				</div>
 				<!-- <div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>  -->
				<button type="submit" class="btn btn-primary" id = "submit">Submit</button>

				<div>
				<br>
				<a href="index.php?pagina=registration">Don't have an account yet? </a>
				<br>
				<br>
				<a href="index.php?pagina=forgotPass">Forgot Password? </a>

				</div>
			</form>
        </div>
	</div>
</div>
