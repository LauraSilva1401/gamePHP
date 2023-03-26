<nav id="barraMenu" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PHP Game</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php 
      $valeButton="Log in";
      if (isset($_SESSION['LOGIN_STATUS'])) {
            $valeButton="Log out";

            $histButton="Stop";
    ?>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagina=game">Game</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">History</a>
          </li>
        </ul>
    <?php 
        }      
        
    ?>
      <form class="d-flex">
        <button class="btn btn-outline-success" type="submit" id="LogOut" value="<?= $valeButton?>"><?= $valeButton?></button>
        <?php
        if(isset($_SESSION['LOGIN_STATUS'])){
          ?>
          <button class="btn btn-outline-success" type="submit" id="Stop" value="<?= $histButton?>"><?= $histButton?></button>
          <?php
        }
        ?>
        
      
      </form>
    </div>
  </div>
</nav>