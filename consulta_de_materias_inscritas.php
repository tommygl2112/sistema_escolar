<?php include("database.php") ?>

<?php include("header.php") ?>
    <div class="container p-4">
        <div class="row">
            
            <h1>Consulta de materias inscritas</h1>
            <div class="col-md-6">
            </div>

            <form action="" method="get">
                <div class="mb-3">

                    <label for="codigoInput" class="form-label">Codigo del alumno</label> 
                    <input type="text" name="codigoAlumno" class="form-control">

                </div>
                
                <button type="submit" name="enviar" class="btn btn-primary">Buscar</button>

            </form>

        </div>

    </div>

    <div class="container p-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo del alumno</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Codigo de la materia</th>
                        <th>Nombre de la materia</th>
                        <th>Calificacion obtenida</th>
                    </tr>
                </thead>

                <tbody>
                    <?php


                    if(isset($_GET['enviar'])){
                        $codigoAlumno = $_GET['codigoAlumno'];

                        if (empty($codigoAlumno) || !is_numeric($codigoAlumno)) {
                            echo "<p class='error'>* Ingrese un codigo valido </p>";
                        }
                        else{
                        $query =    "SELECT a.iCodigoAlumno, a.vchNombres, a.vchApellidos, a.dtFechaNac,
                                            m.vchCodigoMateria, m.vchMateria, r.fCalificacion
                                    FROM cat_rel_alumno_materia as r
                                    
                                    INNER JOIN cat_alumnos as a ON a.iCodigoAlumno = r.iCodigoAlumno
                                    INNER JOIN cat_materias as m ON m.vchCodigoMateria = r.vchCodigoMateria
                                    WHERE a.iCodigoAlumno LIKE '%$codigoAlumno%' ";

                            
                        $result = mysqli_query($con, $query);  


                        while ($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['iCodigoAlumno']; ?></td>
                            <td><?php echo $row['vchNombres']; ?></td>
                            <td><?php echo $row['vchApellidos']; ?></td>
                            <td><?php echo $row['dtFechaNac']; ?></td> <!-- Y-m-d -->
                            <td><?php echo $row['vchCodigoMateria']; ?></td>
                            <td><?php echo $row['vchMateria']; ?></td>
                            <td><?php echo $row['fCalificacion']; ?></td>
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