/** Aqui se gestiona el js que permite deplegar el modal de factura */

import { Custom_Error } from "./error_handler/errors.js";

/**Esta clase permite gestionar la muestra de los modales
 * @class
 */
export class Manejo_DOM_elementos {

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
        console.log(
          "valor enviado a agregar_csss_clase no es un elemento HTMLCollection válido"
        );
      }
    } catch (error) {
      console.log(error.message);
    }
  }
}

/**
 * @class - que permite la creacion de elementos en el DOM
 */
export class Creacion_elementos {
  /**
   *
   * @param {Array} lista_fact_guardadas - lista con las facturas en BD
   * @param {String} id_tbody - Se trata del nombre del elemento donde se insertará los nuevos elementos
   */
  desplegar_lista_tabla(lista_fact_guardadas, id_tbody) {
    try {
      if (lista_fact_guardadas === null) {
        throw new Error("Data Problems");
      } else {
        /**Posterirormente, por favor colocar a qui un validador, para certificar que el elemento es un tbody de una tabla */
        const instancia_manejo_DOM = new Manejo_DOM_elementos();
        const tbody = instancia_manejo_DOM.extraer_elem_por_id(id_tbody);
        const fragmento = document.createDocumentFragment();

        lista_fact_guardadas.forEach((list_item) => {
          const tr = document.createElement("tr");

          Object.keys(list_item).forEach((key) => {
            const value = list_item[key];

            const td = document.createElement("td");
            td.textContent = value;

            tr.appendChild(td);
          });
          fragmento.appendChild(tr);
        });

        tbody.appendChild(fragmento);
      }
    } catch (error) {
      throw new Error("Problemas " + error);
    }
  }

  /**
   *
   * @param {String} element_id - nombre del tr donde se pretende insertar la  fila
   */
  agregar_fila_en_tablas(element_id) {
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
console.log("inside the try");

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
const manejo_DOM = new Manejo_DOM_elementos();

      manejo_DOM.extraer_elem_por_id(element_id).appendChild(fragmento);
    } catch (error) {
      throw new Custom_Error();
    }
  }
}
