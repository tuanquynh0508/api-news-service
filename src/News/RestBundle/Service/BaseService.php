<?php

namespace News\RestBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseService
{
  /**
   * [$container description]
   * @var String
   */
  protected $container;

  /**
   * [__construct description]
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  /**
   * [get description]
   * @param  [type] $name [description]
   * @return [type]       [description]
   */
  public function get($name)
  {
    return $this->container->get($name);
  }

  /**
   * Validate data reponse for client
   * @param  Array|Object $data       [description]
   * @param  String $message404 [description]
   * @return Array|Object             [description]
   */
  public function clientReponse($data, $message404)
  {
    if(!$data) {
      throw new HttpException(404, $message404);
    }
    return $data;
  }
}