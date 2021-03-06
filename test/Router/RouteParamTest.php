<?php
namespace Tonis\Router;

use Tonis\TestAsset\NewRequestTrait;

/**
 * @cover \Tonis\Router\RouteParam
 */
class RouteParamTest extends \PHPUnit_Framework_TestCase
{
    use NewRequestTrait;

    /** @var RouteParam */
    private $param;

    protected function setUp()
    {
        $this->param = new RouteParam('test', function () {});
    }

    public function testShouldInvoke()
    {
        $request = $this->newTonisRequest('/');
        $request['test'] = 'works';

        $result = $this->param->shouldInvoke($request, $this->newTonisResponse());

        $this->assertTrue($result);
    }

    public function testGetValue()
    {
        $request = $this->newTonisRequest('/');
        $request['test'] = 'works';
        $result = $this->param->getValue($request, $this->newTonisResponse());

        $this->assertSame($result, 'works');
    }
}
