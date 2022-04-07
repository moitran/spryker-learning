<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;


/**
 * This class defines the structure of the 'pyz_customer_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PyzCustomerProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Pyz.Zed.CustomerProductPrice.Persistence.Map.PyzCustomerProductTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pyz_customer_product';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Pyz\\Zed\\CustomerProductPrice\\Persistence\\PyzCustomerProduct';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Pyz.Zed.CustomerProductPrice.Persistence.PyzCustomerProduct';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id_customer_product field
     */
    const COL_ID_CUSTOMER_PRODUCT = 'pyz_customer_product.id_customer_product';

    /**
     * the column name for the customer_number field
     */
    const COL_CUSTOMER_NUMBER = 'pyz_customer_product.customer_number';

    /**
     * the column name for the item_number field
     */
    const COL_ITEM_NUMBER = 'pyz_customer_product.item_number';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdCustomerProduct', 'CustomerNumber', 'ItemNumber', ),
        self::TYPE_CAMELNAME     => array('idCustomerProduct', 'customerNumber', 'itemNumber', ),
        self::TYPE_COLNAME       => array(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER, PyzCustomerProductTableMap::COL_ITEM_NUMBER, ),
        self::TYPE_FIELDNAME     => array('id_customer_product', 'customer_number', 'item_number', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCustomerProduct' => 0, 'CustomerNumber' => 1, 'ItemNumber' => 2, ),
        self::TYPE_CAMELNAME     => array('idCustomerProduct' => 0, 'customerNumber' => 1, 'itemNumber' => 2, ),
        self::TYPE_COLNAME       => array(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT => 0, PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER => 1, PyzCustomerProductTableMap::COL_ITEM_NUMBER => 2, ),
        self::TYPE_FIELDNAME     => array('id_customer_product' => 0, 'customer_number' => 1, 'item_number' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'IdCustomerProduct' => 'ID_CUSTOMER_PRODUCT',
        'PyzCustomerProduct.IdCustomerProduct' => 'ID_CUSTOMER_PRODUCT',
        'idCustomerProduct' => 'ID_CUSTOMER_PRODUCT',
        'pyzCustomerProduct.idCustomerProduct' => 'ID_CUSTOMER_PRODUCT',
        'PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT' => 'ID_CUSTOMER_PRODUCT',
        'COL_ID_CUSTOMER_PRODUCT' => 'ID_CUSTOMER_PRODUCT',
        'id_customer_product' => 'ID_CUSTOMER_PRODUCT',
        'pyz_customer_product.id_customer_product' => 'ID_CUSTOMER_PRODUCT',
        'CustomerNumber' => 'CUSTOMER_NUMBER',
        'PyzCustomerProduct.CustomerNumber' => 'CUSTOMER_NUMBER',
        'customerNumber' => 'CUSTOMER_NUMBER',
        'pyzCustomerProduct.customerNumber' => 'CUSTOMER_NUMBER',
        'PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER' => 'CUSTOMER_NUMBER',
        'COL_CUSTOMER_NUMBER' => 'CUSTOMER_NUMBER',
        'customer_number' => 'CUSTOMER_NUMBER',
        'pyz_customer_product.customer_number' => 'CUSTOMER_NUMBER',
        'ItemNumber' => 'ITEM_NUMBER',
        'PyzCustomerProduct.ItemNumber' => 'ITEM_NUMBER',
        'itemNumber' => 'ITEM_NUMBER',
        'pyzCustomerProduct.itemNumber' => 'ITEM_NUMBER',
        'PyzCustomerProductTableMap::COL_ITEM_NUMBER' => 'ITEM_NUMBER',
        'COL_ITEM_NUMBER' => 'ITEM_NUMBER',
        'item_number' => 'ITEM_NUMBER',
        'pyz_customer_product.item_number' => 'ITEM_NUMBER',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pyz_customer_product');
        $this->setPhpName('PyzCustomerProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Pyz\\Zed\\CustomerProductPrice\\Persistence\\PyzCustomerProduct');
        $this->setPackage('src.Pyz.Zed.CustomerProductPrice.Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_customer_product', 'IdCustomerProduct', 'INTEGER', true, null, null);
        $this->addColumn('customer_number', 'CustomerNumber', 'VARCHAR', true, 255, null);
        $this->addColumn('item_number', 'ItemNumber', 'VARCHAR', true, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PyzCustomerProductPrice', '\\Pyz\\Zed\\CustomerProductPrice\\Persistence\\PyzCustomerProductPrice', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_customer_product',
    1 => ':id_customer_product',
  ),
), null, null, 'PyzCustomerProductPrices', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdCustomerProduct', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PyzCustomerProductTableMap::CLASS_DEFAULT : PyzCustomerProductTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (PyzCustomerProduct object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PyzCustomerProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PyzCustomerProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PyzCustomerProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PyzCustomerProductTableMap::OM_CLASS;
            /** @var PyzCustomerProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PyzCustomerProductTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PyzCustomerProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PyzCustomerProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PyzCustomerProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PyzCustomerProductTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT);
            $criteria->addSelectColumn(PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER);
            $criteria->addSelectColumn(PyzCustomerProductTableMap::COL_ITEM_NUMBER);
        } else {
            $criteria->addSelectColumn($alias . '.id_customer_product');
            $criteria->addSelectColumn($alias . '.customer_number');
            $criteria->addSelectColumn($alias . '.item_number');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT);
            $criteria->removeSelectColumn(PyzCustomerProductTableMap::COL_CUSTOMER_NUMBER);
            $criteria->removeSelectColumn(PyzCustomerProductTableMap::COL_ITEM_NUMBER);
        } else {
            $criteria->removeSelectColumn($alias . '.id_customer_product');
            $criteria->removeSelectColumn($alias . '.customer_number');
            $criteria->removeSelectColumn($alias . '.item_number');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PyzCustomerProductTableMap::DATABASE_NAME)->getTable(PyzCustomerProductTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a PyzCustomerProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PyzCustomerProduct object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PyzCustomerProductTableMap::DATABASE_NAME);
            $criteria->add(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT, (array) $values, Criteria::IN);
        }

        $query = PyzCustomerProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PyzCustomerProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PyzCustomerProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pyz_customer_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PyzCustomerProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PyzCustomerProduct or Criteria object.
     *
     * @param mixed               $criteria Criteria or PyzCustomerProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PyzCustomerProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PyzCustomerProduct object
        }

        if ($criteria->containsKey(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT) && $criteria->keyContainsValue(PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PyzCustomerProductTableMap::COL_ID_CUSTOMER_PRODUCT.')');
        }


        // Set the correct dbName
        $query = PyzCustomerProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PyzCustomerProductTableMap
