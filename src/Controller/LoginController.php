<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\MessageDigestPasswordHasher;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/loginreact/api/connect", name="loginReact", methods="POST")
     */
    public function loginConnect(Request $request, EntityManagerInterface $entityManager): Response
    {
        $error = true;
        $message = "";
        $data = $request->getContent();
        $data = json_decode($data, true);
        $email = $data["email"];
        $password = $data["password"];

        $conn = $entityManager->getConnection();
        $query = $conn->prepare("SELECT * FROM user");
        $query->execute();
        $user = $query->fetch();
        if ($user) {
            $error = false;
        }

        return new JsonResponse(['user'=>$user, "message"=>$message, 'error'=>$error]);
    }
}
