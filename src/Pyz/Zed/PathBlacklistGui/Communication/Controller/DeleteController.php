<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class DeleteController extends AbstractController
{
    public const PARAM_ID_PATH_BLACKLIST = 'id-path-blacklist';
    protected const MESSAGE_SUCCESS = 'Path Blacklist has been successfully deleted';
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

        $this->addSuccessMessage(static::MESSAGE_SUCCESS);
    }
}
