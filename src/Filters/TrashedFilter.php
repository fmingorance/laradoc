<?php namespace Mingorance\LaraDoc\Filters;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class TrashedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $metadata, $table)
    {
        return $this->isSoftDeletable($metadata->rootEntityName) ? "{$table}.deleted_at IS NULL OR CURRENT_TIMESTAMP < {$table}.deleted_at" : '';
    }

    private function isSoftDeletable($entity)
    {
        return array_key_exists('Mingorance\LaraDoc\Traits\SoftDeletes', class_uses($entity));
    }
}
