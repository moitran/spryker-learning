<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * Class IndexController
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        return $this->redirectResponse(RoutingConstants::LIST_URL);
    }
}
