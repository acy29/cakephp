<?php
class PersonaController extends AppController {
    public $helpers = array('Html','Form');

  public function index() {
        $this->set('persona', $this->Persona->find('all'));
    }

  public function add() {
        if ($this->request->is('post')) {
            $this->Persona->create();
            if ($this->Persona->save($this->request->data)) {
                $this->Session->setFlash('Tu persona a sido registrado');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('imposible registrar persona');
            }
        }
    }

    public function edit($cedula = null) {

        if (!$cedula) {
            throw new NotFoundException(__('persona invalido'));
        }

       $persona = $this->Persona->find('first', array('conditions' => array('Persona.cedula' => $cedula)));
        if (!$persona) {
            throw new NotFoundException(__('persona invalido'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Persona->updateAll(array('nombre' => "'".$this->request->data['Persona']['nombre']."'",
                                                'apellido' => "'".$this->request->data['Persona']['apellido']."'",
                                                'direccion' => "'".$this->request->data['Persona']['direccion']."'",
                                                'telefono' => "'".$this->request->data['Persona']['telefono']."'"),
                                                array('cedula' => "".$this->request->data['Persona']['cedula']."")
                )) {
                $this->Session->setFlash('Su persona a sido modificado');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('imposible modificar persona');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $persona;

        }
    }

    public function delete($cedula) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Persona->deleteAll('cedula = '.$cedula)) {
            $this->Session->setFlash('La Persona con cedula: ' . $cedula . ' ha sido eliminado.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function json(){
        $data = $this->Persona->find('all');

        $json = json_encode($data);
        $this->set(compact('json'));
    }

    public function xml(){

        App::uses('Xml', 'Lib');
        App::uses('Xml', 'Utility');
        App::Import('Helper', 'Xml');
        $data = $this->Persona->find('all');

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        $xml = $xml->asXML();

        $this->set(compact('xml'));

    }

}