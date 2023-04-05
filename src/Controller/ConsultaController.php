<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class ConsultaController extends AppController
{
    public function initialize() : void
    {
        $this->loadModel('Pessoas');
    }

    public function index($id, $sucess = null)
    {
        $pessoas = $this->Pessoas->find()
                                 ->where(['id' => $id])
                                 ->first();
        
        $this->set(compact('pessoas', 'sucess'));
    }

}
