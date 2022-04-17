<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

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
        $this->handleDeleteAction($idPathBlacklist);

        return $this->redirectResponse(RoutingConstants::LIST_URL);
    }

    /**
     * @param int $idPathBlacklist
     */
    protected function handleDeleteAction(int $idPathBlacklist): void
    {
        $result = $this->getFactory()
            ->getPathBlacklistFacade()
            ->deletePathBlacklistById($idPathBlacklist);

        if (!$result) {
            $this->addErrorMessage(static::MESSAGE_ERROR);
        }

        $this->addSuccessMessage(static::MESSAGE_SUCCESS);
    }
}
