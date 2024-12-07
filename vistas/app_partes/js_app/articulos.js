const modal1 = document.querySelector('.modal1');
console.log(modal1);
console.log(modal1.classList);


const modal_button = document.getElementById("boton_agregar_art");
console.log(modal_button);


modal_button.addEventListener('click',(e) => {
  
  e.preventDefault();
  modal1.classList.add('modal1-show');
});
