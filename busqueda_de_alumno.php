<?php include("database.php") ?>

<?php include("header.php") ?>
    <div class="container p-4">
        <div class="row">
            
            <div class="col-md-6">
                <h1>Busqueda de alumnos</h1>
            </div>

            <form action="" method="get">
                <div class="mb-3">

                    <label for="codigoInput" class="form-label">Codigo del alumno</label> 
                    <input type="text" name="busqueda" class="form-control">

                </div>
                
                <button type="submit" name="enviar" class="btn btn-primary">Buscar</button>

            </form>

        </div>

    </div>

    <div class="container p-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                    </tr>
                </thead>

                <tbody>
                    <?php


                    if(isset($_GET['enviar'])){
                        $busqueda = $_GET['busqueda'];

                        if (empty($busqueda) || !is_numeric($busqueda)) {
                            echo "<p class='error'>* Ingrese un codigo valido </p>";
                        }
                        else{
                            $query = "SELECT * FROM cat_alumnos WHERE iCodigoAlumno LIKE '%$busqueda%' ";
                            $result = mysqli_query($con, $query);  


                        while ($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['iCodigoAlumno']; ?></td>
                            <td><?php echo $row['vchNombres']; ?></td>
                            <td><?php echo $row['vchApellidos']; ?></td>
                            <td><?php echo $row['dtFechaNac']; ?></td> <!-- Y-m-d -->
                        </tr>
                        <?php
                        }
                    }
                        }
                        
                        
                    ?>
                </tbody>
            </table>
        </div>

<?php include("footer.php") ?>