<!-- Modal para tarjetas -->
<div class="modal modal-lg fade" id="tarjetaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalTarjeta">Añadir tarjeta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" id="alertTarjeta">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
          </svg>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" /></svg>
            <div style="color: #fff" id="alertTarjetaText">
              Por favor, ingresa todos los datos a continuación:
            </div>
          </div>
        </div>

        <form id="tarjetaForm" method="post">
          <input type="hidden" name="id" id="idInput">
          <?php 
         $sql = mysqli_query($conn, "SELECT * FROM clientes");
         ?>

          <div class="row">
            <div class="col-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="clienteid" id="clienteSelect"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <?php          
                  while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"] . " " . $row["ape_paterno"] . " " . $row["ape_materno"]; ?></option>
                  <?php } ?>
                </select>
                <label for="clienteSelect">¿A quién pertenece esta tarjeta?</label>
              </div>
            </div>
          </div>

          <div id="contSwitch">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="switchTitular">
              <label class="form-check-label" for="switchTitular">¿El cliente es el titular de la tarjeta?</label>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="titular" id="titularInput" placeholder="Nombre De Ejemplo"
                  required>
                <label for="titularInput">Titular de la tarjeta</label>
              </div>
            </div>

            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="numero" id="numeroInput"
                  placeholder="0000 0000 0000 0000" required>
                <label for="numeroInput">Número de tarjeta</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fechaexpiracion" id="fechaExpiracionInput"
                  placeholder="Nombre De Ejemplo" required>
                <label for="fechaExpiracionInput">Fecha de expiración (MM/AA)</label>
              </div>
            </div>

            <div class="col-8">
              <div class="form-floating">
                <select class="form-select" name="tarjetahabiente" id="tarjetaHabienteSelect"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <option value="empresa">Empresa</option>
                  <option value="cliente">Cliente</option>
                </select>
                <label for="tarjetaHabienteSelect">¿La tarjeta es de la empresa o de un cliente?</label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button id="btnCancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnSubmitTarjeta" type="submit" class="btn btn-primary">Agregar tarjeta</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para datos de facturación -->
<div class="modal modal-lg fade" id="datoFacturacionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalDatoFacturacion">Añadir información de facturación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" id="alertDatoFacturacion">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
          </svg>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" /></svg>
            <div style="color: #fff" id="alertDatoFacturacionText">
              Por favor, ingresa todos los datos a continuación:
            </div>
          </div>
        </div>

        <form id="datoFacturacionForm" method="post">
          <input type="hidden" name="id" id="idInput2">
          <?php 
         $sql = mysqli_query($conn, "SELECT * FROM clientes");
         ?>

          <div class="row">
            <div class="col-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="clienteid2" id="clienteSelect2"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <?php          
                  while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"] . " " . $row["ape_paterno"] . " " . $row["ape_materno"]; ?></option>
                  <?php } ?>
                </select>
                <label for="clienteSelect2">¿A quién pertenecen estos datos de facturación?</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="correo_electronico" id="correoElectronicoInput" placeholder="ejemplo@mail.com"
                  required>
                <label for="correoElectronicoInput">Correo electrónico de la empresa</label>
              </div>
            </div>

            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="clave" id="claveInput"
                  placeholder="0A0B0C0D0" required>
                <label for="claveInput">Clave</label>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button id="btnCancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnSubmitDatoFacturacion" type="submit" class="btn btn-primary">Agregar información de facturación</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para transacciones -->
<div class="modal modal-lg fade" id="transaccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalTransaccion">Añadir transacción</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" id="alertTransaccion">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
          </svg>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" /></svg>
            <div style="color: #fff" id="alertTransaccionText">
              Por favor, ingresa todos los datos a continuación:
            </div>
          </div>
        </div>

        <form id="transaccionForm" method="post">
          <input type="hidden" name="id3" id="idInput3">
          <?php 
         $sql = mysqli_query($conn, "SELECT * FROM clientes");
         ?>

          <div class="row">
            <div class="col-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="clienteid3" id="clienteSelect3"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <?php          
                  while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"] . " " . $row["ape_paterno"] . " " . $row["ape_materno"]; ?></option>
                  <?php } ?>
                </select>
                <label for="clienteSelect3">¿A quién pertenece esta transacción?</label>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="descripcion" id="descripcionInput"
                  placeholder="Combo pareja y dulcería" required>
                <label for="descripcionInput">Descripción</label>
              </div>
            </div>

            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="cantidad" id="cantidadInput"
                  placeholder="0000" required>
                <label for="cantidadInput">Cantidad de la transacción ($ MXN)</label>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button id="btnCancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnSubmitTransaccion" type="submit" class="btn btn-primary">Agregar transacción</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para facturas -->
<div class="modal modal-lg fade" id="facturaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalFactura">Añadir factura</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" id="alertFactura">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
          </svg>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" /></svg>
            <div style="color: #fff" id="alertFacturaText">
              Por favor, ingresa todos los datos a continuación:
            </div>
          </div>
        </div>

        <form id="facturaForm" method="post">
          <input type="hidden" name="id3" id="idInput3">
          <?php 
         $sql = mysqli_query($conn, "SELECT * FROM transaccion");
         ?>

          <div class="row">
            <div class="col-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="transaccionid" id="transaccionIdInput"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <?php          
                  while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["descripcion"] . " (" . $row["fecha_hora"] . ") $" . $row["cantidad"]; ?></option>
                  <?php } ?>
                </select>
                <label for="transaccionIdInput">¿A qué transacción se realizará la factura?</label>
              </div>
            </div>
          </div>

          <?php 
         $sql = mysqli_query($conn, "SELECT * FROM dato_facturacion");
         ?>

          <div class="row">
            <div class="col-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="datosid" id="datosTransaccionIdInput"
                  aria-label="Floating label select example" required>
                  <option value="" disabled selected>Selecciona..</option>
                  <?php          
                  while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?php echo $row["id"]; ?>">Correo de compañía: <?php echo $row["correo_electronico"] . " Clave: " . $row["clave"] ?></option>
                  <?php } ?>
                </select>
                <label for="datosTransaccionIdInput">¿Cuáles serán los datos de facturación?</label>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button id="btnCancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnSubmitTransaccion" type="submit" class="btn btn-primary">Agregar transacción</button>
      </div>
      </form>
    </div>
  </div>
</div>