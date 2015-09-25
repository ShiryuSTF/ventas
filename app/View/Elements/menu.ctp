    
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">VENTAS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">                            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Registrar',array('controller'=>'clientes','action'=>'add')) ?></li>
                <li><?php echo $this->Html->link('Listar',array('controller'=>'clientes','action'=>'index')) ?></li>                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Registrar',array('controller'=>'productos','action'=>'add')) ?></li>
                <li><?php echo $this->Html->link('Listar',array('controller'=>'productos','action'=>'index')) ?></li>                
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Reportes</li>
                <li><?php echo $this->Html->link('Productos más vendidos',array('controller'=>'','action'=>'')) ?></li>                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Flujo <span class="caret"></span></a>
              <ul class="dropdown-menu">                                                              
                <li><?php echo $this->Html->link('Ingresos por mes',array('controller'=>'','action'=>'')) ?></li>                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    