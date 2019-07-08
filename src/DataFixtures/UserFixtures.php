<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const STRIPE_CUSTOMER1 = 'cus_FOj75sgTWFowaQ';
    const STRIPE_CUSTOMER2 = 'cus_FOj8hTn6KsP5qn';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setEmail('user1@mail.com')
            ->setStripeId(self::STRIPE_CUSTOMER1)
            ->setPassword($this->passwordEncoder->encodePassword(
                $user,
                '12345'
            ));
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail('user2@mail.com')
            ->setStripeId(self::STRIPE_CUSTOMER2)
            ->setPassword($this->passwordEncoder->encodePassword(
                $user,
                '12345'
            ));
        $manager->persist($user);

        $manager->flush();
    }
}
