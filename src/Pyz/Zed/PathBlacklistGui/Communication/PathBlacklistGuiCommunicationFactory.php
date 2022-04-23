<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface;
use Pyz\Zed\PathBlacklistGui\Communication\Form\AffectedUrlsByPathForm;
use Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint\PathBlacklistPathUniqueConstraint;
use Pyz\Zed\PathBlacklistGui\Communication\Form\PathBlacklistForm;
use Pyz\Zed\PathBlacklistGui\Communication\Table\PathBlacklistTable;
use Pyz\Zed\PathBlacklistGui\PathBlacklistGuiDependencyProvider;
use Pyz\Zed\Url\Business\UrlFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * Class PathBlacklistGuiCommunicationFactory
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication
 */
class PathBlacklistGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\StoreGui\Communication\Table\StoreTable
     */
    public function createPathBlacklistTable(): PathBlacklistTable
    {
        return new PathBlacklistTable($this->getPathBlacklistPropelQuery());
    }

    /**
     * @return \Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery
     */
    public function getPathBlacklistPropelQuery(): PyzPathBlacklistQuery
    {
        return $this->getProvidedDependency(PathBlacklistGuiDependencyProvider::PROPEL_QUERY_PATH_BLACKLIST);
    }

    /**
     * @return \Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface
     */
    public function getPathBlacklistFacade(): PathBlacklistFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistGuiDependencyProvider::FACADE_PATH_BLACKLIST);
    }

    /**
     * @return \Pyz\Zed\Url\Business\UrlFacadeInterface
     */
    public function getUrlFacade(): UrlFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistGuiDependencyProvider::FACADE_URL);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer|null $pathBlacklistTransfer
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getPathBlacklistForm(?PathBlacklistTransfer $pathBlacklistTransfer = null): FormInterface
    {
        return $this->getFormFactory()->create(PathBlacklistForm::class, $pathBlacklistTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer|null $pathBlacklistTransfer
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getAffectedUrlsByPathForm(?PathBlacklistTransfer $pathBlacklistTransfer = null): FormInterface
    {
        return $this->getFormFactory()->create(AffectedUrlsByPathForm::class, $pathBlacklistTransfer);
    }

    /**
     * @return \Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint\PathBlacklistPathUniqueConstraint
     */
    public function createPathUniqueConstraint(): PathBlacklistPathUniqueConstraint
    {
        return new PathBlacklistPathUniqueConstraint([
            PathBlacklistPathUniqueConstraint::OPTION_PATH_BLACKLIST_FACADE => $this->getPathBlacklistFacade(),
        ]);
    }
}
