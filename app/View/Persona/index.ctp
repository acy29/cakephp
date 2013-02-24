<h1>Blog posts</h1>
<?php echo $this->Html->link('crear', 
             array('action' => 'add','')); 
             ?>
<table>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php foreach ($persona as $p): ?>
    <tr>
        <!--<td>
            <?php// echo $this->Html->link($v['Vehiculo']['nombre'],
           // array('controller' => 'vehiculo', 'action' => 'post', $v['Vehiculo']['id'])); ?>
        </td>-->
        <td><?php echo $p['Persona']['cedula']; ?></td>
        <td><?php echo $p['Persona']['nombre']; ?></td>
        <td><?php echo $p['Persona']['apellido']; ?></td>
        <td><?php echo $p['Persona']['direccion']; ?></td>
        <td><?php echo $p['Persona']['telefono']; ?></td>
        <td> <?php echo $this->Html->link('editar', 
             array('action' => 'edit', $p['Persona']['cedula'])); ?>
        </td>
        <td><?php echo $this->Form->postLink(
                'eliminar',
                array('action' => 'delete', $p['Persona']['cedula']),
                array('confirm' => 'Esta segur@?'));
            ?>

        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($v); ?>
</table>