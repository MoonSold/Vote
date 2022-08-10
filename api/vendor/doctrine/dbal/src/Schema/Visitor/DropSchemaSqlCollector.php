<?php

namespace Doctrine\DBAL\Schema\Visitor;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Sequence;
use Doctrine\DBAL\Schema\Table;
<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
=======
>>>>>>> stage
use SplObjectStorage;

use function assert;
use function strlen;

/**
 * Gathers SQL statements that allow to completely drop the current schema.
<<<<<<< HEAD
 *
 * @deprecated Use {@link DropSchemaObjectsSQLBuilder} instead.
 */
class DropSchemaSqlCollector extends AbstractVisitor
{
    private SplObjectStorage $constraints;
    private SplObjectStorage $sequences;
    private SplObjectStorage $tables;
    private AbstractPlatform $platform;

    public function __construct(AbstractPlatform $platform)
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5416',
            'DropSchemaSqlCollector is deprecated. Use DropSchemaObjectsSQLBuilder instead.'
        );

=======
 */
class DropSchemaSqlCollector extends AbstractVisitor
{
    /** @var SplObjectStorage */
    private $constraints;

    /** @var SplObjectStorage */
    private $sequences;

    /** @var SplObjectStorage */
    private $tables;

    /** @var AbstractPlatform */
    private $platform;

    public function __construct(AbstractPlatform $platform)
    {
>>>>>>> stage
        $this->platform = $platform;
        $this->initializeQueries();
    }

    /**
     * {@inheritdoc}
     */
    public function acceptTable(Table $table)
    {
        $this->tables->attach($table);
    }

    /**
     * {@inheritdoc}
     */
    public function acceptForeignKey(Table $localTable, ForeignKeyConstraint $fkConstraint)
    {
        if (strlen($fkConstraint->getName()) === 0) {
            throw SchemaException::namedForeignKeyRequired($localTable, $fkConstraint);
        }

        $this->constraints->attach($fkConstraint, $localTable);
    }

    /**
     * {@inheritdoc}
     */
    public function acceptSequence(Sequence $sequence)
    {
        $this->sequences->attach($sequence);
    }

    /**
     * @return void
     */
    public function clearQueries()
    {
        $this->initializeQueries();
    }

    /**
     * @return string[]
     */
    public function getQueries()
    {
        $sql = [];

        foreach ($this->constraints as $fkConstraint) {
            assert($fkConstraint instanceof ForeignKeyConstraint);
            $localTable = $this->constraints[$fkConstraint];
<<<<<<< HEAD
            $sql[]      = $this->platform->getDropForeignKeySQL(
                $fkConstraint->getQuotedName($this->platform),
                $localTable->getQuotedName($this->platform)
            );
=======
            $sql[]      = $this->platform->getDropForeignKeySQL($fkConstraint, $localTable);
>>>>>>> stage
        }

        foreach ($this->sequences as $sequence) {
            assert($sequence instanceof Sequence);
<<<<<<< HEAD
            $sql[] = $this->platform->getDropSequenceSQL($sequence->getQuotedName($this->platform));
=======
            $sql[] = $this->platform->getDropSequenceSQL($sequence);
>>>>>>> stage
        }

        foreach ($this->tables as $table) {
            assert($table instanceof Table);
<<<<<<< HEAD
            $sql[] = $this->platform->getDropTableSQL($table->getQuotedName($this->platform));
=======
            $sql[] = $this->platform->getDropTableSQL($table);
>>>>>>> stage
        }

        return $sql;
    }

    private function initializeQueries(): void
    {
        $this->constraints = new SplObjectStorage();
        $this->sequences   = new SplObjectStorage();
        $this->tables      = new SplObjectStorage();
    }
}
