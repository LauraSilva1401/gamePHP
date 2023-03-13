<p>hello in to the game <strong><?= $_SESSION['name']?></strong></p>
<div id="principalDiv" class="container">
	<div class="row justify-content-center">
		<div id="formLogin" class = "col-4" >
			<div id="PositiveAlert" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>You have successfully pass.</strong> 
            </div>
			<div id="NegativeAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>An example danger alert.</strong> 
            </div>
            <h3>Level <strong><?= $_SESSION['level']?></strong></h3>
			<form>
				<div class="mb-3">
					<label for="question" class="form-label">Qestion</label>
					<input type="email" class="form-control" id="question" name="question">
				</div>
				<div class="mb-3">
					<label for="answer" class="form-label">answer</label>
					<input type="text" class="form-control" id="answer" name="answer">
				</div>
 				<!-- <div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>  -->
				<button type="submit" class="btn btn-primary" id = "submit">Submit</button>
			</form>
        </div>
	</div>
</div>
