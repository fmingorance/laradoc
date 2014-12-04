<?php namespace Mingorance\LaraDoc\Configuration;

class SqliteMapper implements Mapper
{
	/**
	 * Mapeia o array de configuração do Laravel para uma configuração "sqlite-friendly" do Doctrine.
	 *
	 * @param array $configuration
	 * @return array
	 */
	public function map(array $configuration)
	{
		$sqliteConfig = [
			'driver' => 'pdo_sqlite',
			'user' => @$configuration['username'],
			'password' => @$configuration['password']
		];
		$this->databaseLocation($configuration, $sqliteConfig);
		return $sqliteConfig;
	}

	/**
	 * Somente necessário para configurações de mapeamento sqlite.
	 *
	 * @param array $configuration
	 * @return bool
	 */
	public function isAppropriateFor(array $configuration)
	{
		return $configuration['driver'] == 'sqlite';
	}

	/**
	 * Determina a localização do banco de dados e adiciona à configuração do Doctrine.
	 *
	 * @param $configuration
	 * @param $sqliteConfig
	 */
	private function databaseLocation($configuration, &$sqliteConfig)
	{
		if ($configuration['database'] == ':memory:')
			$sqliteConfig['memory'] = true;
		else
			$sqliteConfig['path'] = app_path('database').'/'.$configuration['database'].'.sqlite';
	}
} 