<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">

            <!-- Solo para Administrador -->
            <?php if ($_SESSION["perfil"] == "Administrador"): ?>
                <li class="active">
                    <a href="inicio">
                        <i class="fa fa-home" style="font-size:22px;"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios">
                        <i class="fa fa-user-secret" style="font-size:22px;"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Para Administrador y Tejedor -->
            <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Tejedor"): ?>
                <li>
                    <a href="categorias">
                        <i class="fa fa-contao" style="font-size:22px;"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li>
                    <a href="productos">
                        <i class="fa fa-product-hunt" style="font-size:22px;"></i>
                        <span>Productos</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Para Administrador y Vendedor -->
            <?php if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"): ?>
                <li>
                    <a href="clientes">
                        <i class="fa fa-users" style="font-size:22px;"></i>
                        <span>Clientes</span>
                    </a>
                </li>

                <!-- Menú desplegable para Ventas -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog fa-spin" style="font-size:22px;"></i>
                        <span>Ventas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="crear-venta">
                                <i class="fa fa-circle-o"></i>
                                <span>Crear venta / pedido</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Acceso directo a Ventas -->
                <li>
                    <a href="ventas">
                        <i class="fa fa-shopping-cart" style="font-size:24px;"></i>
                    </a>
                </li>

                <!-- Menú desplegable para Pagos -->
                <li class="treeview">
                    <a href="pagos">
                        <i class="fa fa-credit-card" style="font-size:24px;"></i>
                        <span>Pagos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="ventaspagos">
                                <i class="fa fa-money"></i>
                                <span>Adm. Pagos</span>
                            </a>
                        </li>

						<li>
                            <a href="pagos">
                                <i class="fa fa-circle"></i>
                                <span>Pagos</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Acceso directo a Reportes -->
                <li>
                    <a href="reportes">
                        <i class="fa fa-print" style="font-size:24px;"></i>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </section>
</aside>
