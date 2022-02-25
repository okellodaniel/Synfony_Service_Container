<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;
use Doctrine\Common\Persistence\ManagerRegistry;

class StudentController extends AbstractController
{
    /**
     * @Route("/student/", name="app_student")
     */

    public function addAction(ManagerRegistry $doctrine): Response
    {
        $stud = new Student();
        $stud->setName('John');
        $stud->setAddress('123 Main St');
        $doct = $doctrine->getManager();

        // Tell doctrine to Save the Student

        $doct->persist($stud);

        // Execute the Query

        $doct->flush();

        return new Response('Student Added with id ' . $stud->getId());
    }


    // /**
    //  * @Route("/student/")
    //  */

    // public function displayAction(ManagerRegistry $doctrine): Response
    // {
    //     $stud = $doctrine()
    //         ->getRepository('AppBundle:Student')
    //         ->findAll();

    //     return $this->render('student.html.twig', array('data' => $stud));
    // }

    /** 
     * @Route("/student/delete/{id}") 
     */
    public function deleteAction($id)
    {
        $doct = $this->getDoctrine()->getManager();
        $stud = $doct->getRepository('AppBundle:Student')->find($id);

        if (!$stud) {
            throw $this->createNotFoundException('No student found for id ' . $id);
        }

        $doct->remove($stud);
        $doct->flush();

        return new Response('Record deleted!');
    }
}
