<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CreateController
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method \Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory getFactory()
 */
class CreateController extends PathBlacklistGuiAbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
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
     * @param \Symfony\Component\Form\FormInterface $pathBlacklistForm
     *
     * @return void
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
