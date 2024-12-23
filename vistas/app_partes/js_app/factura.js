

/**
 * JS para gestionar la programacion y dinamismo de las vistas de seccion de facturas
 */

/**
 * importar funcion para extraer elemento
 * @import {}
 */
import {Manejo_DOM_elementos} from "./dom_elements.js"; 

 







/** extraer elemento */
const manejo_DOM    = new Manejo_DOM_elementos();
const boton_ag_art  = manejo_DOM.extraer_elem_por_id("form_ppal");

console.log(boton_ag_art);

/**Disparar el evento cuando se de  click en el boton agregar articulo*/
boton_ag_art.addEventListener("click",(e =>{
  try {
    const modal_ag_art = manejo_DOM.extraer_elem_por_id( "section_modal" );
    console.log(modal_ag_art);
    manejo_DOM.agregar_css_clase(modal_ag_art,"modal1-show");
    
  } catch (error) {
    console.log(error.message);
  }
}));














//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_button = document.getElementById("ag_det_button");
console.log(ag_det_button);



ag_det_button.addEventListener("click", (e) => {
  e.preventDefault();

  agregarFila();
});

const form_ppal = document.getElementById("form_ppal");

function guardar_detalle(e) {
  if (e.target.id == "guar_registro_button") {
    const tbody_modal = document.getElementById("tbody_modal");
    const filas = Array.from(tbody_modal.getElementsByTagName("tr"));

    filas.forEach((element) => {
      const celda = Array.from(element.getElementsByTagName("input"));

      const celdas_array = [];
      for (i = 0; i < celda.length; i++) {
        celdas_array.push({
          [celda[i].id]: celda[i].value,
        });
      }
      console.log(celdas_array);
    });

    celdas_array.push({ accion: "agregar_detalle" });

    console.log(celdas_array);

    const data = JSON.stringify(celdas_array);

    try {
      const opciones = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      };

      fetch("../../modelos/controladora.php", opciones).then((response) => {
        if (!response.ok) {
          throw new Error("error en repuesta" + response.statusText);
        }

        return response.json();
      });
    } catch (error) {
      console.log(error);
    }
  }
}

form_ppal.addEventListener("click", (e) => {
  guardar_detalle(e);
});
