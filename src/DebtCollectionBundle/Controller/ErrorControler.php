<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 16.12.16
 * Time: 12:55
 */

namespace DebtCollectionBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ErrorControler
 * @package DebtCollectionBundle\Controller
 * @Route("error")
 */
class ErrorControler extends Controller
{
    /**
     * @Route("/{msg}")
     * @Template("error.html.twig")
     */
    public function errorAction($msg){
        return ['msg'=>$msg];
    }
}