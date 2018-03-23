<?php
namespace App\Controller;


use App\Entity\Contact;
use Charity\Base;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Session\Session;

class MainController extends Controller {

    /**
     * @Route("/" , name="home-page")
     *
     */
    public function homepage(Request $request, LoggerInterface $logger){

        $logger->info("We are logging the homepage");


        $content = file_get_contents($request->server->get('DOCUMENT_ROOT').$request->getBasePath().'\..\..\README.md');

        $charity = new Base();


        return $this->render('home.html.twig',
            array(
                'title' => 'README.md',
                'mainContent' => $content,
                'charity' =>$charity->getDisplay(),
                'name' => $this->get('session')->get('name')
            )
        );
    }


    /**
     * @Route("/contact" , name="contact-page")
     *
     */
    public function contact(Request $request,LoggerInterface $logger){

        $logger->info("We are logging the contact page");

        $contactForm = new Contact();

        $form = $this->createFormBuilder($contactForm)
            ->add('name', TextType::class)
            ->add('surname',TextType::class)
            ->add('email',EmailType::class)
            ->add('message',TextareaType::class)
            ->add('send',SubmitType::class,array("attr" => array('class' => 'button-to-action')))
            ->getForm();


        //SUBMIT CASE - START
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logger->info("Contact Form page - Submit");
            $formSubmit = $form->getData();

            //Save Data in Session
            $session = new Session();
            $session->start();
            $session->set('name',$formSubmit->getName());

            //Display data entry on screen
            return $this->render('pages/contact-submit.html.twig',
                array(
                    'title' => 'Contact',
                    'mainContent' => 'Data inserted from the form',
                    'formFields' =>$formSubmit,
                    'name' => $this->get('session')->get('name')
                )
            );
        }
        //SUBMIT CASE - END

        return $this->render('pages/contact.html.twig',
            array(
                'title' => 'Contact',
                'mainContent' => 'This form has been built using symfony/form .<br> Please note: After submit the application will save data in session and display the name on the top menu. <b>No email sent!</b>',
                'form' =>$form->createView(),
                'name' => $this->get('session')->get('name')
            )
        );
    }


    /**
     * @Route("/about"  , name="about-page")
     *
     */
    public function about(LoggerInterface $logger){

        $logger->info("We are logging the about page");

        return $this->render('pages/about.html.twig',
            array(
                'title' => 'About',
                'mainContent' => 'Content',
                'name' => $this->get('session')->get('name')
            )
        );
    }


    /**
     * @Route("/services"  , name="services-page")
     *
     */
    public function services(LoggerInterface $logger){

        $logger->info("We are logging the services page");

        return $this->render('pages/services.html.twig',
            array(
                'title' => 'Services',
                'mainContent' => 'Content',
                'name' => $this->get('session')->get('name')
            )
        );
    }

    /**
     * @Route("/marketing"  , name="marketing-page")
     *
     */
    public function marketing(LoggerInterface $logger){

        $logger->info("We are logging the marketing page");

        return $this->render('pages/marketing.html.twig',
            array(
                'title' => 'Online Marketing',
                'mainContent' => 'Content',
                'name' => $this->get('session')->get('name')
            )
        );
    }


}