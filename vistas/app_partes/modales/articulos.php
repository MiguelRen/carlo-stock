<section class="modal1 d-flex">
    <div class="modal_container marging-auto">
        <a href="" class="close">Cerrar</a>


     

            <table id="tabla_modal">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>IVA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="modal-descripcion" value="">
                        </td>
                        <td>
                            <input type="text" name="modal-unidad">
                        </td>
                        <td>
                            <input type="text" name=" modal-tipo_art">
                        </td>
                        <td>
                            <input type="text" name="modal-cantidad">
                        </td>

                       
                        <td>
                            <input type="text" name="modal-precio">
                        </td>
                        <td>
                            <input type="text" name="modal-iva">
                        </td>
                        <td>
                            <input type="text" name="modal-neto">
                        </td>
                    </tr>
                    <tr>
                        <td><button  name accion="accion" value="ag_detalle" class="btn btn-primary" id="ag_det_button">+</button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">

                            <button type="submit" name="accion" value="Agregar" class="btn btn-primary">Guardar y Finalizar</button>
                                <button >Cancelar</button>
                        </td>
                    </tr>
                </tfoot>
            </table>

    </div>
</section>