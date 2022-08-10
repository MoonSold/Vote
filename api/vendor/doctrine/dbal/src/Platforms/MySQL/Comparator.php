<?php

namespace Doctrine\DBAL\Platforms\MySQL;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Comparator as BaseComparator;
use Doctrine\DBAL\Schema\Table;

use function array_diff_assoc;
use function array_intersect_key;

/**
 * Compares schemas in the context of MySQL platform.
 *
 * In MySQL, unless specified explicitly, the column's character set and collation are inherited from its containing
 * table. So during comparison, an omitted value and the value that matches the default value of table in the
 * desired schema must be considered equal.
 */
class Comparator extends BaseComparator
{
<<<<<<< HEAD
    /** @var CollationMetadataProvider */
    private $collationMetadataProvider;

    /**
     * @internal The comparator can be only instantiated by a schema manager.
     */
    public function __construct(AbstractMySQLPlatform $platform, CollationMetadataProvider $collationMetadataProvider)
    {
        parent::__construct($platform);

        $this->collationMetadataProvider = $collationMetadataProvider;
=======
    /**
     * @internal The comparator can be only instantiated by a schema manager.
     */
    public function __construct(AbstractMySQLPlatform $platform)
    {
        parent::__construct($platform);
>>>>>>> stage
    }

    /**
     * {@inheritDoc}
     */
    public function diffTable(Table $fromTable, Table $toTable)
    {
        return parent::diffTable(
            $this->normalizeColumns($fromTable),
            $this->normalizeColumns($toTable)
        );
    }

    private function normalizeColumns(Table $table): Table
    {
<<<<<<< HEAD
        $tableOptions = array_intersect_key($table->getOptions(), [
=======
        $defaults = array_intersect_key($table->getOptions(), [
>>>>>>> stage
            'charset'   => null,
            'collation' => null,
        ]);

<<<<<<< HEAD
        $table = clone $table;

        foreach ($table->getColumns() as $column) {
            $originalOptions   = $column->getPlatformOptions();
            $normalizedOptions = $this->normalizeOptions($originalOptions);

            $overrideOptions = array_diff_assoc($normalizedOptions, $tableOptions);

            if ($overrideOptions === $originalOptions) {
                continue;
            }

            $column->setPlatformOptions($overrideOptions);
=======
        if ($defaults === []) {
            return $table;
        }

        $table = clone $table;

        foreach ($table->getColumns() as $column) {
            $options = $column->getPlatformOptions();
            $diff    = array_diff_assoc($options, $defaults);

            if ($diff === $options) {
                continue;
            }

            $column->setPlatformOptions($diff);
>>>>>>> stage
        }

        return $table;
    }
<<<<<<< HEAD

    /**
     * @param array<string,string> $options
     *
     * @return array<string,string>
     */
    private function normalizeOptions(array $options): array
    {
        if (isset($options['collation']) && ! isset($options['charset'])) {
            $charset = $this->collationMetadataProvider->getCollationCharset($options['collation']);

            if ($charset !== null) {
                $options['charset'] = $charset;
            }
        }

        return $options;
    }
=======
>>>>>>> stage
}
