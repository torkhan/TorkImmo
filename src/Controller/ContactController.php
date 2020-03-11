<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,
                          \Swift_Mailer $mailer):Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);


        if ($form -> isSubmitted() && $form -> isValid()){

            $entityManager = $this->getDoctrine()->getManager();//fait la connection à la bdd

            $entityManager->persist($contact);//envois a la bdd

            $entityManager->flush();//ecrit dans la bdd

            $nom = $contact->getNom();
            $prenom = $contact->getPrenom();
            $email = $contact->getEmail();
            $messageEnvoye = $contact->getMessage();
            $sujet = $contact->getSujet();
            $dateEnvoi = $contact->getDateEnvoi();


            $message = (new \Swift_Message($sujet))
                ->setFrom([$email => $nom." ".$prenom])
                ->setTo(['torkhan2706@gmail.com', 'torkhan2706@gmail.com'])

                ->setBody("<html lang=><head><meta charset='UTF-8'><title></title></head><body>Envoyé le" ." ".$dateEnvoi->format('d/m/y').'<br/>'.$messageEnvoye."</body></html>")
            ;
// Send the message
            $message->setContentType("text/html");


            $mailer->send($message);


           return $this->redirectToRoute('home');

        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()

        ]);
    }
}
