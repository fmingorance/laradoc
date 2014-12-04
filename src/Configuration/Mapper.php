<?php namespace Mingorance\LaraDoc\Configuration;

interface Mapper
{
	/**
	 * Gerencia o mapeamento das configurações.
	 *
	 * @param array $configuration
	 * @return mixed
	 */
	public function map(array $configuration);

	/**
	 * Determina se o array de configurações é apropriado para o mapper.
	 *
	 * @param array $configuration
	 * @return mixed
	 */
	public function isAppropriateFor(array $configuration);
}
