<?php


namespace App\Controller\Front;


use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request,
                            EntityManagerInterface $entityManager,
                            ContactRepository $contactRepository)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('succes','Votre demande à bine été envoyé');
        }
        return $this->render('front/home.html.twig', [
            'form' => $form->createView()
        ]);
    }
}