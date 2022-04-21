<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory getFactory()
 */
abstract class PathBlacklistGuiAbstractController extends AbstractController
{
    protected const PARAM_ID_PATH_BLACKLIST = 'id-path-blacklist';
    protected const MESSAGE_CREATED_SUCCESS = 'Path Blacklist has been successfully saved';
    protected const MESSAGE_UPDATED_SUCCESS = 'Path Blacklist has been successfully updated';
    protected const MESSAGE_DELETED_SUCCESS = 'Path Blacklist has been successfully deleted';
    protected const MESSAGE_PATH_BLACKLIST_NOT_FOUND = 'Path Blacklist not found';
    protected const MESSAGE_ERROR = 'Error';
    /**
     * @uses \Spryker\Zed\Http\Communication\Plugin\Application\HttpApplicationPlugin::SERVICE_SUB_REQUEST
     */
    protected const SERVICE_SUB_REQUEST = 'sub_request';
    protected const ROUTE_URL_PATH_BLACKLIST_AFFECTED_URLS = '/path-blacklist-gui/affected-urls/get-by-path-blacklist';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\PathBlacklistTransfer|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
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

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return false|string
     */
    protected function getAffectedUrlBlock(Request $request)
    {
        return $this->getSubRequestHandler()
            ->handleSubRequest($request, static::ROUTE_URL_PATH_BLACKLIST_AFFECTED_URLS)
            ->getContent();
    }

    /**
     * @return \Spryker\Zed\Application\Business\Model\Request\SubRequestHandlerInterface
     */
    protected function getSubRequestHandler()
    {
        return $this->getApplication()->get(static::SERVICE_SUB_REQUEST);
    }
}
