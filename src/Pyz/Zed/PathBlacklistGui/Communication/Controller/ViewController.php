<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class ViewController extends AbstractController
{
    public const PARAM_ID_PATH_BLACKLIST = 'id-path-blacklist';

    protected const MESSAGE_PATH_BLACKLIST_NOT_FOUND = 'Path Blacklist not found';

    /**
     * @param Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
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

        return $this->viewResponse([
            'pathBlacklist' => $pathBlacklistTransfer,
            'idPathBlacklist' => $idPathBlacklist,
        ]);
    }
}
