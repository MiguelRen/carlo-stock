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
  