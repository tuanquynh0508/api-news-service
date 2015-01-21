<?php

namespace News\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//For FOSRestController
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View AS FOSView;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\QueryParam;
//For API DOC
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ArticleController extends FOSRestController
{

  /**
     * Get single Article.
     *
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a article detail by article id",
     *   output = "News\RestBundle\Entity\Article",
     *   section="Article",
     *   requirements={
     *     {
     *       "name"="id",
     *       "dataType"="integer",
     *       "requirement"="\d+",
     *       "description"="Article Id"
     *     }
     *   },
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getArticle.html.twig",
     *  templateVar = "article"
     * )
     *
     *
     * @return News\RestBundle\Entity\Article
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getArticleAction($id)
    {
      $articleService = $this->get('api_news.service.article');
      return $articleService->getArticle($id);
    }

    /**
     * Get list Articles
     *
     * @QueryParam(name="limit", requirements="\d+", default=10, description="Limit number of return records")
     * @QueryParam(name="page", requirements="\d+", default=1, description="Page current")
     * @QueryParam(name="category_id", requirements="\d+", default=0, description="Category id of article")
     *
     * @ApiDoc(
     *   resource = true,
     *   section="Article",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getArticles.html.twig",
     *  templateVar = "article"
     * )
     *
     * @param Request $request the request object
     *
     * @return array
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getArticlesAction(Request $request)
    {
      $page = $request->get('page');
      if(!$page) {
        $page = 1;
      } else {
        $page = abs($page);
      }

      $limit = $request->get('limit');
      if(!$limit) {
        $limit = 10;
      } else {
        $limit = (abs($limit)>50)?50:abs($limit);
      }

      $category_id = $request->get('category_id');
      if(!$category_id) {
        $category_id = 0;
      } else {
        $category_id = abs($category_id);
      }

      $articleService = $this->get('api_news.service.article');
      return $articleService->getArticles($page, $limit, $category_id);
    }

}
