<p>hello in to the game <strong><?= $_SESSION['name']?></strong></p>
<div id="principalDiv" class="container">
	<div class="row justify-content-center">
		<div id="formLogin" class = "col-8 col-sm-8 col-lg-6 col-xl-4 col-xxl-4" >
			<div id="PositiveAlert" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>You have successfully pass.</strong> 
            </div>
			<div id="NegativeAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>An example danger alert.</strong> 
            </div>
            <h3>Level <strong><?= $_SESSION['level']?></strong></h3>
            <h5 id="lives">#Lives:<strong><?= $_SESSION['lives']?></strong></h5>
			<?php 
				if($_SESSION['level'] == 1){
					require_once 'views/level1.php';
				}
			?>
        </div>
	</div>
</div>
