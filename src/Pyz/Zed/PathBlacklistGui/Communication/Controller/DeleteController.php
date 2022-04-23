<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteController
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method \Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory getFactory()
 */
class DeleteController extends PathBlacklistGuiAbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $pathBlacklistTransfer = $this->findPathBlacklistById($request);

        $this->handleDeleteAction($pathBlacklistTransfer);

        return $this->redirectResponse(RoutingConstants::LIST_URL);
    }

    /**
     * @param \Generated\Shared\Transfer\PathBlacklistTransfer $pathBlacklistTransfer
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
