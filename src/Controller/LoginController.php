<?php

namespace App\Controller;
use Cake\Controller\Component\FlashComponent;
use Cake\Http\Response;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Auth\AuthComponent;

class LoginController extends AppController
{
    public $uses = ['Pessoa'];

    public function initialize() : void
    {
        $this->loadModel('Pessoas');
        $this->loadComponent('Flash');
    }

    public function __construct(\Cake\Http\ServerRequest $request = null, \Cake\Http\Response $response = null, \Cake\Event\EventManager $eventManager = null, \Cake\I18n\I18n $i18n = null, \Cake\Controller\Component\FlashComponent $flash = null)
    {
        parent::__construct($request, $response, $eventManager, $i18n);
        $this->Flash = $flash;
    }
    

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->response = $this->response->withDisabledCache();
    }

    public function index() 
    {
        $error = 'Úsuario inválido';
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $pessoa = $this->Pessoas->find()
                                    ->where([
                                        'email' => $data['email'],
                                        'senha' => $data['senha']
                                    ])
                                    ->first();
                                    
            if ($data['email'] == @$pessoa->email) {
                if ($data['senha'] == @$pessoa->senha) {
                    return $this->redirect(['controller' => 'Consulta', 'action' => 'index', $pessoa->id, 0]);
                }
                else {
                    $error;
                }
            }
            else {
                $error;
            }
            $this->set(compact('data', 'pessoa', 'error'));
        }
    }    

}
