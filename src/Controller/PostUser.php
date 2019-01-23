<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route(name="User", path="/users", methods={"POST"})
 */
class PostUser
{
    public function __invoke(ValidatorInterface $validator, Request $request, RegistryInterface $registry)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->password = $request->get('password');

        $violations = $validator->validate($user);

        if (0 !== $violations->count()) {
            throw new BadRequestHttpException('username and password not valid');
        }

        $manager = $registry->getEntityManager();
        $manager->persist($user);
        $manager->flush();

        return new Response('',  Response::HTTP_CREATED);
    }
}
