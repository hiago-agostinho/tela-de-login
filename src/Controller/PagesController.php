<?php

namespace App\Controller;
use Cake\Controller\Component\FlashComponent;
use Cake\Http\Response;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

class PagesController extends AppController
{

    public function initialize() : void
    {
        $this->loadModel('Pessoas');
        $this->loadComponent('Flash');
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

    public function display()
    {
        if ($this->request->is('post')) {
            $pessoas = TableRegistry::get('pessoas')->find();

            $data = $this->request->getData();
            $dados = $this->Pessoas->newEntity($this->request->getData());

            if ($this->Pessoas->save($dados)) {
                return $this->redirect(['controller' => 'Consulta', 'action' => 'index', $dados->id, 1]);
            }
            else {
                $errors = $dados->getErrors();
                
                $this->set(compact('errors'));
            }
        }

        $this->render('home');
    }

}
