<?php
class VehiculoController extends AppController {
    public $helpers = array('Html','Form');

  public function index() {
        $this->set('vehiculo', $this->Vehiculo->find('all'));
    }

  /*public function post($id = null) {

        if (!$id) {
            throw new NotFoundException(__('vehiculo invalido'));
        }

        $vehiculo = $this->Vehiculo->findById($id);
        if (!$vehiculo) {
            throw new NotFoundException(__('vehiculo invalido'));
        }
        $this->set('vehiculo', $vehiculo);
    }*/

  public function add() {
    if ($this->request->is('post')) {
        $this->Vehiculo->create();
        if ($this->Vehiculo->save($this->request->data)) {
            $this->Session->setFlash('Tu vehiculo a sido registrado');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('imposible registrar vehiculo');
        }
    }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('vehiculo invalido'));
        }

       $vehiculo = $this->Vehiculo->findById($id);
        if (!$vehiculo) {
            throw new NotFoundException(__('vehiculo invalido'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Vehiculo->id = $id;
            if ($this->Vehiculo->save($this->request->data)) {
                $this->Session->setFlash('Su carro a sido modificado');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('imposible modificar vehiculo');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $vehiculo;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Vehiculo->delete($id)) {
            $this->Session->setFlash('El vehiculo con id: ' . $id . ' ha sido eliminado.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function json(){
        $data = $this->Vehiculo->find('all');
        $this->set(array('vehiculo' => $data, '_serialize' => 'vehiculo'));
    }

    public function xml(){
        App::uses('Xml', 'Lib');
        App::uses('Xml', 'Utility');
       /* $xml =
        $this->set(array('vehiculo' => $xml));*/
       //  $data = $this->Vehiculo->find('all');
       // $xmlArray = array('vehiculo' => array('child' => 'value'));
     /*  $xmlObject = Xml::build($this->Vehiculo->find('all'));
        $xmlString = $xmlObject->asXML();
        $this->set(array('vehiculo' => $xmlString));*/

        $xmlArray = array('root' => array('child' => 'value'));
        $xmlObject = Xml::fromArray($xmlArray, array('format' => 'tags')); // You can use Xml::build() too
        $xmlString = $xmlObject->asXML();
        $this->set(array('vehiculo' => $xmlString));

    }

}