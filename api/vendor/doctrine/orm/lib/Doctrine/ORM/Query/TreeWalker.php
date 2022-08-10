<?php

declare(strict_types=1);

namespace Doctrine\ORM\Query;

use Doctrine\ORM\AbstractQuery;

/**
 * Interface for walkers of DQL ASTs (abstract syntax trees).
 *
 * @psalm-import-type QueryComponent from Parser
 */
interface TreeWalker
{
    /**
     * Initializes TreeWalker with important information about the ASTs to be walked.
     *
     * @param AbstractQuery $query           The parsed Query.
     * @param ParserResult  $parserResult    The result of the parsing process.
     * @param mixed[]       $queryComponents The query components (symbol table).
     * @psalm-param array<string, QueryComponent> $queryComponents The query components (symbol table).
     */
    public function __construct($query, $parserResult, array $queryComponents);

    /**
     * Returns internal queryComponents array.
     *
     * @return array<string, array<string, mixed>>
     * @psalm-return array<string, QueryComponent>
     */
    public function getQueryComponents();

    /**
     * Sets or overrides a query component for a given dql alias.
     *
<<<<<<< HEAD
     * @deprecated This method will be removed from the interface in 3.0.
     *
=======
>>>>>>> stage
     * @param string               $dqlAlias       The DQL alias.
     * @param array<string, mixed> $queryComponent
     * @psalm-param QueryComponent $queryComponent
     *
     * @return void
     */
    public function setQueryComponent($dqlAlias, array $queryComponent);

    /**
<<<<<<< HEAD
     * Walks down a SelectStatement AST node.
     *
     * @return void
=======
     * Walks down a SelectStatement AST node, thereby generating the appropriate SQL.
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSelectStatement(AST\SelectStatement $AST);

    /**
<<<<<<< HEAD
     * Walks down a SelectClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SelectClause $selectClause
     *
     * @return void
=======
     * Walks down a SelectClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\SelectClause $selectClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSelectClause($selectClause);

    /**
<<<<<<< HEAD
     * Walks down a FromClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\FromClause $fromClause
     *
     * @return void
=======
     * Walks down a FromClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\FromClause $fromClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkFromClause($fromClause);

    /**
<<<<<<< HEAD
     * Walks down a FunctionNode AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\Functions\FunctionNode $function
     *
     * @return void
=======
     * Walks down a FunctionNode AST node, thereby generating the appropriate SQL.
     *
     * @param AST\Functions\FunctionNode $function
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkFunction($function);

    /**
<<<<<<< HEAD
     * Walks down an OrderByClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\OrderByClause $orderByClause
     *
     * @return void
=======
     * Walks down an OrderByClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\OrderByClause $orderByClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkOrderByClause($orderByClause);

    /**
     * Walks down an OrderByItem AST node, thereby generating the appropriate SQL.
     *
<<<<<<< HEAD
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\OrderByItem $orderByItem
     *
     * @return void
=======
     * @param AST\OrderByItem $orderByItem
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkOrderByItem($orderByItem);

    /**
<<<<<<< HEAD
     * Walks down a HavingClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\HavingClause $havingClause
     *
     * @return void
=======
     * Walks down a HavingClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\HavingClause $havingClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkHavingClause($havingClause);

    /**
<<<<<<< HEAD
     * Walks down a Join AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\Join $join
     *
     * @return void
=======
     * Walks down a Join AST node and creates the corresponding SQL.
     *
     * @param AST\Join $join
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkJoin($join);

    /**
<<<<<<< HEAD
     * Walks down a SelectExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SelectExpression $selectExpression
     *
     * @return void
=======
     * Walks down a SelectExpression AST node and generates the corresponding SQL.
     *
     * @param AST\SelectExpression $selectExpression
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSelectExpression($selectExpression);

    /**
<<<<<<< HEAD
     * Walks down a QuantifiedExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\QuantifiedExpression $qExpr
     *
     * @return void
=======
     * Walks down a QuantifiedExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\QuantifiedExpression $qExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkQuantifiedExpression($qExpr);

    /**
<<<<<<< HEAD
     * Walks down a Subselect AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\Subselect $subselect
     *
     * @return void
=======
     * Walks down a Subselect AST node, thereby generating the appropriate SQL.
     *
     * @param AST\Subselect $subselect
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSubselect($subselect);

    /**
<<<<<<< HEAD
     * Walks down a SubselectFromClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SubselectFromClause $subselectFromClause
     *
     * @return void
=======
     * Walks down a SubselectFromClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\SubselectFromClause $subselectFromClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSubselectFromClause($subselectFromClause);

    /**
<<<<<<< HEAD
     * Walks down a SimpleSelectClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SimpleSelectClause $simpleSelectClause
     *
     * @return void
=======
     * Walks down a SimpleSelectClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\SimpleSelectClause $simpleSelectClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSimpleSelectClause($simpleSelectClause);

    /**
<<<<<<< HEAD
     * Walks down a SimpleSelectExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SimpleSelectExpression $simpleSelectExpression
     *
     * @return void
=======
     * Walks down a SimpleSelectExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\SimpleSelectExpression $simpleSelectExpression
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSimpleSelectExpression($simpleSelectExpression);

    /**
<<<<<<< HEAD
     * Walks down an AggregateExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\AggregateExpression $aggExpression
     *
     * @return void
=======
     * Walks down an AggregateExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\AggregateExpression $aggExpression
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkAggregateExpression($aggExpression);

    /**
<<<<<<< HEAD
     * Walks down a GroupByClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\GroupByClause $groupByClause
     *
     * @return void
=======
     * Walks down a GroupByClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\GroupByClause $groupByClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkGroupByClause($groupByClause);

    /**
<<<<<<< HEAD
     * Walks down a GroupByItem AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\PathExpression|string $groupByItem
     *
     * @return void
=======
     * Walks down a GroupByItem AST node, thereby generating the appropriate SQL.
     *
     * @param AST\PathExpression|string $groupByItem
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkGroupByItem($groupByItem);

    /**
<<<<<<< HEAD
     * Walks down an UpdateStatement AST node.
     *
     * @return void
=======
     * Walks down an UpdateStatement AST node, thereby generating the appropriate SQL.
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkUpdateStatement(AST\UpdateStatement $AST);

    /**
<<<<<<< HEAD
     * Walks down a DeleteStatement AST node.
     *
     * @return void
=======
     * Walks down a DeleteStatement AST node, thereby generating the appropriate SQL.
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkDeleteStatement(AST\DeleteStatement $AST);

    /**
<<<<<<< HEAD
     * Walks down a DeleteClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @return void
=======
     * Walks down a DeleteClause AST node, thereby generating the appropriate SQL.
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkDeleteClause(AST\DeleteClause $deleteClause);

    /**
<<<<<<< HEAD
     * Walks down an UpdateClause AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\UpdateClause $updateClause
     *
     * @return void
=======
     * Walks down an UpdateClause AST node, thereby generating the appropriate SQL.
     *
     * @param AST\UpdateClause $updateClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkUpdateClause($updateClause);

    /**
<<<<<<< HEAD
     * Walks down an UpdateItem AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\UpdateItem $updateItem
     *
     * @return void
=======
     * Walks down an UpdateItem AST node, thereby generating the appropriate SQL.
     *
     * @param AST\UpdateItem $updateItem
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkUpdateItem($updateItem);

    /**
<<<<<<< HEAD
     * Walks down a WhereClause AST node.
     *
     * WhereClause or not, the appropriate discriminator sql is added.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\WhereClause $whereClause
     *
     * @return void
=======
     * Walks down a WhereClause AST node, thereby generating the appropriate SQL.
     * WhereClause or not, the appropriate discriminator sql is added.
     *
     * @param AST\WhereClause $whereClause
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkWhereClause($whereClause);

    /**
<<<<<<< HEAD
     * Walk down a ConditionalExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ConditionalExpression $condExpr
     *
     * @return void
=======
     * Walk down a ConditionalExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ConditionalExpression $condExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkConditionalExpression($condExpr);

    /**
<<<<<<< HEAD
     * Walks down a ConditionalTerm AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ConditionalTerm $condTerm
     *
     * @return void
=======
     * Walks down a ConditionalTerm AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ConditionalTerm $condTerm
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkConditionalTerm($condTerm);

    /**
<<<<<<< HEAD
     * Walks down a ConditionalFactor AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ConditionalFactor $factor
     *
     * @return void
=======
     * Walks down a ConditionalFactor AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ConditionalFactor $factor
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkConditionalFactor($factor);

    /**
<<<<<<< HEAD
     * Walks down a ConditionalPrimary AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ConditionalPrimary $primary
     *
     * @return void
=======
     * Walks down a ConditionalPrimary AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ConditionalPrimary $primary
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkConditionalPrimary($primary);

    /**
<<<<<<< HEAD
     * Walks down an ExistsExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ExistsExpression $existsExpr
     *
     * @return void
=======
     * Walks down an ExistsExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ExistsExpression $existsExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkExistsExpression($existsExpr);

    /**
<<<<<<< HEAD
     * Walks down a CollectionMemberExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\CollectionMemberExpression $collMemberExpr
     *
     * @return void
=======
     * Walks down a CollectionMemberExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\CollectionMemberExpression $collMemberExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkCollectionMemberExpression($collMemberExpr);

    /**
<<<<<<< HEAD
     * Walks down an EmptyCollectionComparisonExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\EmptyCollectionComparisonExpression $emptyCollCompExpr
     *
     * @return void
=======
     * Walks down an EmptyCollectionComparisonExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\EmptyCollectionComparisonExpression $emptyCollCompExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkEmptyCollectionComparisonExpression($emptyCollCompExpr);

    /**
<<<<<<< HEAD
     * Walks down a NullComparisonExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\NullComparisonExpression $nullCompExpr
     *
     * @return void
=======
     * Walks down a NullComparisonExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\NullComparisonExpression $nullCompExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkNullComparisonExpression($nullCompExpr);

    /**
<<<<<<< HEAD
     * Walks down an InExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\InExpression $inExpr
     *
     * @return void
=======
     * Walks down an InExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\InExpression $inExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkInExpression($inExpr);

    /**
<<<<<<< HEAD
     * Walks down an InstanceOfExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\InstanceOfExpression $instanceOfExpr
     *
     * @return void
=======
     * Walks down an InstanceOfExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\InstanceOfExpression $instanceOfExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkInstanceOfExpression($instanceOfExpr);

    /**
<<<<<<< HEAD
     * Walks down a literal that represents an AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\Literal $literal
     *
     * @return void
=======
     * Walks down a literal that represents an AST node, thereby generating the appropriate SQL.
     *
     * @param AST\Literal $literal
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkLiteral($literal);

    /**
<<<<<<< HEAD
     * Walks down a BetweenExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\BetweenExpression $betweenExpr
     *
     * @return void
=======
     * Walks down a BetweenExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\BetweenExpression $betweenExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkBetweenExpression($betweenExpr);

    /**
<<<<<<< HEAD
     * Walks down a LikeExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\LikeExpression $likeExpr
     *
     * @return void
=======
     * Walks down a LikeExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\LikeExpression $likeExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkLikeExpression($likeExpr);

    /**
<<<<<<< HEAD
     * Walks down a StateFieldPathExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\PathExpression $stateFieldPathExpression
     *
     * @return void
=======
     * Walks down a StateFieldPathExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\PathExpression $stateFieldPathExpression
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkStateFieldPathExpression($stateFieldPathExpression);

    /**
<<<<<<< HEAD
     * Walks down a ComparisonExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ComparisonExpression $compExpr
     *
     * @return void
=======
     * Walks down a ComparisonExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ComparisonExpression $compExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkComparisonExpression($compExpr);

    /**
<<<<<<< HEAD
     * Walks down an InputParameter AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\InputParameter $inputParam
     *
     * @return void
=======
     * Walks down an InputParameter AST node, thereby generating the appropriate SQL.
     *
     * @param AST\InputParameter $inputParam
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkInputParameter($inputParam);

    /**
<<<<<<< HEAD
     * Walks down an ArithmeticExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\ArithmeticExpression $arithmeticExpr
     *
     * @return void
=======
     * Walks down an ArithmeticExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\ArithmeticExpression $arithmeticExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkArithmeticExpression($arithmeticExpr);

    /**
<<<<<<< HEAD
     * Walks down an ArithmeticTerm AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param mixed $term
     *
     * @return void
=======
     * Walks down an ArithmeticTerm AST node, thereby generating the appropriate SQL.
     *
     * @param mixed $term
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkArithmeticTerm($term);

    /**
<<<<<<< HEAD
     * Walks down a StringPrimary that represents an AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param mixed $stringPrimary
     *
     * @return void
=======
     * Walks down a StringPrimary that represents an AST node, thereby generating the appropriate SQL.
     *
     * @param mixed $stringPrimary
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkStringPrimary($stringPrimary);

    /**
<<<<<<< HEAD
     * Walks down an ArithmeticFactor that represents an AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param mixed $factor
     *
     * @return void
=======
     * Walks down an ArithmeticFactor that represents an AST node, thereby generating the appropriate SQL.
     *
     * @param mixed $factor
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkArithmeticFactor($factor);

    /**
<<<<<<< HEAD
     * Walks down an SimpleArithmeticExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\SimpleArithmeticExpression $simpleArithmeticExpr
     *
     * @return void
=======
     * Walks down an SimpleArithmeticExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\SimpleArithmeticExpression $simpleArithmeticExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkSimpleArithmeticExpression($simpleArithmeticExpr);

    /**
<<<<<<< HEAD
     * Walks down a PathExpression AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param AST\PathExpression $pathExpr
     *
     * @return void
=======
     * Walks down a PathExpression AST node, thereby generating the appropriate SQL.
     *
     * @param AST\PathExpression $pathExpr
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkPathExpression($pathExpr);

    /**
<<<<<<< HEAD
     * Walks down a ResultVariable that represents an AST node.
     *
     * @deprecated This method will be removed from the interface in 3.0.
     *
     * @param string $resultVariable
     *
     * @return void
=======
     * Walks down a ResultVariable that represents an AST node, thereby generating the appropriate SQL.
     *
     * @param string $resultVariable
     *
     * @return string The SQL.
>>>>>>> stage
     */
    public function walkResultVariable($resultVariable);

    /**
     * Gets an executor that can be used to execute the result of this walker.
     *
<<<<<<< HEAD
     * @deprecated This method will be removed from the interface in 3.0.
     *
=======
>>>>>>> stage
     * @param AST\DeleteStatement|AST\UpdateStatement|AST\SelectStatement $AST
     *
     * @return Exec\AbstractSqlExecutor
     */
    public function getExecutor($AST);
}
