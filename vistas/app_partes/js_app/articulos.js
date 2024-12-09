const modal1 = document.querySelector('.modal1');
console.log(modal1);
console.log(modal1.classList);

// trayendo el boton  para mostar el modal
const modal_button = document.getElementById("boton_agregar_art");
console.log(modal_button);


modal_button.addEventListener('click',(e) => {
  
  e.preventDefault();
  modal1.classList.add('modal1-show');
});


//trayendo el boton de agregar nuevo renglon en el modal
const ag_det_button = document.getElementById("ag_det_button");


//trayendo la tabla entera del modal
const tabla = document.getElementById("tabla_modal");
console.log(tabla);


ag_det_button.addEventListener('click', e => {
  console.log(tabla);
   

  function agregarFila(tabla){
    let fila_nueva = tabla.insertRow(0);
    let celda_nueva = fila_nueva.insertCell(0);
    celda_nueva.innerHTML = "<input type='text' />";
    let texto_nuevo = document.createTextNode("nueva fila");
    celda_nueva.appendChild(texto_nuevo);
  }

  agregarFila(tabla);

});