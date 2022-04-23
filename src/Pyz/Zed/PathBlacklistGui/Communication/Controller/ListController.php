<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ListController
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method \Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory getFactory()
 */
class ListController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        $table = $this->getFactory()
            ->createPathBlacklistTable();

        return $this->viewResponse([
            'pathBlacklistTable' => $table->render(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function tableAction(): JsonResponse
    {
        $blacklistTable = $this->getFactory()->createPathBlacklistTable();

        return $this->jsonResponse(
            $blacklistTable->fetchData()
        );
    }
}
