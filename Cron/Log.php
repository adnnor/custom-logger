<?php

namespace Ad\Logger\Cron;

use Ad\Logger\Model\Logger;
use Ad\Logger\Model\Logger\Datewise;

class Log
{
    /**
     * @var Logger
     */
    private $simpleLogger;
    /**
     * @var Datewise
     */
    private $datewiseLogger;

    /**
     * Logger constructor.
     *
     * @param   Logger     $simpleLogger
     * @param   Datewise   $datewiseLogger
     */
    public function __construct(
        Logger $simpleLogger,
        Datewise $datewiseLogger
    ) {
        $this->simpleLogger = $simpleLogger;
        $this->datewiseLogger = $datewiseLogger;
    }

    public function execute()
    {
        $this->simpleLogger->execute();
        $this->datewiseLogger->execute();
    }
}
