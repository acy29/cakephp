<h1>Poliza</h1>
<?php echo $this->Html->link('crear', 
             array('action' => 'add','')); 
             ?>
<table>
    <tr>
        <th>Numero</th>
        <th>Monto</th>
        <th>Prima</th>
        <th>Tipo poliza</th>
        <th>Fecha Emisión</th>
        <th>Fecha vigencia inicio</th>
        <th>Fecha vigencia fin   </th>
        <th>Persona id</th>
        <th>Vehiculo id</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php foreach ($poliza as $p): ?>
    <tr>
        <!--<td>
            <?php// echo $this->Html->link($v['Vehiculo']['nombre'],
           // array('controller' => 'vehiculo', 'action' => 'post', $v['Vehiculo']['id'])); ?>
        </td>-->
        <td><?php echo $p['Poliza']['numero']; ?></td>
        <td><?php echo $p['Poliza']['monto']; ?></td>
        <td><?php echo $p['Poliza']['prima']; ?></td>
        <td><?php echo $p['Poliza']['tipo_poliza_id']; ?></td>
        <td><?php echo $p['Poliza']['fecha_emision']; ?></td>
        <td><?php echo $p['Poliza']['fecha_vigencia_inicio']; ?></td>
        <td><?php echo $p['Poliza']['fecha_vigencia_fin']; ?></td>
        <td><?php echo $p['Poliza']['persona_id']; ?></td>
        <td><?php echo $p['Poliza']['vehiculo_id']; ?></td>
        <td> <?php echo $this->Html->link('editar', 
             array('action' => 'edit', $p['Poliza']['id'])); ?>
        </td>
        <td><?php echo $this->Form->postLink(
                'eliminar',
                array('action' => 'delete', $p['Poliza']['id']),
                array('confirm' => 'Esta segur@?'));
            ?>

        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($v); ?>
</table>