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
      .then((data) => {
        return inst_cre_elem.desplegar_lista_tabla(data, "tbody_id");
      })
      .catch((error) => {
        throw new Error("problemas con " + error);
      });
  } catch (error) {
    throw new Error("Problemas " + error);
  }
});

/** Instancia para extraer elemento */
const manejo_DOM = new Manejo_DOM_elementos();
const boton_ag_art = manejo_DOM.extraer_elem_por_id("boton_agregar_art");

/**La instancia para crear elementos en el dom */
const crea_elementos = new Creacion_elementos();

/**Disparar el evento cuando se de  click en el boton agregar articulo*/
boton_ag_art.addEventListener("click", (e) => {
  try {
    e.preventDefault();
    const modal_ag_art = manejo_DOM.extraer_elem_por_id("section_modal");

    manejo_DOM.agregar_css_clase(modal_ag_art, "modal1-show");

    crea_elementos.agregar_fila_en_tablas("tbody_modal");
  } catch (error) {
    console.log(error.message);
  }
});

//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_boton = manejo_DOM.extraer_elem_por_id("ag_det_button");

/**
 * Procedimiento que escucha los click que  se  hacen en el boton de agregat  detalle e inserta una nueva fila
 */
ag_det_boton.addEventListener("click", (e) => {
  e.preventDefault();

  const crea_elementos = new Creacion_elementos();
  crea_elementos.agregar_fila_en_tablas("tbody_modal");
});

/**Se extrae el elemento que guarda el registro completo de las facturas */
const guardar_det_boton = manejo_DOM.extraer_elem_por_id(
  "guar_registro_button"
);

/** procedimiento */

guardar_det_boton.addEventListener("click", (e) => {
  try {
    e.preventDefault();
    const form_factura_general  = manejo_DOM.extraer_elem_por_query("form");
    console.log(form_factura_general);
    const inputs = form_factura_general.querySelectorAll(".form-control");
    const inputs_array = Array.from(inputs);
    const inputs_values_array = inputs_array.map(item => [ item.name , item.value, ]);
    const result = guardar_factura_general(inputs_values_array);
    console.log(result);
    
    //  inputs_values_array.forEach(value =>{
  //   console.log(value);
  //   });
     
    
    // const id_factura            = guardar_factura_general();
    
    /**Escuchar el Evento Submit */
    // form_factura_general.addEventListener("submit", (e) =>{
    //   e.preventDefault();
    //   const datos = Object.fromEntries(
    //     new FormData(e.target)
        
    //   );
    //   console.log(datos);
      
    // });
    // if (id_factura) {
    // } else {
    //   throw new Error("Registry Id Error\n" + error.message);
    // }
  } catch (error) {
    console.log(error);
  }






  const elemento_modal = manejo_DOM.extraer_elem_por_id("tbody_modal");

  const celdas_array = [];
  const filas = Array.from(elemento_modal.getElementsByTagName("tr"));
  //this operation must be fixed
  filas.forEach((element) => {
    const input = Array.from(element.getElementsByTagName("input"));
    const valores_input = input.map((celda) => {
      const value = celda.querySelector("input");
      celdas_array.push(value);

      return value ? value.value : null;
    });
  });

  celdas_array.push({ accion: "agregar_detalle" });

  const data = JSON.stringify(celdas_array);

  // datos.guardar_detalle(data);
});

function guardar_factura_general(factura_datos_array) {
  try {
    const data = factura_datos_array;
    console.log(data);


    /**If que comprueba si ha llegado un arreglo o no */
    if (data instanceof Array) {
      const factura_nueva = new Gestion_datos();
      const result = factura_nueva.guardar_fatura(data);
      return result;
    } else {
      throw new Error("Array type required", error.message);
    }
  
  } catch (error) {
    console.log(error);
  }
}
