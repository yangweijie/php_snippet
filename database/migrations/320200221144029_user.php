<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class User extends Migrator
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
        $table = $this->table('user', ['engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci', 'comment' => '用户表' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('username', 'string', ['limit' => 32,'null' => false,'default' => null,'signed' => false,'comment' => '',])
			->addColumn('nickname', 'string', ['limit' => 32,'null' => false,'default' => '','signed' => false,'comment' => '昵称',])
			->addColumn('password', 'string', ['limit' => 96,'null' => false,'default' => '','signed' => false,'comment' => '密码',])
			->addColumn('email', 'string', ['limit' => 64,'null' => false,'default' => '','signed' => false,'comment' => '邮箱地址',])
			->addColumn('email_bind', 'boolean', ['null' => false,'default' => 0,'signed' => true,'comment' => '是否绑定邮箱地址',])
			->addColumn('mobile', 'string', ['limit' => 11,'null' => false,'default' => '','signed' => false,'comment' => '手机号码',])
			->addColumn('mobile_bind', 'boolean', ['null' => false,'default' => 0,'signed' => true,'comment' => '是否绑定手机号码',])
			->addColumn('avatar', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => true,'comment' => '头像',])
			->addColumn('money', 'decimal', ['precision' => 11,'scale' => 2,'null' => false,'default' => 0,'signed' => true,'comment' => '余额',])
			->addColumn('score', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => true,'comment' => '积分',])
			->addColumn('signup_ip', 'integer', ['limit' => MysqlAdapter::INT_BIG,'null' => false,'default' => 0,'signed' => true,'comment' => '注册ip',])
			->addColumn('create_time', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => true,'comment' => '创建时间',])
			->addColumn('update_time', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => true,'comment' => '更新时间',])
			->addColumn('last_login_time', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => true,'comment' => '最后一次登录时间',])
			->addColumn('last_login_ip', 'integer', ['limit' => MysqlAdapter::INT_BIG,'null' => false,'default' => 0,'signed' => true,'comment' => '登录ip',])
			->addColumn('sort', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 100,'signed' => false,'comment' => '排序',])
			->addColumn('status', 'boolean', ['null' => false,'default' => 0,'signed' => false,'comment' => '状态：0禁用，1启用',])
            ->create();
    }
}
