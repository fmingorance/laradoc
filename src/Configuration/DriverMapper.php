<?php namespace Mingorance\LaraDoc\Configuration;

use Exception;

class DriverMapper
{
	/**
	 * Um array de mappers que pode ser reciclado para determinar qual mapper é apropriado para um dado arranjo de configuração.
	 *
	 * @var array
	 */
	private $mappers = [];

	/**
	 * Registra um novo driver de configuração do mapper.
	 *
	 * @param Mapper $mapper
	 */
	public function registerMapper(Mapper $mapper)
	{
		$this->mappers[] = $mapper;
	}

	/**
	 * Mapeia a configuração do Laravel para um driver de configuração e retorna o resultado.
	 *
	 * @param $configuration
	 * @return array
	 * @throws Exception
	 */
	public function map($configuration)
	{
		foreach ($this->mappers as $mapper)
			if ($mapper->isAppropriateFor($configuration))
				return $mapper->map($configuration);

		throw new Exception("Driver {$configuration['driver']} unsupported by package at this time.");
	}
}
