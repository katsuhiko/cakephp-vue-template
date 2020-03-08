<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTasks extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('tasks')
            ->addColumn('id', 'uuid')
            ->addColumn('description', 'text')
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addPrimaryKey('id')
            ->create();
    }
}
