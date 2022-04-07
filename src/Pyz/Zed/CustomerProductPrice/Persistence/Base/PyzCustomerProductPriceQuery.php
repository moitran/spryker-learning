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
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice as ChildPyzCustomerProductPrice;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery as ChildPyzCustomerProductPriceQuery;
use Pyz\Zed\CustomerProductPrice\Persistence\Map\PyzCustomerProductPriceTableMap;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria as SprykerCriteria;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * Base class that represents a query for the 'pyz_customer_product_price' table.
 *
 *
 *
 * @method     ChildPyzCustomerProductPriceQuery orderByIdCustomerProductPrice($order = Criteria::ASC) Order by the id_customer_product_price column
 * @method     ChildPyzCustomerProductPriceQuery orderByFkCustomerProduct($order = Criteria::ASC) Order by the fk_customer_product column
 * @method     ChildPyzCustomerProductPriceQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildPyzCustomerProductPriceQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildPyzCustomerProductPriceQuery groupByIdCustomerProductPrice() Group by the id_customer_product_price column
 * @method     ChildPyzCustomerProductPriceQuery groupByFkCustomerProduct() Group by the fk_customer_product column
 * @method     ChildPyzCustomerProductPriceQuery groupByQuantity() Group by the quantity column
 * @method     ChildPyzCustomerProductPriceQuery groupByValue() Group by the value column
 *
 * @method     ChildPyzCustomerProductPriceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPyzCustomerProductPriceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPyzCustomerProductPriceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPyzCustomerProductPriceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPyzCustomerProductPriceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPyzCustomerProductPriceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPyzCustomerProductPriceQuery leftJoinPyzCustomerProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PyzCustomerProduct relation
 * @method     ChildPyzCustomerProductPriceQuery rightJoinPyzCustomerProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PyzCustomerProduct relation
 * @method     ChildPyzCustomerProductPriceQuery innerJoinPyzCustomerProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PyzCustomerProduct relation
 *
 * @method     ChildPyzCustomerProductPriceQuery joinWithPyzCustomerProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PyzCustomerProduct relation
 *
 * @method     ChildPyzCustomerProductPriceQuery leftJoinWithPyzCustomerProduct() Adds a LEFT JOIN clause and with to the query using the PyzCustomerProduct relation
 * @method     ChildPyzCustomerProductPriceQuery rightJoinWithPyzCustomerProduct() Adds a RIGHT JOIN clause and with to the query using the PyzCustomerProduct relation
 * @method     ChildPyzCustomerProductPriceQuery innerJoinWithPyzCustomerProduct() Adds a INNER JOIN clause and with to the query using the PyzCustomerProduct relation
 *
 * @method     \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPyzCustomerProductPrice|null findOne(ConnectionInterface $con = null) Return the first ChildPyzCustomerProductPrice matching the query
 * @method     ChildPyzCustomerProductPrice findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPyzCustomerProductPrice matching the query, or a new ChildPyzCustomerProductPrice object populated from the query conditions when no match is found
 *
 * @method     ChildPyzCustomerProductPrice|null findOneByIdCustomerProductPrice(int $id_customer_product_price) Return the first ChildPyzCustomerProductPrice filtered by the id_customer_product_price column
 * @method     ChildPyzCustomerProductPrice|null findOneByFkCustomerProduct(int $fk_customer_product) Return the first ChildPyzCustomerProductPrice filtered by the fk_customer_product column
 * @method     ChildPyzCustomerProductPrice|null findOneByQuantity(int $quantity) Return the first ChildPyzCustomerProductPrice filtered by the quantity column
 * @method     ChildPyzCustomerProductPrice|null findOneByValue(string $value) Return the first ChildPyzCustomerProductPrice filtered by the value column *

 * @method     ChildPyzCustomerProductPrice requirePk($key, ConnectionInterface $con = null) Return the ChildPyzCustomerProductPrice by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProductPrice requireOne(ConnectionInterface $con = null) Return the first ChildPyzCustomerProductPrice matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPyzCustomerProductPrice requireOneByIdCustomerProductPrice(int $id_customer_product_price) Return the first ChildPyzCustomerProductPrice filtered by the id_customer_product_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProductPrice requireOneByFkCustomerProduct(int $fk_customer_product) Return the first ChildPyzCustomerProductPrice filtered by the fk_customer_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProductPrice requireOneByQuantity(int $quantity) Return the first ChildPyzCustomerProductPrice filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPyzCustomerProductPrice requireOneByValue(string $value) Return the first ChildPyzCustomerProductPrice filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPyzCustomerProductPrice[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPyzCustomerProductPrice objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProductPrice> find(ConnectionInterface $con = null) Return ChildPyzCustomerProductPrice objects based on current ModelCriteria
 * @method     ChildPyzCustomerProductPrice[]|ObjectCollection findByIdCustomerProductPrice(int $id_customer_product_price) Return ChildPyzCustomerProductPrice objects filtered by the id_customer_product_price column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProductPrice> findByIdCustomerProductPrice(int $id_customer_product_price) Return ChildPyzCustomerProductPrice objects filtered by the id_customer_product_price column
 * @method     ChildPyzCustomerProductPrice[]|ObjectCollection findByFkCustomerProduct(int $fk_customer_product) Return ChildPyzCustomerProductPrice objects filtered by the fk_customer_product column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProductPrice> findByFkCustomerProduct(int $fk_customer_product) Return ChildPyzCustomerProductPrice objects filtered by the fk_customer_product column
 * @method     ChildPyzCustomerProductPrice[]|ObjectCollection findByQuantity(int $quantity) Return ChildPyzCustomerProductPrice objects filtered by the quantity column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProductPrice> findByQuantity(int $quantity) Return ChildPyzCustomerProductPrice objects filtered by the quantity column
 * @method     ChildPyzCustomerProductPrice[]|ObjectCollection findByValue(string $value) Return ChildPyzCustomerProductPrice objects filtered by the value column
 * @psalm-method ObjectCollection&\Traversable<ChildPyzCustomerProductPrice> findByValue(string $value) Return ChildPyzCustomerProductPrice objects filtered by the value column
 * @method     ChildPyzCustomerProductPrice[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPyzCustomerProductPrice> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PyzCustomerProductPriceQuery extends ModelCriteria
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
     * Initializes internal state of \Pyz\Zed\CustomerProductPrice\Persistence\Base\PyzCustomerProductPriceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Pyz\\Zed\\CustomerProductPrice\\Persistence\\PyzCustomerProductPrice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPyzCustomerProductPriceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPyzCustomerProductPriceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPyzCustomerProductPriceQuery) {
            return $criteria;
        }
        $query = new ChildPyzCustomerProductPriceQuery();
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
     * @return ChildPyzCustomerProductPrice|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PyzCustomerProductPriceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PyzCustomerProductPriceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPyzCustomerProductPrice A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_customer_product_price, fk_customer_product, quantity, value FROM pyz_customer_product_price WHERE id_customer_product_price = :p0';
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
            /** @var ChildPyzCustomerProductPrice $obj */
            $obj = new ChildPyzCustomerProductPrice();
            $obj->hydrate($row);
            PyzCustomerProductPriceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPyzCustomerProductPrice|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPyzCustomerProductPriceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPyzCustomerProductPriceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $keys, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $idCustomerProductPrice Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdCustomerProductPrice_Between(array $idCustomerProductPrice)
    {
        return $this->filterByIdCustomerProductPrice($idCustomerProductPrice, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $idCustomerProductPrices Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdCustomerProductPrice_In(array $idCustomerProductPrices)
    {
        return $this->filterByIdCustomerProductPrice($idCustomerProductPrices, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer_product_price column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomerProductPrice(1234); // WHERE id_customer_product_price = 1234
     * $query->filterByIdCustomerProductPrice(array(12, 34), Criteria::IN); // WHERE id_customer_product_price IN (12, 34)
     * $query->filterByIdCustomerProductPrice(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE id_customer_product_price > 12
     * </code>
     *
     * @param     mixed $idCustomerProductPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByIdCustomerProductPrice($idCustomerProductPrice = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($idCustomerProductPrice)) {
            $useMinMax = false;
            if (isset($idCustomerProductPrice['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $idCustomerProductPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomerProductPrice['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $idCustomerProductPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$idCustomerProductPrice of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $idCustomerProductPrice, $comparison);

        return $query;
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $fkCustomerProduct Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFkCustomerProduct_Between(array $fkCustomerProduct)
    {
        return $this->filterByFkCustomerProduct($fkCustomerProduct, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $fkCustomerProducts Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFkCustomerProduct_In(array $fkCustomerProducts)
    {
        return $this->filterByFkCustomerProduct($fkCustomerProducts, Criteria::IN);
    }

    /**
     * Filter the query on the fk_customer_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomerProduct(1234); // WHERE fk_customer_product = 1234
     * $query->filterByFkCustomerProduct(array(12, 34), Criteria::IN); // WHERE fk_customer_product IN (12, 34)
     * $query->filterByFkCustomerProduct(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE fk_customer_product > 12
     * </code>
     *
     * @see       filterByPyzCustomerProduct()
     *
     * @param     mixed $fkCustomerProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByFkCustomerProduct($fkCustomerProduct = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($fkCustomerProduct)) {
            $useMinMax = false;
            if (isset($fkCustomerProduct['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_FK_CUSTOMER_PRODUCT, $fkCustomerProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomerProduct['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_FK_CUSTOMER_PRODUCT, $fkCustomerProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$fkCustomerProduct of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_FK_CUSTOMER_PRODUCT, $fkCustomerProduct, $comparison);

        return $query;
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $quantity Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity_Between(array $quantity)
    {
        return $this->filterByQuantity($quantity, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $quantitys Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity_In(array $quantitys)
    {
        return $this->filterByQuantity($quantitys, Criteria::IN);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34), Criteria::IN); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByQuantity($quantity = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$quantity of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_QUANTITY, $quantity, $comparison);

        return $query;
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $value Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByValue_Between(array $value)
    {
        return $this->filterByValue($value, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $values Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByValue_In(array $values)
    {
        return $this->filterByValue($values, Criteria::IN);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34), Criteria::IN); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByValue($value = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$value of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_VALUE, $value, $comparison);

        return $query;
    }

    /**
     * Filter the query by a related \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct object
     *
     * @param \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct|ObjectCollection $pyzCustomerProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPyzCustomerProductPriceQuery The current query, for fluid interface
     */
    public function filterByPyzCustomerProduct($pyzCustomerProduct, $comparison = null)
    {
        if ($pyzCustomerProduct instanceof \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct) {
            return $this
                ->addUsingAlias(PyzCustomerProductPriceTableMap::COL_FK_CUSTOMER_PRODUCT, $pyzCustomerProduct->getIdCustomerProduct(), $comparison);
        } elseif ($pyzCustomerProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PyzCustomerProductPriceTableMap::COL_FK_CUSTOMER_PRODUCT, $pyzCustomerProduct->toKeyValue('PrimaryKey', 'IdCustomerProduct'), $comparison);
        } else {
            throw new PropelException('filterByPyzCustomerProduct() only accepts arguments of type \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PyzCustomerProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPyzCustomerProductPriceQuery The current query, for fluid interface
     */
    public function joinPyzCustomerProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PyzCustomerProduct');

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
            $this->addJoinObject($join, 'PyzCustomerProduct');
        }

        return $this;
    }

    /**
     * Use the PyzCustomerProduct relation PyzCustomerProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery A secondary query class using the current class as primary query
     */
    public function usePyzCustomerProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPyzCustomerProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PyzCustomerProduct', '\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery');
    }

    /**
     * Use the PyzCustomerProduct relation PyzCustomerProduct object
     *
     * @param callable(\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery):\Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPyzCustomerProductQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePyzCustomerProductQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to PyzCustomerProduct table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery The inner query object of the EXISTS statement
     */
    public function usePyzCustomerProductExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('PyzCustomerProduct', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to PyzCustomerProduct table for a NOT EXISTS query.
     *
     * @see usePyzCustomerProductExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery The inner query object of the NOT EXISTS statement
     */
    public function usePyzCustomerProductNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('PyzCustomerProduct', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildPyzCustomerProductPrice $pyzCustomerProductPrice Object to remove from the list of results
     *
     * @return $this|ChildPyzCustomerProductPriceQuery The current query, for fluid interface
     */
    public function prune($pyzCustomerProductPrice = null)
    {
        if ($pyzCustomerProductPrice) {
            $this->addUsingAlias(PyzCustomerProductPriceTableMap::COL_ID_CUSTOMER_PRODUCT_PRICE, $pyzCustomerProductPrice->getIdCustomerProductPrice(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pyz_customer_product_price table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductPriceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PyzCustomerProductPriceTableMap::clearInstancePool();
            PyzCustomerProductPriceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductPriceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PyzCustomerProductPriceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PyzCustomerProductPriceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PyzCustomerProductPriceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PyzCustomerProductPriceQuery
