<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
    /**
     * @Route("/answers/{id}/vote", methods="POST", name="answer_vote")
     */
    public function answerVote($id, LoggerInterface $logger, Request $request, AnswerRepository $answerRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        dump($id, $request);
        $data = json_decode($request->getContent(), true);
        $direction = $data['direction'] ?? 'up';

        $answer = $answerRepository->find($id);

        // use real logic here to save this to the database
        if ($direction === 'up') {
            $logger->info('Voting up!');
            $answer->voteUp();
        } else {
            $logger->info('Voting down!');
            $answer->voteDown();
        }

        $entityManager->flush();

        return $this->json(['votes' => $answer->getVotesString()]);
    }
}
