<?php
namespace Aura\Framework;
use Aura\Web\Context;
use Aura\Signal\Manager as SignalManager;
use Aura\Signal\HandlerFactory;
use Aura\Signal\ResultFactory;
use Aura\Signal\ResultCollection;

/**
 * Test class for RequestHandler.
 * Generated by PHPUnit on 2011-10-06 at 15:17:27.
 */
class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RequestHandler
     */
    protected $request_handler;
    
    protected $context;
    
    protected $signal;
    
    protected $dispatcher;
    
    protected $renderer;
    
    protected $responder;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->context    = new Context($GLOBALS);
        $this->signal     = new SignalManager(new HandlerFactory, new ResultFactory, new ResultCollection);
        $this->dispatcher = new MockDispatcher;
        $this->renderer   = new MockRenderer;
        $this->responder  = new MockResponder;
        $this->request_handler = new RequestHandler(
            $this->context,
            $this->signal,
            $this->dispatcher,
            $this->renderer,
            $this->responder
        );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @todo Implement test__get().
     */
    public function test__get()
    {
        $this->assertSame($this->context, $this->request_handler->context);
        $this->assertSame($this->signal, $this->request_handler->signal);
        $this->assertSame($this->dispatcher, $this->request_handler->dispatcher);
        $this->assertSame($this->renderer, $this->request_handler->renderer);
        $this->assertSame($this->responder, $this->request_handler->responder);
    }

    /**
     * @todo Implement testExec().
     */
    public function testExec()
    {
        $actual = $this->request_handler->exec();
        $this->assertSame('Aura\Framework\MockResponder::exec', $actual);
    }
}