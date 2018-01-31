<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 7:49 AM
 */

namespace AppBundle\Controller;


use AppBundle\Forms\PropositionSubmission;
use AppBundle\Forms\Types\PropositionSubmissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tiquette\Domain\Proposition;

class PropositionsController extends Controller
{

    public function submitPropositionAction(Request $request, $id_ticket):Response
    {
        $user = $this->getUser();
        $id_member = $user->getId();

        $propositionsubmission = new PropositionSubmission();

        $form = $this->createForm(PropositionSubmissionType::class, $propositionsubmission);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

//                $ticket = $this->get('ticket_factory')->fromTicketSubmission($propositionsubmission);

                $proposition = Proposition::submit(
                    $propositionsubmission->describe,
                    $propositionsubmission->price,
                    $id_ticket,
                    $id_member
                );

                $this->get('repositories.proposition')->save($proposition);

                return $this->redirectToRoute('ticket_submission_successful');
            }
        }

        return $this->render('@App/Propositions/proposition_new.html.twig',
            ['form' => $form->createView()]
            );

    }

}