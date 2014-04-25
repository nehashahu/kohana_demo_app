<?php
namespace Codeception\Subscriber;

use Codeception\Event\TestEvent;
use Codeception\Events;
use Codeception\Event\SuiteEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BeforeAfterTest implements EventSubscriberInterface {
    use Shared\StaticEvents;

    static $events = [
        Events::SUITE_BEFORE => 'beforeClass',
        Events::SUITE_AFTER  => 'afterClass',
    ];

    protected $hooks = [];

    public function beforeClass(SuiteEvent $e)
    {
        foreach ($e->getSuite()->tests() as $test) {
            $testClass = get_class($test);
            $this->hooks[$testClass] = \PHPUnit_Util_Test::getHookMethods($testClass);
            $this->runHooks($testClass, 'beforeClass');
        }
    }


    public function afterClass(SuiteEvent $e)
    {
        foreach ($e->getSuite()->tests() as $test) {
            $this->runHooks(get_class($test), 'afterClass');
        }
    }

    protected function runHooks($testClass, $hook)
    {
        foreach ($this->hooks[$testClass][$hook] as $method) {
            if (is_callable([$testClass, $method])) {
                call_user_func([$testClass, $method]);
            }
        }
    }
}
