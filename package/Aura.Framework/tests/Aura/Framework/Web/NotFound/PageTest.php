<?php
namespace Aura\Framework\Web\NotFound;
use Aura\Framework\Web\AbstractPageTest;

/**
 * Test class for Page.
 * Generated by PHPUnit on 2011-05-27 at 11:01:03.
 */
class PageTest extends AbstractPageTest
{
    protected $page_name = 'NotFound';
    
    public function testActionIndex()
    {
        $page = $this->newPage(array(
            'action' => 'index',
        ));
        
        $xfer = $page->exec();
        
        $html = "<html>
    <head>
        <title>Not Found</title>
    </head>
    <body>
        <h1>404 Not Found</h1>
        <p>No controller found for <code>NULL</code></p>
        <p>Please check that your config has:</p>
        <ol>
            <li>An <code>Aura\Router\Map</code> route for the path <code>'/'</code></li>
            <li>A <code>['values']['controller']</code> value for the mapped route</li>
            <li>A <code>\$di->params['Aura\Framework\Web\Factory']['map']</code> entry for the controller value.</li>
        </ol>
    </body>
</html>";
        
        $this->assertInstanceOf('Aura\Web\Response', $xfer);
        $this->assertSame(404, $xfer->getStatusCode());
        $this->assertSame($html, $xfer->getContent());
    }
}
