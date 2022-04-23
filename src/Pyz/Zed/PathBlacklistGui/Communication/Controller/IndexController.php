<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * Class IndexController
 *
 * @package Pyz\Zed\PathBlacklistGui\Communication\Controller
 * @method \Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory getFactory()
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
