<?php

namespace Pyz\Zed\Url\Communication;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\Url\Communication\Form\AffectedUrlsByPathForm;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Spryker\Zed\Url\Persistence\UrlRepositoryInterface getRepository()
 */
class UrlCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @param PathBlacklistTransfer|null $pathBlacklistTransfer
     *
     * @return FormInterface
     */
    public function getAffectedUrlsByPathForm(?PathBlacklistTransfer $pathBlacklistTransfer = null): FormInterface
    {
        return $this->getFormFactory()->create(AffectedUrlsByPathForm::class, $pathBlacklistTransfer);
    }
}
