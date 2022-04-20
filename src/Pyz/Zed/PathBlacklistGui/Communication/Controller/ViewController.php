<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Pyz\Zed\Url\Communication\Controller\BlacklistUrlController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class ViewController extends PathBlacklistGuiAbstractController
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $pathBlacklistTransfer = $this->findPathBlacklistById($request);
        $request->request->set(BlacklistUrlController::PARAM_PATH_BLACKLIST, $pathBlacklistTransfer->getPath());

        return $this->viewResponse([
            'pathBlacklist' => $pathBlacklistTransfer,
            'affectedUrls' => $this->getAffectedUrlBlock($request),
        ]);
    }
}
