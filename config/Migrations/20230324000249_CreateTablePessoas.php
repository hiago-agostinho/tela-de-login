<?php

use Migrations\AbstractMigration;

class CreateTablePessoas extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('pessoas');
        $table->addColumn('nome', 'string', ['limit' => 100, 'null' => false])
              ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
              ->addColumn('senha', 'string', ['limit' => 255, 'null' => false])
              ->create();
    }
    
    public function down()
    {
        $this->execute('DROP TABLE pessoas');
    }
}
