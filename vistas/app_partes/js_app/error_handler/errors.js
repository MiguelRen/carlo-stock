
   export  class Custom_Error extends Error {
        constructor(nombre, message) {
            this.nombre = nombre;
            super(message);
            this.name = this.nombre;
        }
    }
