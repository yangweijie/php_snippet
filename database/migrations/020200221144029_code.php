<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class Code extends Migrator
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
        $table = $this->table('code', ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci', 'comment' => '代码表' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('uid', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '用户uid',])
			->addColumn('name', 'string', ['limit' => 128,'null' => true,'signed' => false,'comment' => '名称',])
			->addColumn('desp', 'string', ['limit' => 1024,'null' => true,'signed' => false,'comment' => '描述',])
			->addColumn('content', 'text', ['limit' => MysqlAdapter::TEXT_REGULAR,'null' => true,'signed' => false,'comment' => '内容',])
			->addColumn('version', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '版本',])
			->addColumn('view_num', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '观看次数',])
			->addColumn('tags', 'string', ['limit' => 255,'null' => true,'signed' => false,'comment' => '标签',])
			->addColumn('score', 'decimal', ['precision' => 1,'scale' => 1,'null' => true,'signed' => true,'comment' => '评分',])
			->addColumn('pid', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => true,'signed' => true,'comment' => '父级id',])
			->addColumn('create_time', 'datetime', ['null' => true,'signed' => false,'comment' => '创建时间',])
			->addColumn('update_time', 'datetime', ['null' => true,'signed' => false,'comment' => '更新时间',])
            ->create();
    }
}
