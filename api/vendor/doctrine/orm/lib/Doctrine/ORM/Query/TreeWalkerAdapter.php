<?php

declare(strict_types=1);

namespace Doctrine\ORM\Query;

<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Mapping\ClassMetadata;
use LogicException;

use function array_diff;
use function array_keys;
use function debug_backtrace;
use function is_a;
use function sprintf;

use const DEBUG_BACKTRACE_IGNORE_ARGS;
=======
use Doctrine\ORM\AbstractQuery;

use function array_diff;
use function array_keys;
>>>>>>> stage

/**
 * An adapter implementation of the TreeWalker interface. The methods in this class
 * are empty. This class exists as convenience for creating tree walkers.
 *
 * @psalm-import-type QueryComponent from Parser
 */
abstract class TreeWalkerAdapter implements TreeWalker
{
    /**
     * The original Query.
     *
     * @var AbstractQuery
     */
<<<<<<< HEAD
    private $query;
=======
    private $_query;
>>>>>>> stage

    /**
     * The ParserResult of the original query that was produced by the Parser.
     *
     * @var ParserResult
     */
<<<<<<< HEAD
    private $parserResult;
=======
    private $_parserResult;
>>>>>>> stage

    /**
     * The query components of the original query (the "symbol table") that was produced by the Parser.
     *
     * @psalm-var array<string, QueryComponent>
     */
<<<<<<< HEAD
    private $queryComponents;
=======
    private $_queryComponents;
>>>>>>> stage

    /**
     * {@inheritdoc}
     */
    public function __construct($query, $parserResult, array $queryComponents)
    {
<<<<<<< HEAD
        $this->query           = $query;
        $this->parserResult    = $parserResult;
        $this->queryComponents = $queryComponents;
=======
        $this->_query           = $query;
        $this->_parserResult    = $parserResult;
        $this->_queryComponents = $queryComponents;
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryComponents()
    {
<<<<<<< HEAD
        return $this->queryComponents;
    }

    /**
     * Sets or overrides a query component for a given dql alias.
     *
     * @internal This method will be protected in 3.0.
     *
     * @param string               $dqlAlias       The DQL alias.
     * @param array<string, mixed> $queryComponent
     * @psalm-param QueryComponent $queryComponent
     *
     * @return void
     */
    public function setQueryComponent($dqlAlias, array $queryComponent)
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        if (! isset($trace[1]['class']) || ! is_a($trace[1]['class'], self::class, true)) {
            Deprecation::trigger(
                'doctrine/orm',
                'https://github.com/doctrine/orm/pull/9551',
                'Method %s will be protected in 3.0. Calling it publicly is deprecated.',
                __METHOD__
            );
        }

=======
        return $this->_queryComponents;
    }

    /**
     * {@inheritdoc}
     */
    public function setQueryComponent($dqlAlias, array $queryComponent)
    {
>>>>>>> stage
        $requiredKeys = ['metadata', 'parent', 'relation', 'map', 'nestingLevel', 'token'];

        if (array_diff($requiredKeys, array_keys($queryComponent))) {
            throw QueryException::invalidQueryComponent($dqlAlias);
        }

<<<<<<< HEAD
        $this->queryComponents[$dqlAlias] = $queryComponent;
    }

    /**
     * Returns internal queryComponents array.
     *
     * @deprecated Call {@see getQueryComponents()} instead.
     *
     * @return array<string, array<string, mixed>>
     * @psalm-return array<string, QueryComponent>
     */
    protected function _getQueryComponents()
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method %s is deprecated, call getQueryComponents() instead.',
            __METHOD__
        );

        return $this->queryComponents;
=======
        $this->_queryComponents[$dqlAlias] = $queryComponent;
    }

    /**
     * {@inheritDoc}
     */
    protected function _getQueryComponents()
    {
        return $this->_queryComponents;
>>>>>>> stage
    }

    /**
     * Retrieves the Query Instance responsible for the current walkers execution.
     *
     * @return AbstractQuery
     */
    protected function _getQuery()
    {
<<<<<<< HEAD
        return $this->query;
=======
        return $this->_query;
>>>>>>> stage
    }

    /**
     * Retrieves the ParserResult.
     *
     * @return ParserResult
     */
    protected function _getParserResult()
    {
<<<<<<< HEAD
        return $this->parserResult;
    }

=======
        return $this->_parserResult;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
>>>>>>> stage
    public function walkSelectStatement(AST\SelectStatement $AST)
    {
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSelectClause($selectClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSelectClause($selectClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkFromClause($fromClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkFromClause($fromClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkFunction($function)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkFunction($function)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkOrderByClause($orderByClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkOrderByClause($orderByClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkOrderByItem($orderByItem)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkOrderByItem($orderByItem)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkHavingClause($havingClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkHavingClause($havingClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkJoin($join)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkJoin($join)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSelectExpression($selectExpression)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSelectExpression($selectExpression)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkQuantifiedExpression($qExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkQuantifiedExpression($qExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSubselect($subselect)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSubselect($subselect)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSubselectFromClause($subselectFromClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSubselectFromClause($subselectFromClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSimpleSelectClause($simpleSelectClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSimpleSelectClause($simpleSelectClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSimpleSelectExpression($simpleSelectExpression)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSimpleSelectExpression($simpleSelectExpression)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
=======
     * @return void
>>>>>>> stage
     */
    public function walkAggregateExpression($aggExpression)
    {
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkGroupByClause($groupByClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkGroupByClause($groupByClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkGroupByItem($groupByItem)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
    }

=======
     * @return void
     */
    public function walkGroupByItem($groupByItem)
    {
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
>>>>>>> stage
    public function walkUpdateStatement(AST\UpdateStatement $AST)
    {
    }

<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     *
     * @return void
     */
>>>>>>> stage
    public function walkDeleteStatement(AST\DeleteStatement $AST)
    {
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkDeleteClause(AST\DeleteClause $deleteClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkDeleteClause(AST\DeleteClause $deleteClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkUpdateClause($updateClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkUpdateClause($updateClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkUpdateItem($updateItem)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkUpdateItem($updateItem)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkWhereClause($whereClause)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkWhereClause($whereClause)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkConditionalExpression($condExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkConditionalExpression($condExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkConditionalTerm($condTerm)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkConditionalTerm($condTerm)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkConditionalFactor($factor)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkConditionalFactor($factor)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkConditionalPrimary($primary)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkConditionalPrimary($primary)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkExistsExpression($existsExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkExistsExpression($existsExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkCollectionMemberExpression($collMemberExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkCollectionMemberExpression($collMemberExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkEmptyCollectionComparisonExpression($emptyCollCompExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkEmptyCollectionComparisonExpression($emptyCollCompExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkNullComparisonExpression($nullCompExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkNullComparisonExpression($nullCompExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkInExpression($inExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkInExpression($inExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkInstanceOfExpression($instanceOfExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkInstanceOfExpression($instanceOfExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkLiteral($literal)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkLiteral($literal)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkBetweenExpression($betweenExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkBetweenExpression($betweenExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkLikeExpression($likeExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkLikeExpression($likeExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkStateFieldPathExpression($stateFieldPathExpression)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkStateFieldPathExpression($stateFieldPathExpression)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkComparisonExpression($compExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkComparisonExpression($compExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkInputParameter($inputParam)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkInputParameter($inputParam)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkArithmeticExpression($arithmeticExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkArithmeticExpression($arithmeticExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkArithmeticTerm($term)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkArithmeticTerm($term)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkStringPrimary($stringPrimary)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkStringPrimary($stringPrimary)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkArithmeticFactor($factor)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkArithmeticFactor($factor)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkSimpleArithmeticExpression($simpleArithmeticExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkSimpleArithmeticExpression($simpleArithmeticExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkPathExpression($pathExpr)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkPathExpression($pathExpr)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkResultVariable($resultVariable)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );
=======
     * @return void
     */
    public function walkResultVariable($resultVariable)
    {
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function getExecutor($AST)
    {
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/pull/9551',
            'Method "%s" is deprecated and will be removed in ORM 3.0 without replacement.',
            __METHOD__
        );

        return null;
    }

    final protected function getMetadataForDqlAlias(string $dqlAlias): ClassMetadata
    {
        $metadata = $this->_getQueryComponents()[$dqlAlias]['metadata'] ?? null;

        if ($metadata === null) {
            throw new LogicException(sprintf('No metadata for DQL alias: %s', $dqlAlias));
        }

        return $metadata;
=======
     * @return void
     */
    public function getExecutor($AST)
    {
>>>>>>> stage
    }
}
