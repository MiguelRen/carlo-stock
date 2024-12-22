// archivo para gestionar el dinamismo del area de registro de facturas



//clase para extraer elementos
import {Extraer_elemento}  from "./extraer_elemento.js"; 





let extraer = new Extraer_elemento();
console.log(extraer.elemento_por_query(".modal1"));










// trayendo el boton  para mostar el modal
const modal1 = document.querySelector(".modal1");




//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_button = document.getElementById("ag_det_button");



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
