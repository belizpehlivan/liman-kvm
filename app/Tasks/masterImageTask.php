<?php

namespace App\Tasks;

use Liman\Toolkit\Formatter;
use Liman\Toolkit\OS\Distro;
use Liman\Toolkit\RemoteTask\Task;
use Liman\Toolkit\Shell\Command;

class masterImageTask extends Task
{
	protected $description = "Task çalıştırılıyor...";
	protected $sudoRequired = true;
    protected $command = "rsync --info=progress2 /var/lib/libvirt/images/test.qcow2 /var/lib/libvirt/images/test9.qcow2 &";
    protected $control = "apt\|dpkg";

	public function __construct(array $attrbs=[])
	{
		$this->attributes = $attrbs;
        $this->logFile = Formatter::run('/tmp/exampleTaskLog.txt');
	}
}

		
	