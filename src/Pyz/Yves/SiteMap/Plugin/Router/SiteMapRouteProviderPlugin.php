<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\SiteMap\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

/**
 * Class SiteMapRouteProviderPlugin
 *
 * @package Pyz\Yves\SiteMap\Plugin\Router
 */
class SiteMapRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_SITE_MAP_INDEX = 'site-map-index';
    protected const ROUTE_SITE_MAP_DETAIL = 'site-map-detail';

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addSiteMapListIndexRoute($routeCollection);
        $routeCollection = $this->addSiteMapDetailIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addSiteMapListIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/sitemap.xml', 'SiteMap', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_SITE_MAP_INDEX, $route);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addSiteMapDetailIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/sitemap_page{pageNumber<\d+>}.xml', 'SiteMap', 'Index', 'detailAction');
        $routeCollection->add(static::ROUTE_SITE_MAP_DETAIL, $route);

        return $routeCollection;
    }
}
