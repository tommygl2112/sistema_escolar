<?php include("database.php") ?>

<?php include("header.php") ?>
    <div class="container p-4">
        <div class="row">
            
            <div class="col-md-6">
                <h1>Busqueda de materia</h1>
            </div>

            <form action="" method="get">
                <div class="mb-3">

                    <label for="codigoInput" class="form-label">Codigo de la materia</label> 
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
                        <th>Nombre</th>
                    </tr>
                </thead>

                <tbody>
                    <?php


                    if(isset($_GET['enviar'])){
                        $busqueda = $_GET['busqueda'];

                        if (empty($busqueda)) {
                            echo "<p class='error'>* Ingrese un codigo valido </p>";
                        }
                        else{
                            $query = "SELECT * FROM cat_materias WHERE vchCodigoMateria LIKE '%$busqueda%' ";
                        $result = mysqli_query($con, $query);  


                        while ($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['vchCodigoMateria']; ?></td>
                            <td><?php echo $row['vchMateria']; ?></td>
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