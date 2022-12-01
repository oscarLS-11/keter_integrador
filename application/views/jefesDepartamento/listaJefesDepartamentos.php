<div class="container-fluid">
    <br>
    <div class="alert alert-success align-middle" role="alert" align="center"><h5>Jefe de departamento</h5></div>
    <br>
</div>
<div class="container" style="width: 80%; height: 80%">
<a class="btn btn-success" href="<?=base_url('index.php/JefeDepartamentosC/inserJefeDepartamento') ?>"><i class="fa-solid fa-plus"></i> Agregar nuevo jefe de departamento</a> <br><br><br>

<table class="table table-striped table-hover align-bottom">
        <thead class="table-dark">
            <th align="center" class="w-25 p-3">Acciones</th>
            <th class="w-auto p-3">Nombre</th>
            <th class="w-auto p-3">Puesto</th>
            <th class="w-auto p-3">Usuario</th>
            <th class="w-auto p-3">Contraseña </th> 
        </thead>
        <?php foreach ($jefes as $key): ?>
                <tr class="w-25 p-3">
                    <td align="center" class="w-auto p-3 align-middle"> 
                     <a class="btn btn-primary" href="<?=base_url('index.php/EmpleadosC/updateEmpleado/').$key->NombreEmpleado ?>">Editar</a> 
                     <a class="btn btn-danger" href="<?=base_url('index.php/EmpleadosC/borrarEmpleado/').$key->NombreEmpleado ?>">Eliminar</a>
                </td>
                    <td class="w-auto p-3 align-middle"><?=$key->NombreEmpleado ?></td>
                    <td class="w-auto p-3 align-middle"><?=$key->NombrePuesto ?></td>
                    <td class="w-auto p-3 align-middle"><?=$key->nombreUsuario ?></td>
                    <td class="w-auto p-3 align-middle"><?=$key->contra ?></td>
                </tr>
</script>
            <?php endforeach ?> 
        </tbody>
    </table>   
</div>
<br><br>