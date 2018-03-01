<?php
namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route ("/blog" , name="blog-page")
     */
    public function index(){

        $listPages = [ 1, 2, 3 ];

        $listArticles = ['The Godfather','The Dark Knight','The Lord of the Rings: The Return of the King'];

        return $this->render("blog/index.html.twig",
            array(
                'title' => 'Blog',
                'mainContent' => 'Content',
                'listPages' => $listPages,
                'listArticles' =>$listArticles,
                'name' => $this->get('session')->get('name')
            )
        );

    }


    /**
     * @Route ("/blog/{id}", requirements={"id"="\d+"})
     */
    public function list($id, LoggerInterface $logger){

        if($id>3 || $id<1){ // currently we only accept three static ids [1, 2, 3]
            $logger->error("Blog List Route - Invalid parameter passed: ".$id);
            throw $this->createNotFoundException('The blog list page does not exist');
        }

        return $this->render("blog/list.html.twig",
            array(
                'title' => 'Blog',
                'id' =>$id,
                'name' => $this->get('session')->get('name')
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
                'mainContent' => 'Content',
                'name' => $this->get('session')->get('name')
            )
        );

    }

}