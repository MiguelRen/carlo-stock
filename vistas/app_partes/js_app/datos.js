export class gestion_datos {

  guardar_detalle(data) {


    try {
      const opciones = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      };

      fetch("../../../modelos/m_facturas.php", opciones).then((response) => {
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