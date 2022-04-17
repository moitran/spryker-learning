<?php

namespace Pyz\Zed\PathBlacklist\Communication\Plugin\Event;

/**
 * Class PathBlacklistEvents
 * @package Pyz\Zed\PathBlacklist\Communication\Plugin\Event
 */
class PathBlacklistEvents
{
    public const ENTITY_PYZ_PATH_BLACKLIST_CREATE = 'Entity.pyz_path_blacklist.create';
    public const ENTITY_PYZ_PATH_BLACKLIST_UPDATE = 'Entity.pyz_path_blacklist.update';
    public const ENTITY_PYZ_PATH_BLACKLIST_DELETE = 'Entity.pyz_path_blacklist.delete';
}
