<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
     * @var \Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface
     */
    protected $pathBlacklistFacade;

    /**
     * @return \Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface
     */
    public function getPathBlacklistFacade(): PathBlacklistFacadeInterface
    {
        return $this->pathBlacklistFacade;
    }
}
