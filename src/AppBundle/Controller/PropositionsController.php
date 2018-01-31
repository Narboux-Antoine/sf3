<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 7:49 AM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PropositionsController extends Controller
{

    public function submitPropositionAction($idTicket):Response
    {

        return $this->render('@App/Members/member_sign_up_successful.html.twig');

    }

}