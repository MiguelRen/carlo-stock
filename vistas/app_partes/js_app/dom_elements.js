/** Aqui se gestiona el js que permite deplegar el modal de factura */

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
  
  agregar_css_clase(dom_elem, clase ) {
    try {
      /**
       * lo siguiente debería ser provisional
       */
      if(dom_elem instanceof Object ){
        dom_elem.classList.add(clase);
      }else{
        console.log("valor enviado a agregar_csss_clase no es un elemento HTMLCollection válido");
      }

    } catch (error) {
      console.log(error.message);
      
    }
  }
}

//trayendo la tabla entera del modal
// const tabla = document.getElementById("tabla_modal");
