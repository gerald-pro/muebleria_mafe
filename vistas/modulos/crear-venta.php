
<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      CREACIÓN DE VENTAS/PEDIDOS
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Crear venta</li>
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="100" readonly>';
                  

                    }else{

                      foreach ($ventas as $key => $value) {
                        
                      }

                      $codigo = $value["codigo"] + 1;

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control select2" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                  

                  </div>
                
                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-right">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th>Descuento</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      

                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><b>Bs.</b></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!--=====================================
                ENTRADA TIPO VENTA O PEDIDO
                ======================================-->

                <div class="form-group row">
                  
                <div class="col-xs-6" style="padding-right:0px">
                    
                      <thead>

                      <tr>
                        <th><strong>SELECCIONE VENTA O PEDIDO</strong></th>    
                      </tr>

                      </thead>
                   

                    <div class="input-group">
                      
                      <select class="form-control" id="tipovp" name="tipovp" required>
                        <option value="">TIPO</option>
                        <option value="Venta">VENTA</option>
                        <option value="Pedido">PEDIDO</option>
                      

                      </select>    

                    </div>
                  </div>

                 </div>

                <br>
                 <thead>

                      <tr>
                        <th><strong>SELECCIONE METODO DE PAGO</strong></th>    
                      </tr>

                  </thead>
                <br>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">
                  

                  <div class="col-xs-6" style="padding-right:0px">
                     <div class="input-group">
                  

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">METODO DE PAGO</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="QR">Transacción</option>
                 
                       
                      </select>    

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>

                <br>
      
              </div>

          </div>

          <div class="box-footer">
            <div class="pull-right">
               <div class="checkbox">
                   <!-- <label> <input type="checkbox" checked value="1" name="impresion"> Imprimir Ticket</label> -->
                </div>
                <button type="submit" class="btn btn-primary pull-right">Guardar Venta / Pedido</button>
            </div>
          </div>

        </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">

          <div class="box-header with-border">
            <!-- Agregar un botón para agregar un nuevo producto -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
          </div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              

               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  <th>IMAGEN</th>
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>STOCK</th>
                  <th>ACCIONES</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>
   
  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#473119; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoCliente" id="nuevoCliente" placeholder="Ingresar nombre" required oninput="validarSoloLetras()">
              </div>
              <small id="errorMensajeNombre" style="color:red; display:none;">Por favor, ingrese solo letras.</small>
            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar teléfono" required oninput="validarSoloNumeros()">
              </div>
              <small id="errorMensajeTelefono" style="color:red; display:none;">Por favor, ingrese solo números.</small>
            </div>


            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

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
