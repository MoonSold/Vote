<?php

namespace Doctrine\DBAL\Driver\IBMDB2;

use Doctrine\DBAL\Driver\Exception;
use Doctrine\DBAL\Driver\IBMDB2\Exception\CannotCopyStreamToStream;
use Doctrine\DBAL\Driver\IBMDB2\Exception\CannotCreateTemporaryFile;
<<<<<<< HEAD
=======
use Doctrine\DBAL\Driver\IBMDB2\Exception\CannotWriteToTemporaryFile;
>>>>>>> stage
use Doctrine\DBAL\Driver\IBMDB2\Exception\StatementError;
use Doctrine\DBAL\Driver\Result as ResultInterface;
use Doctrine\DBAL\Driver\Statement as StatementInterface;
use Doctrine\DBAL\ParameterType;
<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
=======
>>>>>>> stage

use function assert;
use function db2_bind_param;
use function db2_execute;
use function error_get_last;
use function fclose;
<<<<<<< HEAD
use function func_num_args;
use function is_int;
use function is_resource;
=======
use function fwrite;
use function is_int;
use function is_resource;
use function ksort;
>>>>>>> stage
use function stream_copy_to_stream;
use function stream_get_meta_data;
use function tmpfile;

use const DB2_BINARY;
use const DB2_CHAR;
use const DB2_LONG;
use const DB2_PARAM_FILE;
use const DB2_PARAM_IN;

final class Statement implements StatementInterface
{
    /** @var resource */
    private $stmt;

    /** @var mixed[] */
<<<<<<< HEAD
    private array $parameters = [];
=======
    private $bindParam = [];
>>>>>>> stage

    /**
     * Map of LOB parameter positions to the tuples containing reference to the variable bound to the driver statement
     * and the temporary file handle bound to the underlying statement
     *
<<<<<<< HEAD
     * @var array<int,string|resource|null>
     */
    private array $lobs = [];
=======
     * @var mixed[][]
     */
    private $lobs = [];
>>>>>>> stage

    /**
     * @internal The statement can be only instantiated by its driver connection.
     *
     * @param resource $stmt
     */
    public function __construct($stmt)
    {
        $this->stmt = $stmt;
    }

    /**
     * {@inheritdoc}
     */
    public function bindValue($param, $value, $type = ParameterType::STRING): bool
    {
        assert(is_int($param));

<<<<<<< HEAD
        if (func_num_args() < 3) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5558',
                'Not passing $type to Statement::bindValue() is deprecated.'
                    . ' Pass the type corresponding to the parameter being bound.'
            );
        }

=======
>>>>>>> stage
        return $this->bindParam($param, $value, $type);
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated Use {@see bindValue()} instead.
     */
    public function bindParam($param, &$variable, $type = ParameterType::STRING, $length = null): bool
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5563',
            '%s is deprecated. Use bindValue() instead.',
            __METHOD__
        );

        assert(is_int($param));

        if (func_num_args() < 3) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5558',
                'Not passing $type to Statement::bindParam() is deprecated.'
                    . ' Pass the type corresponding to the parameter being bound.'
            );
        }

=======
     */
    public function bindParam($param, &$variable, $type = ParameterType::STRING, $length = null): bool
    {
        assert(is_int($param));

>>>>>>> stage
        switch ($type) {
            case ParameterType::INTEGER:
                $this->bind($param, $variable, DB2_PARAM_IN, DB2_LONG);
                break;

            case ParameterType::LARGE_OBJECT:
<<<<<<< HEAD
                $this->lobs[$param] = &$variable;
=======
                if (isset($this->lobs[$param])) {
                    [, $handle] = $this->lobs[$param];
                    fclose($handle);
                }

                $handle = $this->createTemporaryFile();
                $path   = stream_get_meta_data($handle)['uri'];

                $this->bind($param, $path, DB2_PARAM_FILE, DB2_BINARY);

                $this->lobs[$param] = [&$variable, $handle];
>>>>>>> stage
                break;

            default:
                $this->bind($param, $variable, DB2_PARAM_IN, DB2_CHAR);
                break;
        }

        return true;
    }

    /**
     * @param int   $position Parameter position
     * @param mixed $variable
     *
     * @throws Exception
     */
    private function bind($position, &$variable, int $parameterType, int $dataType): void
    {
<<<<<<< HEAD
        $this->parameters[$position] =& $variable;

        if (! db2_bind_param($this->stmt, $position, '', $parameterType, $dataType)) {
=======
        $this->bindParam[$position] =& $variable;

        if (! db2_bind_param($this->stmt, $position, 'variable', $parameterType, $dataType)) {
>>>>>>> stage
            throw StatementError::new($this->stmt);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function execute($params = null): ResultInterface
    {
<<<<<<< HEAD
        if ($params !== null) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5556',
                'Passing $params to Statement::execute() is deprecated. Bind parameters using'
                    . ' Statement::bindParam() or Statement::bindValue() instead.'
            );
        }

        $handles = $this->bindLobs();

        $result = @db2_execute($this->stmt, $params ?? $this->parameters);

        foreach ($handles as $handle) {
=======
        if ($params === null) {
            ksort($this->bindParam);

            $params = [];

            foreach ($this->bindParam as $value) {
                $params[] = $value;
            }
        }

        foreach ($this->lobs as [$source, $target]) {
            if (is_resource($source)) {
                $this->copyStreamToStream($source, $target);

                continue;
            }

            $this->writeStringToStream($source, $target);
        }

        $result = @db2_execute($this->stmt, $params);

        foreach ($this->lobs as [, $handle]) {
>>>>>>> stage
            fclose($handle);
        }

        $this->lobs = [];

        if ($result === false) {
            throw StatementError::new($this->stmt);
        }

        return new Result($this->stmt);
    }

    /**
<<<<<<< HEAD
     * @return list<resource>
     *
     * @throws Exception
     */
    private function bindLobs(): array
    {
        $handles = [];

        foreach ($this->lobs as $param => $value) {
            if (is_resource($value)) {
                $handle = $handles[] = $this->createTemporaryFile();
                $path   = stream_get_meta_data($handle)['uri'];

                $this->copyStreamToStream($value, $handle);

                $this->bind($param, $path, DB2_PARAM_FILE, DB2_BINARY);
            } else {
                $this->bind($param, $value, DB2_PARAM_IN, DB2_CHAR);
            }
        }

        return $handles;
    }

    /**
=======
>>>>>>> stage
     * @return resource
     *
     * @throws Exception
     */
    private function createTemporaryFile()
    {
        $handle = @tmpfile();

        if ($handle === false) {
            throw CannotCreateTemporaryFile::new(error_get_last());
        }

        return $handle;
    }

    /**
     * @param resource $source
     * @param resource $target
     *
     * @throws Exception
     */
    private function copyStreamToStream($source, $target): void
    {
        if (@stream_copy_to_stream($source, $target) === false) {
            throw CannotCopyStreamToStream::new(error_get_last());
        }
    }
<<<<<<< HEAD
=======

    /**
     * @param resource $target
     *
     * @throws Exception
     */
    private function writeStringToStream(string $string, $target): void
    {
        if (@fwrite($target, $string) === false) {
            throw CannotWriteToTemporaryFile::new(error_get_last());
        }
    }
>>>>>>> stage
}
