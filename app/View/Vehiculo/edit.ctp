
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
    echo $this->Form->end('Editar Vehiculo');