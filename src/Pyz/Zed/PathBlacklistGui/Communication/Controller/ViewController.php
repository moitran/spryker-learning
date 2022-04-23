<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 */
class ViewController extends PathBlacklistGuiAbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $pathBlacklistTransfer = $this->findPathBlacklistById($request);
        $request->request->set(AffectedUrlsController::PARAM_PATH_BLACKLIST, $pathBlacklistTransfer->getPath());

        return $this->viewResponse([
            'pathBlacklist' => $pathBlacklistTransfer,
            'affectedUrls' => $this->getAffectedUrlBlock($request),
        ]);
    }
}
