<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
  <H1 align="center"> ADMINISTRACIÓN DE PRODUCTOS</H1>

  <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
  </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        
        <!-- Botón para ir al módulo de ventas -->
        <a href="crear-venta" class="btn btn-success">
          Ir al módulo de crear ventas
        </a>

        <!-- Botón para agregar producto -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>IMAGEN</th>
           <th>CODIGO</th>
           <th>NOMBRE</th>
           <th>CATEGORIA DEL PRODUCTO</th>
           <th>STOCK</th>
           <th>MEDIDAS</th>
           <th>COLOR DEL PRODUCTO</th>
           <!-- #region -->
           <th>PRECIO DE VENTA (Bs.)</th>
          
           <th>FECHA DE CREACION</th>
           <th>ACCIONES</th>
           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#473119; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar producto</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                                    <option value="">Seleccionar categoría</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                                    foreach ($categorias as $key => $value) {
                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Ingresar Nombre" required oninput="validarSoloLetrasDescripcion()">
                            </div>
                            <small id="errorMensajeDescripcion" style="color:red; display:none;">Por favor, ingrese solo letras y espacios.</small>
                        </div>

                        <!-- ENTRADA PARA STOCK -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoStock" id="nuevoStock" min="0" placeholder="Stock" required>
                            </div>
                            <small id="errorMensajeStock" style="color:red; display:none;">Por favor, ingrese un valor mayor o igual a 0.</small>
                        </div>

                        <!-- ENTRADA PARA LAS MEDIDAS -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoMedidas" placeholder="Ingresar Medidas" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL COLOR -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" id="nuevoColor" name="nuevoColor" placeholder="Ingresar Color" required>
                            </div>
                            <small id="errorMensajeColor" style="color:red; display:none;">Por favor, ingrese solo letras y espacios.</small>
                        </div>

                        <!-- ENTRADA PARA PRECIO VENTA -->
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" placeholder="Precio de venta" required>
                            </div>
                            <small id="errorMensajePrecio" style="color:red; display:none;">Por favor, ingrese solo números.</small>
                            <br>
                        </div>

                    </div>

                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-group">
                        <div class="panel">SUBIR IMAGEN</div>
                        <input type="file" class="nuevaImagen" name="nuevaImagen">
                        <p class="help-block">Peso máximo de la imagen 2MB</p>
                        <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar producto</button>
                </div>

            </form>

            <?php
            $crearProducto = new ControladorProductos();
            $crearProducto->ctrCrearProducto();
            ?>  

        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar producto</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <select class="form-control input-lg" name="editarCategoria" readonly required>
                  <option id="editarCategoria"></option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>
                </div>
                <small id="errorMensajeDescripcion" style="color:red; display:none;">Por favor, ingrese solo letras y espacios.</small>
            </div>


            <!-- ENTRADA PARA STOCK -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>
              </div>
              <small id="errorMensajeStock" style="color:red; display:none;">Por favor, ingrese un número válido mayor o igual a 0.</small>
            </div>

            <!-- ENTRADA PARA EDITAR MEDIDAS -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" class="form-control input-lg" id="editarMedidas" name="editarMedidas" required>
              </div>
            </div>

            <!-- ENTRADA PARA COLOR -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" class="form-control input-lg" id="editarColor" name="editarColor" required>
              </div>
              <small id="errorMensajeColor" style="color:red; display:none;">Por favor, ingrese solo letras y espacios.</small>
            </div>

             <!-- ENTRADA PARA PRECIO VENTA -->
             <div class="col-xs-6">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                            <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>
                            </div>
                            <small id="errorMensajePrecio" style="color:red; display:none;">Por favor, ingrese un valor numérico válido.</small>
                            <br>
                        </div>

                    </div>

                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-group">
                        <div class="panel">SUBIR IMAGEN</div>
                        <input type="file" class="nuevaImagen" name="nuevaImagen">
                        <p class="help-block">Peso máximo de la imagen 2MB</p>
                        <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    </div>
                </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

      <?php
        $editarProducto = new ControladorProductos();
        $editarProducto->ctrEditarProducto();
      ?> 

    </div>
  </div>
</div>

<?php
  $eliminarProducto = new ControladorProductos();
  $eliminarProducto->ctrEliminarProducto();
?>
