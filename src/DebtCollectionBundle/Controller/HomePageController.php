<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 16.12.16
 * Time: 12:16
 */

namespace DebtCollectionBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Address controller.
 *
 *
 */
class HomePageController extends Controller
{
    /**
     * @Route("/")
     */
    public function homePageAction(){
        return $this->redirectToRoute("client_index");
    }
}