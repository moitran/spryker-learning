<?php

namespace Pyz\Zed\PathBlacklistGui\Communication;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Pyz\Zed\PathBlacklist\Business\PathBlacklistFacadeInterface;
use Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint\PathBlacklistPathUniqueConstraint;
use Pyz\Zed\PathBlacklistGui\Communication\Form\PathBlacklistForm;
use Pyz\Zed\PathBlacklistGui\Communication\Table\PathBlacklistTable;
use Pyz\Zed\PathBlacklistGui\PathBlacklistGuiDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * Class PathBlacklistGuiCommunicationFactory
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
     * @return PyzPathBlacklistQuery
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getPathBlacklistPropelQuery(): PyzPathBlacklistQuery
    {
        return $this->getProvidedDependency(PathBlacklistGuiDependencyProvider::PROPEL_QUERY_PATH_BLACKLIST);
    }

    /**
     * @return PathBlacklistFacadeInterface
     */
    public function getPathBlacklistFacade(): PathBlacklistFacadeInterface
    {
        return $this->getProvidedDependency(PathBlacklistGuiDependencyProvider::FACADE_PATH_BLACKLIST);
    }

    /**
     * @param PathBlacklistTransfer|null $pathBlacklistTransfer
     *
     * @return FormInterface
     */
    public function getPathBlacklistForm(?PathBlacklistTransfer $pathBlacklistTransfer = null): FormInterface
    {
        return $this->getFormFactory()->create(PathBlacklistForm::class, $pathBlacklistTransfer);
    }

    /**
     * @return PathBlacklistPathUniqueConstraint
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createPathUniqueConstraint(): PathBlacklistPathUniqueConstraint
    {
        return new PathBlacklistPathUniqueConstraint([
            PathBlacklistPathUniqueConstraint::OPTION_PATH_BLACKLIST_FACADE => $this->getPathBlacklistFacade(),
        ]);
    }
}
