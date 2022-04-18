<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class DeleteController extends PathBlacklistGuiAbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $pathBlacklistTransfer = $this->findPathBlacklistById($request);

        $this->handleDeleteAction($pathBlacklistTransfer);

        return $this->redirectResponse(RoutingConstants::LIST_URL);
    }

    /**
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    protected function handleDeleteAction(PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $result = $this->getFactory()
            ->getPathBlacklistFacade()
            ->deletePathBlacklistById($pathBlacklistTransfer);

        if (!$result) {
            $this->addErrorMessage(static::MESSAGE_ERROR);
        }

        $this->addSuccessMessage(static::MESSAGE_DELETED_SUCCESS);
    }
}
