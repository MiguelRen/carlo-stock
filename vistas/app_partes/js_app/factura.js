/**
 * JS para gestionar la programacion y dinamismo de las vistas de seccion de facturas
 */

/**
 * importar funcion para extraer elemento
 * @import {}
 */
import { Manejo_DOM_elementos } from "./dom_elements.js";

/**
 * importar clase para gestion de registros y datos
 */
import { gestion_datos } from "./datos.js";

/**instancia de  clase gestion_datos */
const datos = new gestion_datos();

/** extraer elemento */
const manejo_DOM = new Manejo_DOM_elementos();
const boton_ag_art = manejo_DOM.extraer_elem_por_id("boton_agregar_art");

console.log(boton_ag_art);

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
