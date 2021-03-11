<?php

namespace Ad\Logger\Model\Logger;

use Psr\Log\LoggerInterface;

class Datewise
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
        $this->logger->error(
            sprintf(
                "Datewise Logger"
            )
        );
    }
}
