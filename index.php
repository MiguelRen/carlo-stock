<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="utf-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Carlos-Stock</title>
    </head>

    <body>

        <div class="container-fluid" name="container-principal">  
            <div class="row align-items-end" name="row-principal">
                <div class="col-4  mx-auto " name="column-principal">


                <form 
                    action="vistas"
                    method="post"
                    >

                    <div class="card text-center ">
                        
                        <div class="card-header">
                            <div class="card-title">
                                <h1>Carlo-Stock</h1>
                            </div>
                        </div>

                        <div class="card-body ">
                            <div class="card-title ">
                                <h2>Loggin</h2>
                            </div>
                            
                            <label for="usuario-input form-label"> Usuario </label>
                            <input type="text" 
                                name="usuario-input"
                                class="form-control"
                                >

                            <label 
                                for="clave-input"
                                class="form-label"
                                > Clave </label>
                            <input 
                                type="text" 
                                name="clave-input"
                                class="form-control"
                                >

                        </div>

                        <div class="card-footer">
                            <button
                            type="submit"
                            class="btn btn-primary">Ingresar</button>
                        </div>

                    </div>
                </form>


                </div>
            </div>
        </div>    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>



