<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ChnageData extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {

        $this->table('secrets')
            ->changeColumn('data', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('secrets')
            ->changeColumn('data', 'binary', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }
}
