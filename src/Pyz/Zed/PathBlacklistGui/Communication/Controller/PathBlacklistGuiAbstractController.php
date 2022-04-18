<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

abstract class PathBlacklistGuiAbstractController extends AbstractController
{
    protected const PARAM_ID_PATH_BLACKLIST = 'id-path-blacklist';
    protected const MESSAGE_CREATED_SUCCESS = 'Path Blacklist has been successfully saved';
    protected const MESSAGE_UPDATED_SUCCESS = 'Path Blacklist has been successfully updated';
    protected const MESSAGE_DELETED_SUCCESS = 'Path Blacklist has been successfully deleted';
    protected const MESSAGE_PATH_BLACKLIST_NOT_FOUND = 'Path Blacklist not found';
    protected const MESSAGE_ERROR = 'Error';

    /**
     * @param Request $request
     *
     * @return PathBlacklistTransfer|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function findPathBlacklistById(Request $request)
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

        return $pathBlacklistTransfer;
    }
}
