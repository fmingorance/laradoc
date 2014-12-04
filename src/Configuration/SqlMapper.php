<?php namespace Mingorance\LaraDoc\Configuration;

class SqlMapper implements Mapper
{
	/**
	 * Cria a configuração de mapeamento para bancos SQL, incluindo SQL Server, MySQL e PostgreeSQL.
	 *
	 * @param array $configuration
	 * @return array
	 */
	public function map(array $configuration)
	{
		return [
			'driver' => $this->driver($configuration['driver']),
			'host' => $configuration['host'],
			'dbname' => $configuration['database'],
			'user' => $configuration['username'],
			'password' => $configuration['password'],
			'charset' => $configuration['charset']
		];
	}

	/**
	 * Apropriado para configurações de mapeamento que utilizam mysql, postgres ou sqlserv.
	 *
	 * @param array $configuration
	 * @return boolean
	 */
	public function isAppropriateFor(array $configuration)
	{
		return in_array($configuration['driver'], ['sqlsrv', 'mysql', 'pgsql']);
	}

	/**
	 * Mapeia a sintaxe do driver do Laravel para um formato de SQL do Doctrine.
	 *
	 * @param $l4Driver
	 * @return string
	 */
	public function driver($l4Driver)
	{
		$doctrineDrivers = ['mysql' => 'pdo_mysql', 'sqlsrv' => 'pdo_sqlsrv', 'pgsql' => 'pdo_pgsql'];

		return $doctrineDrivers[$l4Driver];
	}
}
