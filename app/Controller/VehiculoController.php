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
        }else{
            Controller::loadModel('Tipovehiculo');
            Controller::loadModel('Usovehiculo');
            Controller::loadModel('Clasevehiculo');

            $this->set('vehiculo', $this->Vehiculo->find('all'));

            $tipovehiculo = $this->Tipovehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados[$value['Tipovehiculo']['id']]= $value['Tipovehiculo']['nombre'];
            }

            $tipovehiculo = $this->Usovehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados2[$value['Usovehiculo']['id']]= $value['Usovehiculo']['nombre'];
            }

            $tipovehiculo = $this->Clasevehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados3[$value['Clasevehiculo']['id']]= $value['Clasevehiculo']['nombre'];
            }

            $this->set(compact('resultados'));
            $this->set(compact('resultados2'));
            $this->set(compact('resultados3'));
        }
    }

    public function edit($id = null) {

        Controller::loadModel('Tipovehiculo');
        Controller::loadModel('Usovehiculo');
        Controller::loadModel('Clasevehiculo');

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

            $tipovehiculo = $this->Tipovehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados[$value['Tipovehiculo']['id']]= $value['Tipovehiculo']['nombre'];
            }

            $tipovehiculo = $this->Usovehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados2[$value['Usovehiculo']['id']]= $value['Usovehiculo']['nombre'];
            }

            $tipovehiculo = $this->Clasevehiculo->find('all');
            foreach ($tipovehiculo as $value) {
                $resultados3[$value['Clasevehiculo']['id']]= $value['Clasevehiculo']['nombre'];
            }

            $this->set(compact('resultados'));
            $this->set(compact('resultados2'));
            $this->set(compact('resultados3'));

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

        $json = json_encode($data);
        $this->set(compact('json'));
    }

    public function xml(){

        App::uses('Xml', 'Lib');
        App::uses('Xml', 'Utility');
        App::Import('Helper', 'Xml');
        $data = $this->Vehiculo->find('all');

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        $xml = $xml->asXML();

        $this->set(compact('xml'));

    }

}