const modal1 = document.querySelector('.modal1');


// trayendo el boton  para mostar el modal
const modal_button = document.getElementById("boton_agregar_art");



modal_button.addEventListener('click',(e) => {
  
  e.preventDefault();

  modal1.classList.add('modal1-show');

  
  agregarFila()

});


//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_button = document.getElementById("ag_det_button");

let contador_fila = 0;

//trayendo la tabla entera del modal
// const tabla = document.getElementById("tabla_modal");


function agregarFila(e){

  // console.log(tabla);
  
  // let nueva_fila = document.createElement('tr');

const fila_arreglo = ["modal-descripcion_","modal-unidad_","modal-tipo_art_","modal-cantidad_","modal-precio_","modal-iva_","modal-neto_"];
const fragmento = document.createDocumentFragment();
const tr = document.createElement("tr");

fila_arreglo.forEach( item =>{
  console.log(fragmento);
  
  const td = document.createElement('td');
  const input = document.createElement('input');

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

  document.getElementById('tbody_modal').appendChild(fragmento);
  
  contador_fila = contador_fila + 1;
}
ag_det_button.addEventListener('click', e => {
   e.preventDefault();


  agregarFila();

});

