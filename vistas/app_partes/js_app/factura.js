/**
 * JS para gestionar la programacion y dinamismo de las vistas de seccion de facturas
 */

/**
 * importar funcion para extraer elemento
 * @import {}
 */
import { Manejo_DOM_elementos, Creacion_elementos } from "./dom_elements.js";

/**
 * @import - Traer la clase contiene la funcion que pide todas las facturas
 */
import { Gestion_datos } from "./datos.js";

/** Trae la informacion al cargar la página y crea la lista*/
document.addEventListener("DOMContentLoaded", () => {
  try {
    /**instancia de  clase gestion_datos */
    const datos = new Gestion_datos();
    const inst_cre_elem = new Creacion_elementos();

    datos
      .traer_todas_facturas()
      .then((response) => {
        return inst_cre_elem.desplegar_lista_tabla(response, "tbody_id");
      })

      .catch((error) => {
        console.log(error);
      });
  } catch (error) {
    throw new Error("Problemas " + error);
  }
});

/** Instancia para extraer elemento */
const manejo_DOM = new Manejo_DOM_elementos();
const boton_ag_art = manejo_DOM.extraer_elem_por_id("boton_agregar_art");

/**Disparar el evento cuando se de  click en el boton agregar articulo*/
boton_ag_art.addEventListener("click", (e) => {
  try {
    const modal_ag_art = manejo_DOM.extraer_elem_por_id("section_modal");

    manejo_DOM.agregar_css_clase(modal_ag_art, "modal1-show");

    manejo_DOM.agregar_fila("tbody_modal");
  } catch (error) {
    console.log(error.message);
  }
});

//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_boton = manejo_DOM.extraer_elem_por_id("ag_det_button");

/**
 *
 */
ag_det_boton.addEventListener("click", (e) => {
  e.preventDefault();

  manejo_DOM.agregar_fila("tbody_modal");
});

const guardar_det_boton = manejo_DOM.extraer_elem_por_id(
  "guar_registro_button"
);

guardar_det_boton.addEventListener("click", (e) => {
  const elemento_modal = manejo_DOM.extraer_elem_por_id("tbody_modal");
  const filas = Array.from(elemento_modal.getElementsByTagName("tr"));

  const celdas_array = [];
  filas.forEach((element) => {
    const celda = Array.from(element.getElementsByTagName("input"));

    for (let i = 0; i < celda.length; i++) {
      celdas_array.push({
        [celda[i].id]: celda[i].value,
      });
    }
  });

  celdas_array.push({ accion: "agregar_detalle" });

  const data = JSON.stringify(celdas_array);

  datos.guardar_detalle(data);
});

const form_ppal = document.getElementById("form_ppal");
