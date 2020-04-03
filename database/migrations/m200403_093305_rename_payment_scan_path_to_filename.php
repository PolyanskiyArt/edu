<?php

use yii\db\Migration;

class m200403_093305_rename_payment_scan_path_to_filename extends Migration
{
    private $tableName = 'payment';

    private $oldColumnName = 'scan_path';

    private $newColumnName = 'filename';

    public function safeUp()
    {
        $this->renameColumn($this->tableName, $this->oldColumnName, $this->newColumnName);
    }

    public function safeDown()
    {
        $this->renameColumn($this->tableName, $this->newColumnName, $this->oldColumnName);
    }
}
