<h1>Agregar nuevo vehiculo</h1>
<?php
echo $this->Form->create('Vehiculo');
echo $this->Form->input('nombre');
echo $this->Form->input('marca');
echo $this->Form->input('modelo');
echo $this->Form->input('precio');
echo $this->Form->end('Crear Vehiculo');