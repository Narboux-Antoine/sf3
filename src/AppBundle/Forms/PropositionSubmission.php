<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 9:08 AM
 */

namespace AppBundle\Forms;
use Symfony\Component\Validator\Constraints as Assert;


class PropositionSubmission
{
    /** @Assert\NotBlank */
    public $describe;

    /** @Assert\NotBlank */
    public $price;
}