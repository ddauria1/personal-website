<?php
/**
 * Created by PhpStorm.
 * User: LSI
 * Date: 22/02/2018
 * Time: 07:54
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route ("/blog")
     */
    public function index(){

        $listPages = [ 1, 2, 10 ];

        $listArticles = ['The Godfather','The Dark Knight','The Lord of the Rings: The Return of the King'];

        return $this->render("blog/index.html.twig",
            array(
                'title' => 'Blog',
                'mainContent' => 'Content',
                'listPages' => $listPages,
                'listArticles' =>$listArticles
            )
        );

    }


    /**
     * @Route ("/blog/{id}", requirements={"id"="\d+"})
     */
    public function list($id){

        return $this->render("blog/list.html.twig",
            array(
                'title' => 'Blog',
                'mainContent' => 'Content',
                'id' =>$id
            )
        );

    }

    /**
     * @Route ("/blog/{pageTitle}")
     */
    public function page($pageTitle){

        return $this->render("blog/page.html.twig",
            array(
                'title' => 'Blog | '.$pageTitle,
                'pageTitle' => ucwords(str_replace("-"," ",$pageTitle)),
                'mainContent' => 'Content'
            )
        );

    }

}