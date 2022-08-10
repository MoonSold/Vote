<?php

namespace Doctrine\DBAL\Platforms;

<<<<<<< HEAD
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\ColumnDiff;
use Doctrine\DBAL\Schema\DB2SchemaManager;
=======
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\ColumnDiff;
>>>>>>> stage
use Doctrine\DBAL\Schema\Identifier;
use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\TableDiff;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Doctrine\Deprecations\Deprecation;

use function array_merge;
use function count;
use function current;
use function explode;
use function func_get_arg;
use function func_num_args;
use function implode;
use function sprintf;
use function strpos;

class DB2Platform extends AbstractPlatform
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function getCharMaxLength(): int
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/3263',
            'DB2Platform::getCharMaxLength() is deprecated.'
        );

=======
    public function getCharMaxLength(): int
    {
>>>>>>> stage
        return 254;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated
     */
    public function getBinaryMaxLength()
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/3263',
            'DB2Platform::getBinaryMaxLength() is deprecated.'
        );

=======
     */
    public function getBinaryMaxLength()
    {
>>>>>>> stage
        return 32704;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated
     */
    public function getBinaryDefaultLength()
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/3263',
            'Relying on the default binary column length is deprecated, specify the length explicitly.'
        );

=======
     */
    public function getBinaryDefaultLength()
    {
>>>>>>> stage
        return 1;
    }

    /**
     * {@inheritDoc}
     */
    public function getVarcharTypeDeclarationSQL(array $column)
    {
        // for IBM DB2, the CHAR max length is less than VARCHAR default length
        if (! isset($column['length']) && ! empty($column['fixed'])) {
            $column['length'] = $this->getCharMaxLength();
        }

        return parent::getVarcharTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function getBlobTypeDeclarationSQL(array $column)
    {
        // todo blob(n) with $column['length'];
        return 'BLOB(1M)';
    }

    /**
     * {@inheritDoc}
     */
    protected function initializeDoctrineTypeMappings()
    {
        $this->doctrineTypeMapping = [
            'bigint'    => 'bigint',
            'binary'    => 'binary',
            'blob'      => 'blob',
            'character' => 'string',
            'clob'      => 'text',
            'date'      => 'date',
            'decimal'   => 'decimal',
            'double'    => 'float',
            'integer'   => 'integer',
            'real'      => 'float',
            'smallint'  => 'smallint',
            'time'      => 'time',
            'timestamp' => 'datetime',
            'varbinary' => 'binary',
            'varchar'   => 'string',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function isCommentedDoctrineType(Type $doctrineType)
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5058',
            '%s is deprecated and will be removed in Doctrine DBAL 4.0. Use Type::requiresSQLCommentHint() instead.',
            __METHOD__
        );

        if ($doctrineType->getName() === Types::BOOLEAN) {
            // We require a commented boolean type in order to distinguish between boolean and smallint
            // as both (have to) map to the same native type.
            return true;
        }

        return parent::isCommentedDoctrineType($doctrineType);
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    protected function getVarcharTypeDeclarationSQLSnippet($length, $fixed/*, $lengthOmitted = false*/)
    {
        if ($length <= 0 || (func_num_args() > 2 && func_get_arg(2))) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/issues/3263',
                'Relying on the default string column length on IBM DB2 is deprecated'
                    . ', specify the length explicitly.'
            );
        }

=======
    protected function getVarcharTypeDeclarationSQLSnippet($length, $fixed)
    {
>>>>>>> stage
        return $fixed ? ($length > 0 ? 'CHAR(' . $length . ')' : 'CHAR(254)')
                : ($length > 0 ? 'VARCHAR(' . $length . ')' : 'VARCHAR(255)');
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function getBinaryTypeDeclarationSQLSnippet($length, $fixed/*, $lengthOmitted = false*/)
    {
        if ($length <= 0 || (func_num_args() > 2 && func_get_arg(2))) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/issues/3263',
                'Relying on the default binary column length on IBM DB2 is deprecated'
                . ', specify the length explicitly.'
            );
        }

=======
    protected function getBinaryTypeDeclarationSQLSnippet($length, $fixed)
    {
>>>>>>> stage
        return $this->getVarcharTypeDeclarationSQLSnippet($length, $fixed) . ' FOR BIT DATA';
    }

    /**
     * {@inheritDoc}
     */
    public function getClobTypeDeclarationSQL(array $column)
    {
        // todo clob(n) with $column['length'];
        return 'CLOB(1M)';
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/4749',
            'DB2Platform::getName() is deprecated. Identify platforms by their class.'
        );

        return 'db2';
    }

    /**
     * {@inheritDoc}
     */
    public function getBooleanTypeDeclarationSQL(array $column)
    {
        return 'SMALLINT';
    }

    /**
     * {@inheritDoc}
     */
    public function getIntegerTypeDeclarationSQL(array $column)
    {
        return 'INTEGER' . $this->_getCommonIntegerTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function getBigIntTypeDeclarationSQL(array $column)
    {
        return 'BIGINT' . $this->_getCommonIntegerTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function getSmallIntTypeDeclarationSQL(array $column)
    {
        return 'SMALLINT' . $this->_getCommonIntegerTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    protected function _getCommonIntegerTypeDeclarationSQL(array $column)
    {
        $autoinc = '';
        if (! empty($column['autoincrement'])) {
            $autoinc = ' GENERATED BY DEFAULT AS IDENTITY';
        }

        return $autoinc;
    }

    /**
     * {@inheritdoc}
     */
    public function getBitAndComparisonExpression($value1, $value2)
    {
        return 'BITAND(' . $value1 . ', ' . $value2 . ')';
    }

    /**
     * {@inheritdoc}
     */
    public function getBitOrComparisonExpression($value1, $value2)
    {
        return 'BITOR(' . $value1 . ', ' . $value2 . ')';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDateArithmeticIntervalExpression($date, $operator, $interval, $unit)
    {
        switch ($unit) {
            case DateIntervalUnit::WEEK:
                $interval *= 7;
                $unit      = DateIntervalUnit::DAY;
                break;

            case DateIntervalUnit::QUARTER:
                $interval *= 3;
                $unit      = DateIntervalUnit::MONTH;
                break;
        }

        return $date . ' ' . $operator . ' ' . $interval . ' ' . $unit;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateDiffExpression($date1, $date2)
    {
        return 'DAYS(' . $date1 . ') - DAYS(' . $date2 . ')';
    }

    /**
     * {@inheritDoc}
     */
    public function getDateTimeTypeDeclarationSQL(array $column)
    {
        if (isset($column['version']) && $column['version'] === true) {
            return 'TIMESTAMP(0) WITH DEFAULT';
        }

        return 'TIMESTAMP(0)';
    }

    /**
     * {@inheritDoc}
     */
    public function getDateTypeDeclarationSQL(array $column)
    {
        return 'DATE';
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeTypeDeclarationSQL(array $column)
    {
        return 'TIME';
    }

    /**
     * {@inheritdoc}
     */
    public function getTruncateTableSQL($tableName, $cascade = false)
    {
        $tableIdentifier = new Identifier($tableName);

        return 'TRUNCATE ' . $tableIdentifier->getQuotedName($this) . ' IMMEDIATE';
    }

    /**
<<<<<<< HEAD
     * @deprecated The SQL used for schema introspection is an implementation detail and should not be relied upon.
     *
=======
>>>>>>> stage
     * This code fragment is originally from the Zend_Db_Adapter_Db2 class, but has been edited.
     *
     * @param string $table
     * @param string $database
     *
     * @return string
     */
    public function getListTableColumnsSQL($table, $database = null)
    {
        $table = $this->quoteStringLiteral($table);

        // We do the funky subquery and join syscat.columns.default this crazy way because
        // as of db2 v10, the column is CLOB(64k) and the distinct operator won't allow a CLOB,
        // it wants shorter stuff like a varchar.
        return "
        SELECT
          cols.default,
          subq.*
        FROM (
               SELECT DISTINCT
                 c.tabschema,
                 c.tabname,
                 c.colname,
                 c.colno,
                 c.typename,
                 c.codepage,
                 c.nulls,
                 c.length,
                 c.scale,
                 c.identity,
                 tc.type AS tabconsttype,
                 c.remarks AS comment,
                 k.colseq,
                 CASE
                 WHEN c.generated = 'D' THEN 1
                 ELSE 0
                 END     AS autoincrement
               FROM syscat.columns c
                 LEFT JOIN (syscat.keycoluse k JOIN syscat.tabconst tc
                     ON (k.tabschema = tc.tabschema
                         AND k.tabname = tc.tabname
                         AND tc.type = 'P'))
                   ON (c.tabschema = k.tabschema
                       AND c.tabname = k.tabname
                       AND c.colname = k.colname)
               WHERE UPPER(c.tabname) = UPPER(" . $table . ')
               ORDER BY c.colno
             ) subq
          JOIN syscat.columns cols
            ON subq.tabschema = cols.tabschema
               AND subq.tabname = cols.tabname
               AND subq.colno = cols.colno
        ORDER BY subq.colno
        ';
    }

    /**
<<<<<<< HEAD
     * @deprecated The SQL used for schema introspection is an implementation detail and should not be relied upon.
     *
=======
>>>>>>> stage
     * {@inheritDoc}
     */
    public function getListTablesSQL()
    {
<<<<<<< HEAD
        return "SELECT NAME FROM SYSIBM.SYSTABLES WHERE TYPE = 'T' AND CREATOR = CURRENT_USER";
=======
        return "SELECT NAME FROM SYSIBM.SYSTABLES WHERE TYPE = 'T'";
>>>>>>> stage
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @internal The method should be only used from within the {@see AbstractSchemaManager} class hierarchy.
=======
>>>>>>> stage
     */
    public function getListViewsSQL($database)
    {
        return 'SELECT NAME, TEXT FROM SYSIBM.SYSVIEWS';
    }

    /**
<<<<<<< HEAD
     * @deprecated The SQL used for schema introspection is an implementation detail and should not be relied upon.
     *
=======
>>>>>>> stage
     * {@inheritDoc}
     */
    public function getListTableIndexesSQL($table, $database = null)
    {
        $table = $this->quoteStringLiteral($table);

        return "SELECT   idx.INDNAME AS key_name,
                         idxcol.COLNAME AS column_name,
                         CASE
                             WHEN idx.UNIQUERULE = 'P' THEN 1
                             ELSE 0
                         END AS primary,
                         CASE
                             WHEN idx.UNIQUERULE = 'D' THEN 1
                             ELSE 0
                         END AS non_unique
                FROM     SYSCAT.INDEXES AS idx
                JOIN     SYSCAT.INDEXCOLUSE AS idxcol
                ON       idx.INDSCHEMA = idxcol.INDSCHEMA AND idx.INDNAME = idxcol.INDNAME
                WHERE    idx.TABNAME = UPPER(" . $table . ')
                ORDER BY idxcol.COLSEQ ASC';
    }

    /**
<<<<<<< HEAD
     * @deprecated The SQL used for schema introspection is an implementation detail and should not be relied upon.
     *
=======
>>>>>>> stage
     * {@inheritDoc}
     */
    public function getListTableForeignKeysSQL($table)
    {
        $table = $this->quoteStringLiteral($table);

        return "SELECT   fkcol.COLNAME AS local_column,
                         fk.REFTABNAME AS foreign_table,
                         pkcol.COLNAME AS foreign_column,
                         fk.CONSTNAME AS index_name,
                         CASE
                             WHEN fk.UPDATERULE = 'R' THEN 'RESTRICT'
                             ELSE NULL
                         END AS on_update,
                         CASE
                             WHEN fk.DELETERULE = 'C' THEN 'CASCADE'
                             WHEN fk.DELETERULE = 'N' THEN 'SET NULL'
                             WHEN fk.DELETERULE = 'R' THEN 'RESTRICT'
                             ELSE NULL
                         END AS on_delete
                FROM     SYSCAT.REFERENCES AS fk
                JOIN     SYSCAT.KEYCOLUSE AS fkcol
                ON       fk.CONSTNAME = fkcol.CONSTNAME
                AND      fk.TABSCHEMA = fkcol.TABSCHEMA
                AND      fk.TABNAME = fkcol.TABNAME
                JOIN     SYSCAT.KEYCOLUSE AS pkcol
                ON       fk.REFKEYNAME = pkcol.CONSTNAME
                AND      fk.REFTABSCHEMA = pkcol.TABSCHEMA
                AND      fk.REFTABNAME = pkcol.TABNAME
                WHERE    fk.TABNAME = UPPER(" . $table . ')
                ORDER BY fkcol.COLSEQ ASC';
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @deprecated
     */
    public function supportsCreateDropDatabase()
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5513',
            '%s is deprecated.',
            __METHOD__
        );

=======
     */
    public function supportsCreateDropDatabase()
    {
>>>>>>> stage
        return false;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @internal The method should be only used from within the {@see AbstractPlatform} class hierarchy.
=======
>>>>>>> stage
     */
    public function supportsCommentOnStatement()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentDateSQL()
    {
        return 'CURRENT DATE';
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentTimeSQL()
    {
        return 'CURRENT TIME';
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentTimestampSQL()
    {
        return 'CURRENT TIMESTAMP';
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @internal The method should be only used from within the {@see AbstractPlatform} class hierarchy.
=======
>>>>>>> stage
     */
    public function getIndexDeclarationSQL($name, Index $index)
    {
        // Index declaration in statements like CREATE TABLE is not supported.
        throw Exception::notSupported(__METHOD__);
    }

    /**
     * {@inheritDoc}
     */
    protected function _getCreateTableSQL($name, array $columns, array $options = [])
    {
        $indexes = [];
        if (isset($options['indexes'])) {
            $indexes = $options['indexes'];
        }

        $options['indexes'] = [];

        $sqls = parent::_getCreateTableSQL($name, $columns, $options);

        foreach ($indexes as $definition) {
            $sqls[] = $this->getCreateIndexSQL($definition, $name);
        }

        return $sqls;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlterTableSQL(TableDiff $diff)
    {
        $sql         = [];
        $columnSql   = [];
        $commentsSQL = [];

        $queryParts = [];
        foreach ($diff->addedColumns as $column) {
            if ($this->onSchemaAlterTableAddColumn($column, $diff, $columnSql)) {
                continue;
            }

            $columnDef = $column->toArray();
            $queryPart = 'ADD COLUMN ' . $this->getColumnDeclarationSQL($column->getQuotedName($this), $columnDef);

            // Adding non-nullable columns to a table requires a default value to be specified.
            if (
                ! empty($columnDef['notnull']) &&
                ! isset($columnDef['default']) &&
                empty($columnDef['autoincrement'])
            ) {
                $queryPart .= ' WITH DEFAULT';
            }

            $queryParts[] = $queryPart;

            $comment = $this->getColumnComment($column);

            if ($comment === null || $comment === '') {
                continue;
            }

            $commentsSQL[] = $this->getCommentOnColumnSQL(
                $diff->getName($this)->getQuotedName($this),
                $column->getQuotedName($this),
                $comment
            );
        }

        foreach ($diff->removedColumns as $column) {
            if ($this->onSchemaAlterTableRemoveColumn($column, $diff, $columnSql)) {
                continue;
            }

            $queryParts[] =  'DROP COLUMN ' . $column->getQuotedName($this);
        }

        foreach ($diff->changedColumns as $columnDiff) {
            if ($this->onSchemaAlterTableChangeColumn($columnDiff, $diff, $columnSql)) {
                continue;
            }

            if ($columnDiff->hasChanged('comment')) {
                $commentsSQL[] = $this->getCommentOnColumnSQL(
                    $diff->getName($this)->getQuotedName($this),
                    $columnDiff->column->getQuotedName($this),
                    $this->getColumnComment($columnDiff->column)
                );

                if (count($columnDiff->changedProperties) === 1) {
                    continue;
                }
            }

            $this->gatherAlterColumnSQL($diff->getName($this), $columnDiff, $sql, $queryParts);
        }

        foreach ($diff->renamedColumns as $oldColumnName => $column) {
            if ($this->onSchemaAlterTableRenameColumn($oldColumnName, $column, $diff, $columnSql)) {
                continue;
            }

            $oldColumnName = new Identifier($oldColumnName);

            $queryParts[] =  'RENAME COLUMN ' . $oldColumnName->getQuotedName($this) .
                ' TO ' . $column->getQuotedName($this);
        }

        $tableSql = [];

        if (! $this->onSchemaAlterTable($diff, $tableSql)) {
            if (count($queryParts) > 0) {
                $sql[] = 'ALTER TABLE ' . $diff->getName($this)->getQuotedName($this) . ' ' . implode(' ', $queryParts);
            }

            // Some table alteration operations require a table reorganization.
            if (! empty($diff->removedColumns) || ! empty($diff->changedColumns)) {
                $sql[] = "CALL SYSPROC.ADMIN_CMD ('REORG TABLE " . $diff->getName($this)->getQuotedName($this) . "')";
            }

            $sql = array_merge($sql, $commentsSQL);

            $newName = $diff->getNewName();

            if ($newName !== false) {
                $sql[] = sprintf(
                    'RENAME TABLE %s TO %s',
                    $diff->getName($this)->getQuotedName($this),
                    $newName->getQuotedName($this)
                );
            }

            $sql = array_merge(
                $this->getPreAlterTableIndexForeignKeySQL($diff),
                $sql,
                $this->getPostAlterTableIndexForeignKeySQL($diff)
            );
        }

        return array_merge($sql, $tableSql, $columnSql);
    }

    /**
     * Gathers the table alteration SQL for a given column diff.
     *
     * @param Identifier $table      The table to gather the SQL for.
     * @param ColumnDiff $columnDiff The column diff to evaluate.
     * @param string[]   $sql        The sequence of table alteration statements to fill.
     * @param mixed[]    $queryParts The sequence of column alteration clauses to fill.
     */
    private function gatherAlterColumnSQL(
        Identifier $table,
        ColumnDiff $columnDiff,
        array &$sql,
        array &$queryParts
    ): void {
        $alterColumnClauses = $this->getAlterColumnClausesSQL($columnDiff);

        if (empty($alterColumnClauses)) {
            return;
        }

        // If we have a single column alteration, we can append the clause to the main query.
        if (count($alterColumnClauses) === 1) {
            $queryParts[] = current($alterColumnClauses);

            return;
        }

        // We have multiple alterations for the same column,
        // so we need to trigger a complete ALTER TABLE statement
        // for each ALTER COLUMN clause.
        foreach ($alterColumnClauses as $alterColumnClause) {
            $sql[] = 'ALTER TABLE ' . $table->getQuotedName($this) . ' ' . $alterColumnClause;
        }
    }

    /**
     * Returns the ALTER COLUMN SQL clauses for altering a column described by the given column diff.
     *
     * @return string[]
     */
    private function getAlterColumnClausesSQL(ColumnDiff $columnDiff): array
    {
        $column = $columnDiff->column->toArray();

        $alterClause = 'ALTER COLUMN ' . $columnDiff->column->getQuotedName($this);

        if ($column['columnDefinition'] !== null) {
            return [$alterClause . ' ' . $column['columnDefinition']];
        }

        $clauses = [];

        if (
            $columnDiff->hasChanged('type') ||
            $columnDiff->hasChanged('length') ||
            $columnDiff->hasChanged('precision') ||
            $columnDiff->hasChanged('scale') ||
            $columnDiff->hasChanged('fixed')
        ) {
            $clauses[] = $alterClause . ' SET DATA TYPE ' . $column['type']->getSQLDeclaration($column, $this);
        }

        if ($columnDiff->hasChanged('notnull')) {
            $clauses[] = $column['notnull'] ? $alterClause . ' SET NOT NULL' : $alterClause . ' DROP NOT NULL';
        }

        if ($columnDiff->hasChanged('default')) {
            if (isset($column['default'])) {
                $defaultClause = $this->getDefaultValueDeclarationSQL($column);

                if ($defaultClause !== '') {
                    $clauses[] = $alterClause . ' SET' . $defaultClause;
                }
            } else {
                $clauses[] = $alterClause . ' DROP DEFAULT';
            }
        }

        return $clauses;
    }

    /**
     * {@inheritDoc}
     */
    protected function getPreAlterTableIndexForeignKeySQL(TableDiff $diff)
    {
        $sql   = [];
        $table = $diff->getName($this)->getQuotedName($this);

        foreach ($diff->removedIndexes as $remKey => $remIndex) {
            foreach ($diff->addedIndexes as $addKey => $addIndex) {
                if ($remIndex->getColumns() !== $addIndex->getColumns()) {
                    continue;
                }

                if ($remIndex->isPrimary()) {
                    $sql[] = 'ALTER TABLE ' . $table . ' DROP PRIMARY KEY';
                } elseif ($remIndex->isUnique()) {
                    $sql[] = 'ALTER TABLE ' . $table . ' DROP UNIQUE ' . $remIndex->getQuotedName($this);
                } else {
                    $sql[] = $this->getDropIndexSQL($remIndex, $table);
                }

                $sql[] = $this->getCreateIndexSQL($addIndex, $table);

                unset($diff->removedIndexes[$remKey], $diff->addedIndexes[$addKey]);

                break;
            }
        }

        $sql = array_merge($sql, parent::getPreAlterTableIndexForeignKeySQL($diff));

        return $sql;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRenameIndexSQL($oldIndexName, Index $index, $tableName)
    {
        if (strpos($tableName, '.') !== false) {
            [$schema]     = explode('.', $tableName);
            $oldIndexName = $schema . '.' . $oldIndexName;
        }

        return ['RENAME INDEX ' . $oldIndexName . ' TO ' . $index->getQuotedName($this)];
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @internal The method should be only used from within the {@see AbstractPlatform} class hierarchy.
=======
>>>>>>> stage
     */
    public function getDefaultValueDeclarationSQL($column)
    {
        if (! empty($column['autoincrement'])) {
            return '';
        }

        if (! empty($column['version'])) {
            if ((string) $column['type'] !== 'DateTime') {
                $column['default'] = '1';
            }
        }

        return parent::getDefaultValueDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmptyIdentityInsertSQL($quotedTableName, $quotedIdentifierColumnName)
    {
        return 'INSERT INTO ' . $quotedTableName . ' (' . $quotedIdentifierColumnName . ') VALUES (DEFAULT)';
    }

    /**
     * {@inheritDoc}
     */
    public function getCreateTemporaryTableSnippetSQL()
    {
        return 'DECLARE GLOBAL TEMPORARY TABLE';
    }

    /**
     * {@inheritDoc}
     */
    public function getTemporaryTableName($tableName)
    {
        return 'SESSION.' . $tableName;
    }

    /**
     * {@inheritDoc}
     */
    protected function doModifyLimitQuery($query, $limit, $offset)
    {
        $where = [];

        if ($offset > 0) {
            $where[] = sprintf('db22.DC_ROWNUM >= %d', $offset + 1);
        }

        if ($limit !== null) {
            $where[] = sprintf('db22.DC_ROWNUM <= %d', $offset + $limit);
        }

        if (empty($where)) {
            return $query;
        }

        // Todo OVER() needs ORDER BY data!
        return sprintf(
            'SELECT db22.* FROM (SELECT db21.*, ROW_NUMBER() OVER() AS DC_ROWNUM FROM (%s) db21) db22 WHERE %s',
            $query,
            implode(' AND ', $where)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getLocateExpression($str, $substr, $startPos = false)
    {
        if ($startPos === false) {
            return 'LOCATE(' . $substr . ', ' . $str . ')';
        }

        return 'LOCATE(' . $substr . ', ' . $str . ', ' . $startPos . ')';
    }

    /**
     * {@inheritDoc}
     */
    public function getSubstringExpression($string, $start, $length = null)
    {
        if ($length === null) {
            return 'SUBSTR(' . $string . ', ' . $start . ')';
        }

        return 'SUBSTR(' . $string . ', ' . $start . ', ' . $length . ')';
    }

    /**
     * {@inheritDoc}
     */
    public function getLengthExpression($column)
    {
        return 'LENGTH(' . $column . ', CODEUNITS32)';
    }

    public function getCurrentDatabaseExpression(): string
    {
        return 'CURRENT_USER';
    }

    /**
     * {@inheritDoc}
     */
    public function supportsIdentityColumns()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @deprecated
     */
    public function prefersIdentityColumns()
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pulls/1519',
            'DB2Platform::prefersIdentityColumns() is deprecated.'
        );

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getForUpdateSQL()
    {
        return ' WITH RR USE AND KEEP UPDATE LOCKS';
    }

    /**
     * {@inheritDoc}
     */
    public function getDummySelectSQL()
    {
        $expression = func_num_args() > 0 ? func_get_arg(0) : '1';

        return sprintf('SELECT %s FROM sysibm.sysdummy1', $expression);
    }

    /**
     * {@inheritDoc}
     *
     * DB2 supports savepoints, but they work semantically different than on other vendor platforms.
     *
     * TODO: We have to investigate how to get DB2 up and running with savepoints.
     */
    public function supportsSavepoints()
    {
        return false;
    }

    /**
     * {@inheritDoc}
     *
     * @deprecated Implement {@see createReservedKeywordsList()} instead.
     */
    protected function getReservedKeywordsClass()
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/4510',
            'DB2Platform::getReservedKeywordsClass() is deprecated,'
                . ' use DB2Platform::createReservedKeywordsList() instead.'
        );

        return Keywords\DB2Keywords::class;
    }

<<<<<<< HEAD
    /**
     * @deprecated The SQL used for schema introspection is an implementation detail and should not be relied upon.
     */
=======
>>>>>>> stage
    public function getListTableCommentsSQL(string $table): string
    {
        return sprintf(
            <<<'SQL'
SELECT REMARKS
  FROM SYSIBM.SYSTABLES
  WHERE NAME = UPPER( %s )
SQL
            ,
            $this->quoteStringLiteral($table)
        );
    }
<<<<<<< HEAD

    public function createSchemaManager(Connection $connection): DB2SchemaManager
    {
        return new DB2SchemaManager($connection, $this);
    }
=======
>>>>>>> stage
}
