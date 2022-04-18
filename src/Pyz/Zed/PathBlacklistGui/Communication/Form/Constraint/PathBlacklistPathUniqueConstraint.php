<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint;

use Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface;
use Symfony\Component\Validator\Constraint;

class PathBlacklistPathUniqueConstraint extends Constraint
{
    public const OPTION_PATH_BLACKLIST_FACADE = 'pathBlacklistFacade';

    /**
     * @var string
     */
    public $message = 'This path is already in use OR included in existed paths';

    /**
     * @var PathBlacklistFacadeInterface
     */
    protected $pathBlacklistFacade;

    /**
     * @return PathBlacklistFacadeInterface
     */
    public function getPathBlacklistFacade(): PathBlacklistFacadeInterface
    {
        return $this->pathBlacklistFacade;
    }
}
