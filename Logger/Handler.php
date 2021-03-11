<?php

namespace Ad\Logger\Logger;

use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Handler extends Base
{
    /**
     * @var int
     */
    protected $loggerType = Logger::ERROR;

    /**
     * @var string
     */
    protected $fileName = '';

    /**
     * Handler constructor.
     *
     * @param   DriverInterface   $filesystem
     * @param   null              $filePath
     * @param   null              $fileName
     *
     * @throws \Exception
     */
    public function __construct(
        DriverInterface $filesystem,
        $filePath = null,
        $fileName = null
    ) {
        $date = date("Ymd");
        $path = "/var/log/date/" . $date . ".log";
        $this->fileName = $path;
        parent::__construct($filesystem, $filePath, $fileName);
    }
}
