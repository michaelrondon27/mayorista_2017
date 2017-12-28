<!-- start: Header -->
<nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">
            <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
            <a href="?view=index" class="navbar-brand"> 
                <b><?php echo APP_TITLE;?></b>
            </a>
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_users[$_SESSION['app_id']]['nombre'] ?></span></li>
                <li class="dropdown avatar-dropdown" style="margin-right: 10px;">
                	<img src="<?php echo $_users[$_SESSION['app_id']]['foto'] ?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                	<ul class="dropdown-menu user-dropdown">
                   		<li><a href="?view=perfil&mode=miperfil"><span class="fa fa-user"></span> Mi Perfil</a></li>
                   		<li><a href="?view=logout"><span class="fa fa-power-off"></span> Cerrar Sesión</a></li>
                   		<!--<li role="separator" class="divider"></li>
                   		<li class="more">
                   			<ul>
                      			<li><a href=""><span class="fa fa-cogs"></span></a></li>
                       			<li><a href=""><span class="fa fa-lock"></span></a></li>
                       			<li><a href=""><span class="fa fa-power-off "></span></a></li>
                   			</ul>
                   		</li>-->
                	</ul>
                </li>
                <!--<li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>-->
            </ul>
        </div>
    </div>
</nav>
<!-- end: Header -->
<div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    <div id="left-menu">
        <div class="sub-left-menu scroll">
            <ul class="nav nav-list">
                <li><div class="left-bg"></div></li>
                <li class="time">
                    <h1 class="animated fadeInLeft">21:00</h1>
                    <p class="animated fadeInRight">Sat,October 1st 2029</p>
                </li>
                <li id="inicio" class="ripple"><a href="?view=index" class='navegacion'><span class="fa-home fa"></span>Inicio</a></li>
                <li class="ripple" id="beneficiario">
                    <a class="tree-toggle nav-header">
    	                <span class="fa fa-id-card-o"></span> Beneficiarios
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=beneficiario&mode=add">Nuevo Beneficiario</a></li>
                        <li><a href="?view=beneficiario">Consultar Beneficiarios</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="cronograma3er">
        	            <span class="fa fa-print"></span> 3er Cronograma
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=3ercronograma&mode=addCotizacion" class='navegacion'>Nuevo Presupuesto</a></li>
                        <li><a href="?view=3ercronograma&mode=allCotizacion" class='navegacion'>Consultar Presupuesto</a></li>
                        <li><a href="?view=3ercronograma&mode=estadoCotizaciones" class='navegacion'>Reporte Mensual</a></li>
                        <li><a href="?view=3ercronograma&mode=estadoFinanciero" class='navegacion'>Estado Financiero</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header" id="cronograma4to">
                        <span class="fa fa-print"></span> 4to Cronograma
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=4tocronograma&mode=addCotizacion" class='navegacion'>Nuevo Presupuesto</a></li>
                        <li><a href="?view=4tocronograma&mode=allCotizacion" class='navegacion'>Consultar Presupuesto</a></li>
                        <li><a href="?view=4tocronograma&mode=estadoCotizaciones" class='navegacion'>Reporte Mensual</a></li>
                        <li><a href="?view=4tocronograma&mode=estadoFinanciero" class='navegacion'>Estado Financiero</a></li>
                    </ul>
                </li>
                <li class="ripple">
                	<a class="tree-toggle nav-header" id="inventario">
                		<span class="fa fa-shopping-cart"></span> Inventario  
                		<span class="fa-angle-right fa right-arrow text-right"></span> 
                	</a>
                    <ul class="nav nav-list tree">
                    	<li><a href="?view=inventario&mode=allInventario3erCronograma" class='navegacion'>3er Cronograma</a></li>
                        <li><a href="?view=inventario&mode=allInventario4toCronograma" class='navegacion'>4to Cronograma</a></li>
                    </ul>
                </li>
                <?php
                    if($_users[$_SESSION['app_id']]['id_perfil']==1){
                        ?>
                            <li class="ripple">
                                <a class="tree-toggle nav-header" id="usuario">
                                    <span class="fa fa-address-book-o"></span> Usuarios  
                                    <span class="fa-angle-right fa right-arrow text-right"></span> 
                                </a>
                                <ul class="nav nav-list tree">
                                    <li><a href="?view=user&mode=add" class='navegacion'>Nuevo Usuario</a></li>
                                    <li><a href="?view=user" class='navegacion'>Consultar Usuarios</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                ?>
                <li class="ripple">
                	<a class="tree-toggle nav-header" id="configuracion">
                		<span class="fa fa-cog"></span>Configuración
                		<span class="fa-angle-right fa right-arrow text-right"></span> 
                	</a>
                    <ul class="nav nav-list tree">
                        <li><a href="?view=config&mode=allProductos" class='navegacion'>Productos</a></li>
                        <li><a href="?view=config&mode=allModelos" class='navegacion'>Modelos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- end: Left Menu -->