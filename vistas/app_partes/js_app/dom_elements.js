/** Aqui se gestiona el js que permite deplegar el modal de factura */

import { Custom_Error } from "./error_handler/errors.js";

/**Esta clase permite gestionar la muestra de los modales
 * @class
 */
export class Manejo_DOM_elementos {
  /**
   *  El parametro para indicar cuales  son los modales  que pueden ser mostrados
   * @param
   */
  fragmento = ["factura", "inventario"];

  /**
   * @param {string} app_parte  - Indica el tag o elemento que se quiere mostrar
   * @param {string} fragmento  - Indica el arreglo de etiquetas validas a ser mostradas
   */
  constructor(app_parte, fragmento) {
    this.parte = app_parte;
    this.fragmento = fragmento;
  }

  /**
   * extrae los elementos necesarios del archivo de donde fueron llamados
   * @param {string}
   * @return {HTMLCollection,HTMLCollection};
   */
  extraer_elem_por_query(clase_nom) {
    try {
      let result = document.querySelector(clase_nom);

      return result;
    } catch (error) {
      console.log(error.message);
    }
  }

  /**
   * obtener el valor de
   * @returns {string} - el elemento en cuestion.
   */
  extraer_elem_por_id(id) {
    try {
      let result = document.getElementById(id);
      return result;
    } catch (error) {
      console.log(error.message);
    }
  }

  /**
   * 
   * @param {HTMLCollection} dom_elem -elemento que fue extraido del DOM
   * @param {string} clase - Clase que será insertada en el elemento extraido
   */

  agregar_css_clase(dom_elem, clase) {
    try {
      /**
       * lo siguiente debería ser provisional
       */
      if (dom_elem instanceof Object) {
        dom_elem.classList.add(clase);
      } else {
        console.log("valor enviado a agregar_csss_clase no es un elemento HTMLCollection válido");
      }

    } catch (error) {
      console.log(error.message);

    }
  }



  agregar_fila(element_id) {
    try {

      const fila_arreglo = [
        "modal-descripcion",
        "modal-unidad",
        "modal-tipo_art",
        "modal-cantidad",
        "modal-precio",
        "modal-iva",
        "modal-neto",
      ];

      const fragmento = document.createDocumentFragment();
      const tr = document.createElement("tr");

      fila_arreglo.forEach((item) => {
        const td = document.createElement("td");
        const input = document.createElement("input");
        input.setAttribute("id", `${item}`);

        input.classList.add("w");
        tr.appendChild(td);
        td.appendChild(input);

        fragmento.appendChild(tr);
      });

      this.extraer_elem_por_id(element_id).appendChild(fragmento);

    } catch (error) {

      throw new Custom_Error;
    }


  }
}
