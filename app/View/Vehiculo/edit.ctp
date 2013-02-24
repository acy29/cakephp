
<h1>Editar Vehiculo</h1>
<?php
	echo $this->Form->create('Vehiculo');
	echo $this->Form->input('placa');
	echo $this->Form->input('marca');
	echo $this->Form->input('modelo');
	echo $this->Form->input('serial_carroceria');
	echo $this->Form->input('serial_motor');
	echo $this->Form->input('color');
	echo $this->Form->input('costo');
    echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->input('tipo_vehiculo_id', array(
	    'type'    => 'select',
	    'options' => $resultados,
	    'empty'   => false
	));

	echo $this->Form->input('uso_vehiculo_id', array(
	    'type'    => 'select',
	    'options' => $resultados2,
	    'empty'   => false
	));

	echo $this->Form->input('clase_vehiculo_id', array(
	    'type'    => 'select',
	    'options' => $resultados3,
	    'empty'   => false
	));

    echo $this->Form->end('Editar Vehiculo');