<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PessoasTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator) : Validator
    {
        $validator
            ->notEmptyString('nome', 'O campo nome é obrigatório')
            ->notEmptyString('email', 'O campo e-mail é obrigatório')
            ->notEmptyString('senha', 'O campo senha é obrigatório')
            ->add('email', 'validEmail', [
                'rule' => 'email',
                'message' => 'Insira um e-mail válido'
            ])
            ->add('email', 'uniqueEmail', [
                'rule' => function ($value, $context) {
                    $conditions = ['email' => $value];
                    if (!empty($context['data']['id'])) {
                        $conditions['id !='] = $context['data']['id'];
                    }
                    return $this->find()->where($conditions)->count() === 0;
                },
                'message' => 'Este e-mail já está em uso'
            ]);

        return $validator;
    }
}
