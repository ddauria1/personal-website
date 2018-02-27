<?php
namespace App\Controller;


use App\Entity\Task;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller {



    /**
     * @Route("/task-form")
     *
     */
    public function task(Request $request, LoggerInterface $logger){

        $logger->info("called Task Form page");

        // creates a task and gives it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();


        //SUBMIT CASE - START
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logger->info("Task Form page - Submit");
            $task = $form->getData();

            //TODO do something with the fields submitted

            return $this->redirectToRoute('task_success');
        }
        //SUBMIT CASE - END

        return $this->render('default/new.html.twig', array(
            'title' => 'Task Form',
            'mainContent' => '',
            'form' => $form->createView()
        ));

    }




}