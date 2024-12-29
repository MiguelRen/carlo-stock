/**Documento que gestiona la captacion, gestion, peticion de datos ante el controlador */

/**
 * Clase que gestiona los procesos relacionados con los datos
 */
export class Gestion_datos {
  constructor() {
    this.dir_control = "../../../controladores/c_facturas.php";
  }

  /**
   * @param null- No recibe paràmetros
   * @returns {Promise<Array>} - Un arreglo con los valores de las facturas
   */
  traer_todas_facturas() {
    try {
      /**
       * @constant {Array} - Indica los parametros a ser enviados ene le fetch
       */
      const opciones = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      };
      /**
       *@param {string} - url de Direccion del controlador a quien se va a pedir la información
       *@param {Array} - Las opciones que se van a enviar junto con la peticion "metodo, header,body ..."
       *@throws {Error} - si la peticion es fallida
       *@returns {Promise<Object>} - promesa que se resuelve con las datos optenidos desde el controlador
       */
      fetch(this.dir_control, opciones)
        .then((response) => {

         const result = response.json();
          console.log(result.Array);
          
            return response.json();
          
        })
        .catch((error) => {
          throw new Error("Problemas" + error);
          ;
        });
    } catch (error) {
      throw new Error("Problemas  => " + error);
    }
  }

  guardar_detalle(data) {
    try {
      const opciones = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      };
      console.log(data);

      fetch("../../../modelos/m_facturas.php", opciones).then((response) => {
        if (!response.ok) {
          throw new Error("error en repuesta" + response.statusText);
        } else {
          console.log(response);
        }

        return response.json();
      });
    } catch (error) {
      console.log(error);
    }
  }
}
