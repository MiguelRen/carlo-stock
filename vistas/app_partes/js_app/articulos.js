const modal1 = document.querySelector(".modal1");

// trayendo el boton  para mostar el modal
const modal_button = document.getElementById("boton_agregar_art");

modal_button.addEventListener("click", (e) => {
  e.preventDefault();

  modal1.classList.add("modal1-show");

  agregarFila();
});

//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_button = document.getElementById("ag_det_button");

//trayendo la tabla entera del modal
// const tabla = document.getElementById("tabla_modal");

function agregarFila(e) {
  // console.log(tabla);

  // let nueva_fila = document.createElement('tr');

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

  document.getElementById("tbody_modal").appendChild(fragmento);
}

ag_det_button.addEventListener("click", (e) => {
  e.preventDefault();

  agregarFila();
});





const form_ppal = document.getElementById("form_ppal");


function guardar_detalle(e){
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
    });
    console.log(celdas_array);
  
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
