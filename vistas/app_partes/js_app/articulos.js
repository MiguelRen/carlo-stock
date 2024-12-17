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

let contador_fila = 0;

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

    input.classList.add("w");
    tr.appendChild(td);
    td.appendChild(input);

    fragmento.appendChild(tr);
  });

  // console.log(nueva_fila);

  // nueva_fila.innerHTML =`
  //   <td  id="modal-descripcion_${contador_fila}">
  //     <input class="w" type="text" class="w" >
  //   </td>
  //   <td  id="modal-unidad_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   <td  id="modal-tipo_art_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   <td  id="modal-cantidad_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   <td  id="modal-precio_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   <td  id="modal-iva_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   <td  id="modal-neto_${contador_fila}">
  //     <input class="w" type="text" >
  //   </td>
  //   `;

  document.getElementById("tbody_modal").appendChild(fragmento);

  contador_fila = contador_fila + 1;
}

ag_det_button.addEventListener("click", (e) => {
  e.preventDefault();

  agregarFila();
});

try {
  const form_ppal = document.getElementById("form_ppal");

  form_ppal.addEventListener("click", (e) => {
    if ((e.target.id == "guar_registro_button")) {
      const tbody_modal = document.getElementById("tbody_modal");
      const filas = Array.from(tbody_modal.getElementsByTagName("tr"));

      filas.forEach((element) =>{

                const celda = Array.from(element.getElementsByTagName("input"));
                
                const celdas_array = celda.map(item => item.value);
                try {
                  fetch("../../modelos/m_facturas.php",{
                    "method" : "POST",
                    "headers" :{
                      "Content-Type" : " application/json; charset=utf-8"
                    },
                    "body" : JSON.stringify(celdas_array)
                  }).then(response =>{
                    console.log(response);
                    
                  });
                  
                } catch (error) {
                  console.log(error);
                  
                }
                
      });
    }
  }
  )
  
  const guar_registro_button = document.getElementById("guar_registro_button");
} catch (error) {
  console.log(error);
}
