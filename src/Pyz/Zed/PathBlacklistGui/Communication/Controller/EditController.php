<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EditController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class EditController extends AbstractController
{
    public const PARAM_ID_PATH_BLACKLIST = 'id-path-blacklist';

    protected const MESSAGE_SUCCESS = 'Path Blacklist has been successfully updated';
    protected const MESSAGE_PATH_BLACKLIST_NOT_FOUND = 'Path Blacklist not found';
    protected const MESSAGE_ERROR = 'Error';

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idPathBlacklist = $request->get(static::PARAM_ID_PATH_BLACKLIST);

        if (empty($idPathBlacklist)) {
            return $this->redirectResponse(RoutingConstants::LIST_URL);
        }

        $idPathBlacklist = $this->castId($idPathBlacklist);
        $pathBlacklistTransfer = $this->getFactory()
            ->getPathBlacklistFacade()
            ->findPathBlacklistById($idPathBlacklist);

        if ($pathBlacklistTransfer->getIdPathBlacklist() === null) {
            $this->addErrorMessage(static::MESSAGE_PATH_BLACKLIST_NOT_FOUND);

            return $this->redirectResponse(RoutingConstants::LIST_URL);
        }

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
     *
     * @return void
     */
    protected function handlePathBlacklistForm(FormInterface $pathBlacklistForm): void
    {
        // update new path in pyz_path_blacklist table
        $result = $this->getFactory()
            ->getPathBlacklistFacade()
            ->updatePathBlacklist($pathBlacklistForm->getData());

        // update error
        if (!$result) {
            $this->addErrorMessage(static::MESSAGE_ERROR);
        }

        // show success message
        $this->addSuccessMessage(static::MESSAGE_SUCCESS);
    }
}
