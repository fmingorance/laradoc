<?php namespace Tests\Configuration;

use Mingorance\LaraDoc\Configuration\DriverMapper;
use Mockery as m;

class DriverMapperTest extends \PHPUnit_Framework_TestCase
{
	public function testUsageOfCorrectConfigurationMapper()
	{
		$mockMapper1 = m::mock('Mingorance\LaraDoc\Configuration\Mapper');
		$mockMapper2 = m::mock('Mingorance\LaraDoc\Configuration\Mapper');

		$driverMapper = new DriverMapper('some driver');

		$driverMapper->registerMapper($mockMapper1);
		$driverMapper->registerMapper($mockMapper2);

		$mockMapper1->shouldReceive('appropriate')->once()->andReturn(false);
		$mockMapper2->shouldReceive('appropriate')->once()->andReturn(true);
		$mockMapper2->shouldReceive('map')->once()->andReturn('mapped array');

		$this->assertEquals('mapped array', $driverMapper->map([]));
	}
}
