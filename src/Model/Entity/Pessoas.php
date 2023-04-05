<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pessoas extends Entity
{
    protected $_accessible = [
        'id' => true,
        'nome' => true,
        'email' => true,
        'senha' => true
    ];
}
