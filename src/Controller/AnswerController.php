<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
    /**
     * @Route("/answers/{id}/vote", methods="POST", name="answer_vote")
     */
    public function answerVote(Answer $answer, LoggerInterface $logger, Request $request, AnswerRepository $answerRepository, EntityManagerInterface $entityManager)
    {
        $data = $request->request->all();
        $direction = $data['direction'] ?? 'up';

        // use real logic here to save this to the database
        if ($direction === 'up') {
            $logger->info('Voting up!');
            $answer->voteUp();
        } else {
            $logger->info('Voting down!');
            $answer->voteDown();
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_question_show', [
            'slug' => $answer->getQuestion()->getSlug()
        ]);
    }

    /**
     * @Route("/answers/popular", name="app_popular_answers", methods="GET")
     */
    public function popularAnswers(AnswerRepository $answerRepository, Request $request)
    {
        $answers = $answerRepository->findMostPopular(
            $request->query->get('q')
        );
        return $this->render("answer/popularAnswers.html.twig", [
            'answers' => $answers
        ]);
    }

}
