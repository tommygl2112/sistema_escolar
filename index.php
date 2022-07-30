<?php include("database.php") ?>

<?php include("header.php") ?>
    <div class="container p-4">
        <div class="row">
            
            <h1>Base de datos</h1>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
            <br>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
            <h3>Alumnos</h3>
                <table class="table table-hover">
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
                        $query = "SELECT * FROM cat_alumnos";
                        $result_tasks = mysqli_query($con, $query);    

                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['iCodigoAlumno']; ?></td>
                            <td><?php echo $row['vchNombres']; ?></td>
                            <td><?php echo $row['vchApellidos']; ?></td>
                            <td><?php echo $row['dtFechaNac']; ?></td> <!-- Y-m-d -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <h3>Materias</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM cat_materias";
                        $result_tasks = mysqli_query($con, $query);    

                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['vchCodigoMateria']; ?></td>
                            <td><?php echo $row['vchMateria']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <h3>Calificaciones</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo del alumno</th>
                            <th>Codigo de la materia</th>
                            <th>Calificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM cat_rel_alumno_materia";
                        $result_tasks = mysqli_query($con, $query);    

                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['iCodigoAlumno']; ?></td>
                            <td><?php echo $row['vchCodigoMateria']; ?></td>
                            <td><?php echo $row['fCalificacion']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php include("footer.php") ?>