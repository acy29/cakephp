<h1>Agregar nuevo persona</h1>
<?php
	echo $this->Form->create('Persona');
	echo $this->Form->input('cedula');
	echo $this->Form->input('nombre');
	echo $this->Form->input('apellido');
	echo $this->Form->input('direccion');
	echo $this->Form->input('telefono');

	echo $this->Form->end('Crear Persona');