<?php

declare(strict_types=1);

namespace Doctrine\ORM\Query;

<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
=======
>>>>>>> stage
use Doctrine\ORM\AbstractQuery;
use Generator;

use function array_diff;
use function array_keys;

/**
 * Represents a chain of tree walkers that modify an AST and finally emit output.
 * Only the last walker in the chain can emit output. Any previous walkers can modify
 * the AST to influence the final output produced by the last walker.
 *
 * @psalm-import-type QueryComponent from Parser
 */
class TreeWalkerChain implements TreeWalker
{
    /**
     * The tree walkers.
     *
     * @var string[]
     * @psalm-var list<class-string<TreeWalker>>
     */
    private $walkers = [];

    /** @var AbstractQuery */
    private $query;

    /** @var ParserResult */
    private $parserResult;

    /**
     * The query components of the original query (the "symbol table") that was produced by the Parser.
     *
     * @var array<string, array<string, mixed>>
     * @psalm-var array<string, QueryComponent>
     */
    private $queryComponents;

    /**
     * Returns the internal queryComponents array.
     *
     * {@inheritDoc}
     */
    public function getQueryComponents()
    {
        return $this->queryComponents;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function setQueryComponent($dqlAlias, array $queryComponent)
    {
        $requiredKeys = ['metadata', 'parent', 'relation', 'map', 'nestingLevel', 'token'];

        if (array_diff($requiredKeys, array_keys($queryComponent))) {
            throw QueryException::invalidQueryComponent($dqlAlias);
        }

        $this->queryComponents[$dqlAlias] = $queryComponent;
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($query, $parserResult, array $queryComponents)
    {
        $this->query           = $query;
        $this->parserResult    = $parserResult;
        $this->queryComponents = $queryComponents;
    }

    /**
     * Adds a tree walker to the chain.
     *
     * @param string $walkerClass The class of the walker to instantiate.
     * @psalm-param class-string<TreeWalker> $walkerClass
     *
     * @return void
     */
    public function addTreeWalker($walkerClass)
    {
        $this->walkers[] = $walkerClass;
    }

<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     *
     * @return void
     */
>>>>>>> stage
    public function walkSelectStatement(AST\SelectStatement $AST)
    {
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSelectStatement($AST);

            $this->queryComponents = $walker->getQueryComponents();
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSelectClause($selectClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkFromClause($fromClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkFunction($function);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkOrderByClause($orderByClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkOrderByItem($orderByItem);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkHavingClause($havingClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkJoin($join);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSelectExpression($selectExpression);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkQuantifiedExpression($qExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSubselect($subselect);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSubselectFromClause($subselectFromClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSimpleSelectClause($simpleSelectClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSimpleSelectExpression($simpleSelectExpression);
        }
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkAggregateExpression($aggExpression)
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
    public function walkAggregateExpression($aggExpression)
    {
>>>>>>> stage
        foreach ($this->getWalkers() as $walker) {
            $walker->walkAggregateExpression($aggExpression);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkGroupByClause($groupByClause);
        }
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

=======
     * @return void
     */
    public function walkGroupByItem($groupByItem)
    {
>>>>>>> stage
        foreach ($this->getWalkers() as $walker) {
            $walker->walkGroupByItem($groupByItem);
        }
    }

<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     *
     * @return void
     */
>>>>>>> stage
    public function walkUpdateStatement(AST\UpdateStatement $AST)
    {
        foreach ($this->getWalkers() as $walker) {
            $walker->walkUpdateStatement($AST);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkDeleteStatement($AST);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkDeleteClause($deleteClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkUpdateClause($updateClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkUpdateItem($updateItem);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkWhereClause($whereClause);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkConditionalExpression($condExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkConditionalTerm($condTerm);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkConditionalFactor($factor);
        }
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @deprecated This method will be removed in 3.0.
     */
    public function walkConditionalPrimary($condPrimary)
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
    public function walkConditionalPrimary($condPrimary)
    {
>>>>>>> stage
        foreach ($this->getWalkers() as $walker) {
            $walker->walkConditionalPrimary($condPrimary);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkExistsExpression($existsExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkCollectionMemberExpression($collMemberExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkEmptyCollectionComparisonExpression($emptyCollCompExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkNullComparisonExpression($nullCompExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkInExpression($inExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkInstanceOfExpression($instanceOfExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkLiteral($literal);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkBetweenExpression($betweenExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkLikeExpression($likeExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkStateFieldPathExpression($stateFieldPathExpression);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkComparisonExpression($compExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkInputParameter($inputParam);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkArithmeticExpression($arithmeticExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkArithmeticTerm($term);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkStringPrimary($stringPrimary);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkArithmeticFactor($factor);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkSimpleArithmeticExpression($simpleArithmeticExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkPathExpression($pathExpr);
        }
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
        foreach ($this->getWalkers() as $walker) {
            $walker->walkResultVariable($resultVariable);
        }
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
=======
     * @return void
     */
    public function getExecutor($AST)
    {
>>>>>>> stage
    }

    /**
     * @psalm-return Generator<int, TreeWalker>
     */
    private function getWalkers(): Generator
    {
        foreach ($this->walkers as $walkerClass) {
            yield new $walkerClass($this->query, $this->parserResult, $this->queryComponents);
        }
    }
}
