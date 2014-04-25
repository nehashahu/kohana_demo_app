<?php
namespace Codeception\Coverage\Subscriber;

use Codeception\Events;
use Codeception\Configuration;
use Codeception\Event\PrintResultEvent;
use Codeception\Subscriber\Shared\StaticEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Printer implements EventSubscriberInterface {
    use StaticEvents;

    static $events = [
        Events::RESULT_PRINT_AFTER => 'printResult'
    ];

    protected $settings = [
        'low_limit' => '35',
        'high_limit' => '70',
        'show_uncovered' => false
    ];

    static $coverage;
    protected $options;
    protected $logDir;
    protected $destination = [];

    public function __construct($options)
    {
        $this->options = $options;
        $this->logDir = Configuration::logDir();
        $this->settings = array_merge($this->settings, Configuration::config()['coverage']);
        self::$coverage = new \PHP_CodeCoverage();
    }

    protected function absolutePath($path)
    {
        if ((strpos($path, '/') === 0) or (strpos($path, ':') === 1)) { // absolute path
            return $path;
        }
        return $this->logDir . $path;
    }

    public function printResult(PrintResultEvent $e)
    {
        if ($this->options['steps']) {
            return;
        }

        $printer = $e->getPrinter();
        $this->printText($printer);
        $this->printPHP();
        $printer->write("\n");
        if ($this->options['coverage-html']) {
            $this->printHtml();
            $printer->write("HTML report generated in {$this->options['coverage-html']}\n");
        }
        if ($this->options['coverage-xml']) {
            $this->printXml();
            $printer->write("XML report generated in {$this->options['coverage-xml']}\n");
        }
    }

    protected function printText(\PHPUnit_Util_Printer $printer)
    {
        $writer = new \PHP_CodeCoverage_Report_Text(
            $this->settings['low_limit'], $this->settings['high_limit'], $this->settings['show_uncovered'], false
        );
        $printer->write($writer->process(self::$coverage, $this->options['colors']));
    }

    protected function printHtml()
    {
        $writer = new \PHP_CodeCoverage_Report_HTML(
            $this->settings['low_limit'],
            $this->settings['high_limit'],
            sprintf(
                ', <a href="http://codeception.com">Codeception</a> and <a href="http://phpunit.de/">PHPUnit %s</a>',
                \PHPUnit_Runner_Version::id()
            )
        );

        $writer->process(self::$coverage, $this->absolutePath($this->options['coverage-html']));
    }

    protected function printXml()
    {
        $writer = new \PHP_CodeCoverage_Report_Clover;
        $writer->process(self::$coverage, $this->absolutePath($this->options['coverage-xml']));
    }

    protected function printPHP()
    {
        $writer = new \PHP_CodeCoverage_Report_PHP;
        $writer->process(self::$coverage, $this->absolutePath($this->options['coverage']));
    }

}