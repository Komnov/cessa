<?php


namespace Ipol\Ozon\Admin;


use Ipol\Ozon\Api\Logger\FileRoute;
use Ipol\Ozon\Api\Logger\Psr\Log\LogLevel;

/**
 * Class ToFileLoggerController
 * @package Ipol\Ozon\Admin
 */
class ToFileLoggerController extends \Ipol\Ozon\Api\Logger\Logger
{
    /**
     * @var string
     */
    protected $curlTemplate = '{method}' . ' ' . '{process}' . PHP_EOL . '{content}';

    /**
     * ToFileLoggerController constructor.
     * @param string $path - absolute path where to add log-data
     */
    public function __construct(string $path = '')
    {
        if (!$path) {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/ipol_common_log.txt';
        }
        $route = new FileRoute($path);
        $route->enable();
        parent::__construct([$route]);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message = '', array $context = []): void
    {
        if ($level === LogLevel::DEBUG) {
            parent::log($level, $this->interpolate($this->curlTemplate, $context), []);
        } else {
            parent::log($level, $message, $context);
        }
    }

}