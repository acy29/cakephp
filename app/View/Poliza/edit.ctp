
<h1>Editar Vehiculo</h1>
<?php
	echo $this->Form->create('Poliza');
	echo $this->Form->input('numero');
	echo $this->Form->input('monto');
	echo $this->Form->input('prima');	
	echo $this->Form->input('fecha_vigencia_inicio');
	echo $this->Form->input('fecha_emision');
	echo $this->Form->input('fecha_vigencia_fin');
    echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->input('tipo_poliza_id', array(
	    'type'    => 'select',
	    'options' => $resultados3,
	    'empty'   => false
	));

	echo $this->Form->input('persona_id', array(
	    'type'    => 'select',
	    'options' => $resultados,
	    'empty'   => false
	));

	echo $this->Form->input('vehiculo_id', array(
	    'type'    => 'select',
	    'options' => $resultados2,
	    'empty'   => false
	));

	echo $this->Form->end('Crear Poliza');