<?php

namespace App\Services\Stripe;

use Stripe\Stripe;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

abstract class AbstractStripeService
{
    public function __construct(ParameterBagInterface $parameterBag)
    {
        Stripe::setApiKey($parameterBag->get('stripe_private'));
    }
}