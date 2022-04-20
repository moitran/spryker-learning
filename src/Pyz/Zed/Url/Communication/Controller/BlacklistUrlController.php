<?php

namespace Pyz\Zed\Url\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Url\Communication\UrlCommunicationFactory getFactory()
 * @method \Pyz\Zed\Url\Business\UrlFacadeInterface getFacade()
 */
class BlacklistUrlController extends AbstractController
{
    public const PARAM_PATH_BLACKLIST = 'path-blacklist';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function getByPathBlacklistAction(Request $request)
    {
        $pathBlacklistTransfer = new PathBlacklistTransfer();
        $pathBlacklistTransfer->setPath($request->get(static::PARAM_PATH_BLACKLIST));
        $affectedUrlsByPathForm = $this->getFactory()
            ->getAffectedUrlsByPathForm($pathBlacklistTransfer)
            ->handleRequest($request);

        $urls = [];
        if ($affectedUrlsByPathForm->isSubmitted() && $affectedUrlsByPathForm->isValid()) {
            $urls = $this->handleAffectedUrlsByPathForm($affectedUrlsByPathForm);
        }

        return $this->viewResponse([
            'affectedUrlsByPathForm' => $affectedUrlsByPathForm->createView(),
            'urls' => $urls,
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $pathBlacklistForm
     *
     * @return array
     */
    protected function handleAffectedUrlsByPathForm(FormInterface $pathBlacklistForm): array
    {
        return $this->getFacade()->findUrlByPath($pathBlacklistForm->getData()->getPath());
    }
}
