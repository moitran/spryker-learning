<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
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

        return $this->viewResponse([
            'pathBlacklist' => $pathBlacklistTransfer,
        ]);
    }
}
