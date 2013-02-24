<?php
class PolizaController extends AppController {
    public $helpers = array('Html','Form');

  public function index() {
        $this->set('poliza', $this->Poliza->find('all'));
    }

  public function add() {
        if ($this->request->is('post')) {
            $this->Poliza->create();
            if ($this->Poliza->save($this->request->data)) {
                $this->Session->setFlash('Tu poliza a sido registrado');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('imposible registrar poliza');
            }
        }else{
            Controller::loadModel('Persona');
            Controller::loadModel('Vehiculo');
            Controller::loadModel('Tipopoliza');

            $this->set('poliza', $this->Poliza->find('all'));

            $persona = $this->Persona->find('all');
            foreach ($persona as $value) {
                $resultados[$value['Persona']['cedula']]= $value['Persona']['nombre'];
            }

            $vehiculo = $this->Vehiculo->find('all');
            foreach ($vehiculo as $value) {
                $resultados2[$value['Vehiculo']['id']]= $value['Vehiculo']['marca'];
            }

            $tipopoliza = $this->Tipopoliza->find('all');
            foreach ($tipopoliza as $value) {
                $resultados3[$value['Tipopoliza']['id']]= $value['Tipopoliza']['nombre'];
            }

            $this->set(compact('resultados'));
            $this->set(compact('resultados2'));
             $this->set(compact('resultados3'));
        }
    }

    public function edit($id = null) {

        Controller::loadModel('Persona');
        Controller::loadModel('Vehiculo');
        Controller::loadModel('Tipopoliza');

        if (!$id) {
            throw new NotFoundException(__('poliza invalido'));
        }

       $poliza = $this->Poliza->findById($id);
        if (!$poliza) {
            throw new NotFoundException(__('poliza invalido'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Poliza->id = $id;
            if ($this->Poliza->save($this->request->data)) {
                $this->Session->setFlash('Su poliza a sido modificado');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('imposible modificar poliza');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $poliza;

            $persona = $this->Persona->find('all');
            foreach ($persona as $value) {
                $resultados[$value['Persona']['cedula']]= $value['Persona']['nombre'];
            }

            $vehiculo = $this->Vehiculo->find('all');
            foreach ($vehiculo as $value) {
                $resultados2[$value['Vehiculo']['id']]= $value['Vehiculo']['marca'];
            }

            $tipopoliza = $this->Tipopoliza->find('all');
            foreach ($tipopoliza as $value) {
                $resultados3[$value['Tipopoliza']['id']]= $value['Tipopoliza']['nombre'];
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

        if ($this->Poliza->delete($id)) {
            $this->Session->setFlash('La poliza con id: ' . $id . ' ha sido eliminado.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function json(){
        $data = $this->Poliza->find('all');

        $json = json_encode($data);
        $this->set(compact('json'));
    }

    public function xml(){

        App::uses('Xml', 'Lib');
        App::uses('Xml', 'Utility');
        App::Import('Helper', 'Xml');
        $data = $this->Poliza->find('all');

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        $xml = $xml->asXML();

        $this->set(compact('xml'));

    }

}