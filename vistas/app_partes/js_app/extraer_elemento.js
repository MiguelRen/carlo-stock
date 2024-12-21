/**  clase para extraer los elementos del DOM */
export class Extraer_elemento {
  /**
   *@param {string} clase_nom - Nombre de la clase del elemento que se quiera buscar
   *@param {string} id        - Npmbre de le id del elemento que se quiera buscar
   */

  /**
   * Optener el valor de el elemento a traves de su clase
   * @returns {string} - el elemento en cuestion.
   */
  elemento_por_query(clase_nom) {
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
  elemento_por_id(id) {
    try {
      let result = document.getElementById(id);
      return result;
    } catch (error) {
      console.log(error.message);
    }
  }
}
