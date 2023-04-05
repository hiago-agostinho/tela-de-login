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
    // Plugin::load('Cake/Auth');

    public function initialize() : void
    {
        $this->loadModel('Pessoas');
        $this->loadComponent('Flash');
        // $this->loadComponent('Auth');
    }

    public function __construct(
        \Cake\Http\ServerRequest $request = null,
        \Cake\Http\Response $response = null,
        \Cake\Event\EventManager $eventManager = null,
        \Cake\I18n\I18n $i18n = null,
        \Cake\Controller\Component\FlashComponent $flash = null // Adicione esta linha
    ) {
        parent::__construct($request, $response, $eventManager, $i18n);
        $this->Flash = $flash; // Adicione esta linha
    }
    

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->response = $this->response->withDisabledCache();
    }

    public function index() {
        $pessoa = null;
    
        if ($this->request->is('post')) {
            $data = $this->request->getData();
    
            if (isset($data['Pessoa']['email'])) {
                $pessoa = $this->Pessoas->find('all', ['conditions' => ['email' => $data['Pessoa']['email']]])
                                        ->first()
                                        ->toArray();
    
                if ($pessoa && $pessoa['senha'] === AuthComponent::password($data['Pessoa']['senha'])) {
                    $this->Auth->login($pessoa);
                    $this->redirect($this->Auth->redirectUrl());
                }
                else {
                    echo 'cu';
                    // $this->Flash->error(__('E-mail ou senha inválidos'));
                }
            }
            else {
                // faça algo aqui se a chave 'Pessoa' não existir no array $data
            }

            return $this->redirect(['controller' => 'Consulta', 'action' => 'index', $pessoa->id]);
            $this->set(compact('data', 'pessoa'));
        }
    
        // $this->render('index');
    }
    

    

}
