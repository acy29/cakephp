<h1>Blog posts</h1>
<?php echo $this->Html->link('crear', 
             array('action' => 'add','')); 
             ?>
<table>
    <tr>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Precio</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php foreach ($vehiculo as $v): ?>
    <tr>
        <td><?php echo $v['Vehiculo']['id']; ?></td>
        <!--<td>
            <?php// echo $this->Html->link($v['Vehiculo']['nombre'],
           // array('controller' => 'vehiculo', 'action' => 'post', $v['Vehiculo']['id'])); ?>
        </td>-->
        <td><?php echo $v['Vehiculo']['marca']; ?></td>
        <td><?php echo $v['Vehiculo']['modelo']; ?></td>
        <td><?php echo $v['Vehiculo']['precio']; ?></td>
        <td> <?php echo $this->Html->link('editar', 
             array('action' => 'edit', $v['Vehiculo']['id'])); ?>
        </td>
        <td><?php echo $this->Form->postLink(
                'eliminar',
                array('action' => 'delete', $v['Vehiculo']['id']),
                array('confirm' => 'Esta segur@?'));
            ?>

        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($v); ?>
</table>