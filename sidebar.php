<?php
//////////////////////////////////////////
//    CRMLite Versão 1.0        //
//    Developer: Jhon Fallon.     //
//    Site: fb.com/jhowbhz      //
//////////////////////////////////////////

?>
<aside class="main-sidebar">
  <section class="sidebar">
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU PRINCIPAL</li>
      <li>
        <a href="index.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">novo</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Menus</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pagina1.php"><i class="fa fa-circle-o"></i> Menu 1</a></li>
          <li><a href="pagina2.php"><i class="fa fa-circle-o"></i> Menu 2</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>