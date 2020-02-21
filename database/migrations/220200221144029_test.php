<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class Test extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('test', ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci', 'comment' => '测试表' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('uid', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '',])
			->addColumn('code_id', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '代码片段 id',])
			->addColumn('content', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR,'null' => true,'signed' => false,'comment' => '测试内容',])
			->addColumn('errors', 'string', ['limit' => 255,'null' => true,'signed' => false,'comment' => '错误',])
			->addColumn('slow', 'string', ['limit' => 255,'null' => true,'signed' => false,'comment' => '运行时间大于5秒',])
			->addColumn('create_time', 'datetime', ['null' => true,'signed' => false,'comment' => '',])
			->addColumn('update_time', 'datetime', ['null' => true,'signed' => false,'comment' => '',])
            ->create();
    }
}
