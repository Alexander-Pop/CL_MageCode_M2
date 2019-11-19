<?php
/**
 * Cron job to run image optimisation
 *
 */
 
namespace Codelegacy\CronExample\Cron;

use Psr\Log\LoggerInterface;
 
class ImageOptimiser
{
    /**
     * @var ImageOptimise
     */
    private $_imageOptimiser;
 
    /**
     * Image Optimisation
     * @param ImageOptimise $imageOptimiser
     */
    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
    }
 
    public function execute()
    {
        $this->_logger->debug('Cron task was started at ' . date('Y-m-d h:i:s'));
    }
}