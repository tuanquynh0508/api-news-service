<?php
namespace News\RestBundle\Service;

class ArticleService extends BaseService
{

  /**
   * Get article by id
   *
   * @author Nguyen Nhu Tuan <tuanquynh0508@gmail.com>
   * @since 1.0
   * @param  integer $id
   * @return object
   */
  public function getArticle($id) {
    $articleRepository = $this->get('api_news.repository.article');
    $data = $articleRepository->getArticle($id);
    return $this->clientReponse($data, "Article not found");
  }

  /**
   * Get Articles list
   *
   * @author Nguyen Nhu Tuan <tuanquynh0508@gmail.com>
   * @since 1.0
   * @param  integer $page        [description]
   * @param  integer $limit       [description]
   * @param  integer $category_id [description]
   * @return array
   */
  public function getArticles($page=1,$limit=10, $category_id=0)
  {
    $articleRepository = $this->get('api_news.repository.article');
    $data = $articleRepository->getArticles($page,$limit, $category_id);
    return $this->clientReponse($data, "Article not found");
  }

}
