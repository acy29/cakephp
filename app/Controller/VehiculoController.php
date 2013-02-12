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
                $this->Session->setFlash('SU carro a sido modificado');
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

}