
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    
} else {
    echo  '<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Error!!!</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
                <h1>Atencion</h1>
                <p>La session expiro ingresa nuevamente</p>
                <a href="index.html"><button class="btn btn-danger btn-large">Inicio</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>';    
    exit;
}

$now = time();

if($now > $_SESSION['expire']){
    session_destroy();
    
    echo '<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Error!!!</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
                <h1>Atencion</h1>
                <p>La session expiro ingresa nuevamente</p>
                <a href="login.html"><button class="btn btn-danger btn-large">Inicio</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>'; 
exit;
}

?>
