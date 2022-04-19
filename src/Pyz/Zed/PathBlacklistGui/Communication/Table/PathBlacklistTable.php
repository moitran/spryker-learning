<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Table;

use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklist;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

/**
 * Class PathBlacklistTable
 * @package Pyz\Zed\PathBlacklistGui\Communication\Table
 */
class PathBlacklistTable extends AbstractTable
{
    public const COL_ID_PATH_BLACK_LIST = 'id_path_blacklist';
    public const COL_PATH = 'path';
    public const ACTIONS = 'actions';
    public const VIEW_ACTION_URL = '/path-blacklist-gui/view?id-path-blacklist=%d';
    public const EDIT_ACTION_URL = '/path-blacklist-gui/edit?id-path-blacklist=%d';
    public const DELETE_ACTION_URL = '/path-blacklist-gui/delete?id-path-blacklist=%d';

    public const IDENTIFIER = 'path_blacklist_data_table';

    /**
     * @var PyzPathBlacklistQuery
     */
    protected $pathBlacklistQuery;

    /**
     * PathBlacklistTable constructor.
     *
     * @param PyzPathBlacklistQuery $pathBlacklistQuery
     */
    public function __construct(PyzPathBlacklistQuery $pathBlacklistQuery)
    {
        $this->pathBlacklistQuery = $pathBlacklistQuery;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_PATH_BLACK_LIST => 'Path Blacklist ID',
            static::COL_PATH => 'Path',
            static::ACTIONS => self::ACTIONS,
        ]);

        $config->addRawColumn(self::ACTIONS);

        $config->setDefaultSortField(static::COL_PATH);

        $config->setSortable([
            static::COL_PATH,
        ]);

        $config->setSearchable([
            static::COL_PATH,
        ]);

        $this->setTableIdentifier(static::IDENTIFIER);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $queryResults = $this->runQuery($this->pathBlacklistQuery, $config, true);

        $pathBlacklistCollection = [];
        foreach ($queryResults as $pathBlacklistEntity) {
            $pathBlacklistCollection[] = $this->generateItem($pathBlacklistEntity);
        }

        return $pathBlacklistCollection;
    }

    /**
     * @param PyzPathBlacklist $pathBlacklistEntity
     *
     * @return array
     */
    protected function generateItem(PyzPathBlacklist $pathBlacklistEntity): array
    {
        return [
            static::COL_ID_PATH_BLACK_LIST => $pathBlacklistEntity->getIdPathBlacklist(),
            static::COL_PATH => $pathBlacklistEntity->getPath(),
            static::ACTIONS => $this->buildLinks($pathBlacklistEntity),
        ];
    }

    /**
     * @param PyzPathBlacklist $pathBlacklistEntity
     *
     * @return string
     */
    protected function buildLinks(PyzPathBlacklist $pathBlacklistEntity): string
    {
        $buttons = [];
        $buttons[] = $this->generateViewButton(
            sprintf(static::VIEW_ACTION_URL, $pathBlacklistEntity->getIdPathBlacklist()),
            'View'
        );
        $buttons[] = $this->generateEditButton(
            sprintf(static::EDIT_ACTION_URL, $pathBlacklistEntity->getIdPathBlacklist()),
            'Edit'
        );
        $buttons[] = $this->generateRemoveButton(
            sprintf(static::DELETE_ACTION_URL, $pathBlacklistEntity->getIdPathBlacklist()),
            'Delete'
        );

        return implode(' ', $buttons);
    }
}
