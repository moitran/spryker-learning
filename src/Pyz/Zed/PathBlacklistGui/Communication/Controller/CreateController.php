<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CreateController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class CreateController extends PathBlacklistGuiAbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $pathBlacklistTransfer = new PathBlacklistTransfer();

        $pathBlacklistForm = $this->getFactory()
            ->getPathBlacklistForm($pathBlacklistTransfer)
            ->handleRequest($request);

        if ($pathBlacklistForm->isSubmitted() && $pathBlacklistForm->isValid()) {
            $this->handlePathBlacklistForm($pathBlacklistForm);

            return $this->redirectResponse(RoutingConstants::LIST_URL);
        }

        return $this->viewResponse([
            'pathBlacklistForm' => $pathBlacklistForm->createView(),
        ]);
    }

    /**
     * @param FormInterface $pathBlacklistForm
     */
    protected function handlePathBlacklistForm(FormInterface $pathBlacklistForm): void
    {
        // save new record in pyz_path_blacklist table
        $result = $this->getFactory()
            ->getPathBlacklistFacade()
            ->createPathBlacklist($pathBlacklistForm->getData());

        // save error
        if (!$result) {
            $this->addErrorMessage(static::MESSAGE_ERROR);
        }

        // show success message
        $this->addSuccessMessage(static::MESSAGE_CREATED_SUCCESS);
    }
}
