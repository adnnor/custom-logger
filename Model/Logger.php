<?php

namespace Ad\Logger\Model;

use Psr\Log\LoggerInterface;

class Logger
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Logger constructor.
     *
     * @param   LoggerInterface   $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->logger->info(
            sprintf(
                "Standard Logger"
            )
        );
    }
}
