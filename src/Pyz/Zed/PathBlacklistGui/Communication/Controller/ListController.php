<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ListController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method PathBlacklistGuiCommunicationFactory getFactory()
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
     * @return JsonResponse
     */
    public function tableAction(): JsonResponse
    {
        $storeTable = $this->getFactory()->createPathBlacklistTable();

        return $this->jsonResponse(
            $storeTable->fetchData()
        );
    }
}
