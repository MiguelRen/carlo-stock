/** Aqui se gestiona el js que permite deplegar el modal de factura */

/**Esta clase permite gestionar la muestra de los modales
 * @class
*/
export class Show_fragmento {
  /**
   *  El parametro para indicar cuales  son los modales  que pueden ser mostrados
   * @param
  */
 app_modales = ["factura", "inventario"];
 
 constructor(app_parte) {
   this.parte = app_parte;
  }
  
  /**
   * extrae los elementos necesarios del archivo de donde fueron llamados
   * @param {string}
  */
 mostrar_modal(){
    const modal_button = document.getElementById(this.parte);
    const modal1 = document.querySelector(".modal1");
    modal_button.addEventListener("click", (e) => {
      e.preventDefault();
    
      modal1.classList.add("modal1-show");
      console.log(modal1.classList);
    
      agregarFila();
    });
  }
}


//trayendo la tabla entera del modal
// const tabla = document.getElementById("tabla_modal");

