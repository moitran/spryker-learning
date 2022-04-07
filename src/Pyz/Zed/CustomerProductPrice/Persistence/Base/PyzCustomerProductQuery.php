<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct as ChildPyzCustomerProduct;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery as ChildPyzCustomerProductQuery;
use Pyz\Zed\CustomerProductPrice\Persistence\Map\PyzCustomerProductTableMap;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria as SprykerCriteria;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * Base class that represents a query for the 'pyz_customer_product' table.
 *
 *
 *
 * @method     ChildPyzCustomerProductQuery orderByIdCustomerProduct($order = Criteria::ASC) Order by the id_customer_product column
 * @method     ChildPyzCustomerProductQuery orderByCustomerNumber($order = Criteria::ASC) Order by the customer_number column
 * @method     ChildPyzCustomerProductQuery orderByItemNumber($order = Criteria::ASC) Order by the item_number column
 *
 * @method     ChildPyzCustomerProductQuery groupByIdCustomerProduct() Group by the id_customer_product column
 * @method     ChildPyzCustomerProductQuery groupByCustomerNumber() Group by the customer_number column
 * @method     ChildPyzCustomerProductQuery groupByItemNumber() Group by the item_number column
 *
 * @method     ChildPyzCustomerProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPyzCustomerProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPyzCustomerProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPyzCustomerProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPyzCustomerProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPyzCustomerProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPyzCustomerProductQuery leftJoinPyzCustomerProductPrice($relationAlias = null) Adds a LEFT JOIN clause to the query using the PyzCustomerProductPrice relation
 * @method     ChildPyzCustomerProductQuery rightJoinPyzCustomerProductPrice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PyzCustomerProductPrice relation
 * @method     ChildPyzCustomerProductQuery innerJoinPyzCustomerProductPrice($relationAlias = null) Adds a INNER JOIN clause to the query using the PyzCustomerProductPrice relation
 *
 * @method     ChildPyzCustomerProductQuery joinWithPyzCustomerProductPrice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PyzCustomerProductPrice relation
 *
 * @method     ChildPyzCustomerProductQuery leftJoinWithPyzCustomerProductPrice() Adds a LEFT JOIN clause and with to the query using the PyzCustomerProductPrice relation
 * @method     ChildPyzCustomerProductQuery rightJoinWithPyzCustomerProductPrice() Adds a RIGHT JOIN clause and with to the query using the PyzCustomerProductPrice relation
 * @method     ChildPyzCustomerProductQuery innerJoinWithPyzCustomerProductPrice() Adds a INNER JOIN clause and with to the query using the PyzCustomerProductPrice relation
 *
 * @method     \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPyzCustomerProduct|null findOne(ConnectionInterface $con = null) Return the first ChildPyzCustomerProduct matching the query
 * @method     ChildPyzCustomerProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPyzCustomerProduct matching the query, or a new ChildPyzCustomerProduct object populated from the query conditions when no match is found
 *
 * @method     ChildPyzCustomerProduct|null findOneByIdCustomerProduct(int $id_customer_product) Return the first ChildPyzCustomerProduct filtered by the id_customer_product column
 * @method     ChildPyzCustomerProduct|null findOneByCustomerNumber(string $customer_number) Return the first ChildPyzCustomerProduct filtered by the customer_number column
 * @method     ChildPyzCustomerProduct|null findOneByItemNumber(string $item_number) Return the first ChildPyzCustomerProduct filtered by the item_number column *

 * @method     ChildPyzCustomerProduct requirePk($key, ConnectionInterface $con = null) Return the ChildPyzCustomerProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProduct requireOne(ConnectionInterface $con = null) Return the first ChildPyzCustomerProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPyzCustomerProduct requireOneByIdCustomerProduct(int $id_customer_product) Return the first ChildPyzCustomerProduct filtered by the id_customer_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProduct requireOneByCustomerNumber(string $customer_number) Return the first ChildPyzCustomerProduct filtered by the customer_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProduct requireOneByItemNumber(string $item_number) Return the first ChildPyzCustomerProduct filtered by the item_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPyzCustomerProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPyzCustomerProduct objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProduct> find(ConnectionInterface $con = null) Return ChildPyzCustomerProduct objects based on current ModelCriteria
 * @method     ChildPyzCustomerProduct[]|ObjectCollection findByIdCustomerProduct(int $id_customer_product) Return ChildPyzCustomerProduct objects filtered by the id_customer_product column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProduct> findByIdCustomerProduct(int $id_customer_product) Return ChildPyzCustomerProduct objects filtered by the id_customer_product column
 * @method     ChildPyzCustomerProduct[]|ObjectCollection findByCustomerNumber(string $customer_number) Return ChildPyzCustomerProduct objects filtered by the customer_number column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProduct> findByCustomerNumber(string $customer_number) Return ChildPyzCustomerProduct objects filtered by the customer_number column
 * @method     ChildPyzCustomerProduct[]|ObjectCollection findByItemNumber(string $item_number) Return ChildPyzCustomerProduct objects filtered by the item_number column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProduct> findByItemNumber(string $item_number) Return ChildPyzCustomerProduct objects filtered by the item_number column
 * @method     ChildPyzCustomerProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPyzCustomerProduct> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PyzCustomerProductQuery extends ModelCriteria
{

    /**
     * @var bool
     */
    protected $isForUpdateEnabled = false;

    /**
     * @param bool $isForUpdateEnabled
     *
     * @return $this The primary criteria object
     */
    public function forUpdate($isForUpdateEnabled)
    {
        $this->isForUpdateEnabled = $isForUpdateEnabled;

        return $this;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function createSelectSql(&$params)
    {
        $sql = parent::createSelectSql($params);
        if ($this->isForUpdateEnabled) {
            $sql .= ' FOR UPDATE';
        }

        return $sql;
    }

    /**
     * Clear the conditions to allow the reuse of the query object.
     * The ModelCriteria's Model and alias 'all the properties set by construct) will remain.
     *
     * @return $this The primary criteria object
     */
    public function clear()
    {
        parent::clear();

        $this->forUpdate(false);

        return $this;
    }

    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Pyz\Zed\CustomerProductPrice\Persistence\Base\PyzCustomerProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Pyz\\Zed\\CustomerProductPrice\\Persistence\\PyzCustomerProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPyzCustomerProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPyzCustomerProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPyzCustomerProductQuery) {
            return $criteria;
        }
        $query = new ChildPyzCustomerProductQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPyzCustomerProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PyzCustomerProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PyzCustomerProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPyzCustomerProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_customer_product, customer_number, item_number FROM pyz_customer_product WHERE id_customer_product = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPyzCustomerProduct $obj */
            $obj = new ChildPyzCustomerProduct();
            $obj->hydrate($row);
            PyzCustomerProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPyzCustomerProduct|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPyzCustomerProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPyzCustomerProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $idCustomerProduct Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdCustomerProduct_Between(array $idCustomerProduct)
    {
        return $this->filterByIdCustomerProduct($idCustomerProduct, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $idCustomerProducts Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdCustomerProduct_In(array $idCustomerProducts)
    {
        return $this->filterByIdCustomerProduct($idCustomerProducts, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomerProduct(1234); // WHERE id_customer_product = 1234
     * $query->filterByIdCustomerProduct(array(12, 34), Criteria::IN); // WHERE id_customer_product IN (12, 34)
     * $query->filterByIdCustomerProduct(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE id_customer_product > 12
     * </code>
     *
     * @param     mixed $idCustomerProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByIdCustomerProduct($idCustomerProduct = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($idCustomerProduct)) {
            $useMinMax = false;
            if (isset($idCustomerProduct['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $idCustomerProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomerProduct['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $idCustomerProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$idCustomerProduct of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $idCustomerProduct, $comparison);

        return $query;
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $customerNumbers Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomerNumber_In(array $customerNumbers)
    {
        return $this->filterByCustomerNumber($customerNumbers, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::LIKE filtering criteria for the column.
     *
     * @param string $customerNumber Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomerNumber_Like($customerNumber)
    {
        return $this->filterByCustomerNumber($customerNumber, Criteria::LIKE);
    }

    /**
     * Filter the query on the customer_number column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerNumber('fooValue');   // WHERE customer_number = 'fooValue'
     * $query->filterByCustomerNumber('%fooValue%', Criteria::LIKE); // WHERE customer_number LIKE '%fooValue%'
     * $query->filterByCustomerNumber([1, 'foo'], Criteria::IN); // WHERE customer_number IN (1, 'foo')
     * </code>
     *
     * @param     string|string[] $customerNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE). Add Criteria::LIKE explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByCustomerNumber($customerNumber = null, $comparison = Criteria::EQUAL)
    {
        if ($comparison == Criteria::LIKE || $comparison == Criteria::ILIKE) {
            $customerNumber = str_replace('*', '%', $customerNumber);
        }

        if (is_array($customerNumber) && !in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
            throw new AmbiguousComparisonException('$customerNumber of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
        }

        $query = $this->addUsingAlias(PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER, $customerNumber, $comparison);

        return $query;
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $itemNumbers Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemNumber_In(array $itemNumbers)
    {
        return $this->filterByItemNumber($itemNumbers, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::LIKE filtering criteria for the column.
     *
     * @param string $itemNumber Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemNumber_Like($itemNumber)
    {
        return $this->filterByItemNumber($itemNumber, Criteria::LIKE);
    }

    /**
     * Filter the query on the item_number column
     *
     * Example usage:
     * <code>
     * $query->filterByItemNumber('fooValue');   // WHERE item_number = 'fooValue'
     * $query->filterByItemNumber('%fooValue%', Criteria::LIKE); // WHERE item_number LIKE '%fooValue%'
     * $query->filterByItemNumber([1, 'foo'], Criteria::IN); // WHERE item_number IN (1, 'foo')
     * </code>
     *
     * @param     string|string[] $itemNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE). Add Criteria::LIKE explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByItemNumber($itemNumber = null, $comparison = Criteria::EQUAL)
    {
        if ($comparison == Criteria::LIKE || $comparison == Criteria::ILIKE) {
            $itemNumber = str_replace('*', '%', $itemNumber);
        }

        if (is_array($itemNumber) && !in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
            throw new AmbiguousComparisonException('$itemNumber of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
        }

        $query = $this->addUsingAlias(PyzCustomerProductTableMap::COL_ITEM_NUMBER, $itemNumber, $comparison);

        return $query;
    }

    /**
     * Filter the query by a related \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice object
     *
     * @param \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice|ObjectCollection $pyzCustomerProductPrice the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPyzCustomerProductQuery The current query, for fluid interface
     */
    public function filterByPyzCustomerProductPrice($pyzCustomerProductPrice, $comparison = null)
    {
        if ($pyzCustomerProductPrice instanceof \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice) {
            return $this
                ->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $pyzCustomerProductPrice->getFkCustomerProduct(), $comparison);
        } elseif ($pyzCustomerProductPrice instanceof ObjectCollection) {
            return $this
                ->usePyzCustomerProductPriceQuery()
                ->filterByPrimaryKeys($pyzCustomerProductPrice->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPyzCustomerProductPrice() only accepts arguments of type \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PyzCustomerProductPrice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPyzCustomerProductQuery The current query, for fluid interface
     */
    public function joinPyzCustomerProductPrice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PyzCustomerProductPrice');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PyzCustomerProductPrice');
        }

        return $this;
    }

    /**
     * Use the PyzCustomerProductPrice relation PyzCustomerProductPrice object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery A secondary query class using the current class as primary query
     */
    public function usePyzCustomerProductPriceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPyzCustomerProductPrice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PyzCustomerProductPrice', '\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery');
    }

    /**
     * Use the PyzCustomerProductPrice relation PyzCustomerProductPrice object
     *
     * @param callable(\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery):\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPyzCustomerProductPriceQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePyzCustomerProductPriceQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PyzCustomerProductPrice table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery The inner query object of the EXISTS statement
     */
    public function usePyzCustomerProductPriceExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PyzCustomerProductPrice', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PyzCustomerProductPrice table for a NOT EXISTS query.
     *
     * @see usePyzCustomerProductPriceExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery The inner query object of the NOT EXISTS statement
     */
    public function usePyzCustomerProductPriceNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PyzCustomerProductPrice', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildPyzCustomerProduct $pyzCustomerProduct Object to remove from the list of results
     *
     * @return $this|ChildPyzCustomerProductQuery The current query, for fluid interface
     */
    public function prune($pyzCustomerProduct = null)
    {
        if ($pyzCustomerProduct) {
            $this->addUsingAlias(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, $pyzCustomerProduct->getIdCustomerProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pyz_customer_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PyzCustomerProductTableMap::clearInstancePool();
            PyzCustomerProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PyzCustomerProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PyzCustomerProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PyzCustomerProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PyzCustomerProductQuery
