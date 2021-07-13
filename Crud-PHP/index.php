<?php include("db.php")?>
 <?php include("includes/header.php")?>

<!-- AHORA VAMOS A CREAR UNA NAVEGACION NOS DIRIGIMOS A HEARDER-->
    
<div class="container p-4">

<div class="row">
 <div class="col-md-4">

    <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          
       
       </div>

    <?php session_unset(); }?>   <!--session_unset esto limpia la variable seccion-->


    <div class="card card-body">
     <form action="save_task.php" method="POST">
        <div class="form-group">
            <input type="text" name="title" class="form-control"
         placeholder="task title" autofocus>     <!-- para que phpo pueda recibir el valor-->
        </div>
        <div class="form-group">
            <textarea name="descripcion"  rows="2" class="form-control"
             placeholder="task descripcion"></textarea>    <!-- para que phpo pueda recibir el valor-->
        </div>
         <input type="submit" class="btn btn-success btn-block" 
         name="save_task" value="Save Task">
     </form>
 </div>

 <div class="col-md-8">
        <table class="table table-bordered">
        <!-- theaad -->
        <thead>
            <tr>
            <th>titulo</th>
            <th>descripcion</th>
            <th>fecha creacion</th>
            <th>actions</th>
            </tr>
        </thead>
        <!-- para rellenar la table debo de hacer una consulta de php ejemplo -->
        <tbody>
            <?php  
             $query = "SELECT * FROM task";
             $result_tasks = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result_tasks)){ ?>  <!--- con este while recoro mi base de datos para verificar e imprimir los datos en la tabla-->
                
                <tr>
                <?php if($row['id'] != null){?>
                <td><?php  echo $row['titulo']?></td>
                <td><?php echo $row['descripcion']?></td>
                <td><?php echo $row['created_at']?></td>
                <td><a href="edit.php?id=<?php echo $row['id']?>"> editar </a> 
                <a href="delete_task.php?id=<?php echo $row['id']?>"> eliminar</a> 
                <a href="edit.php?id=<?php echo $row['id']?>"> </a>
                </tr>
           <?php }?>
           <?php } ?>
        
        
        </tbody>
        </table>

 </div>
</div>

</div>
<?php include("includes/footer.php")?>