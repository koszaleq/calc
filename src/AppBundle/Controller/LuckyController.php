<?php


namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController
{
//    /**
//     * @Route("/lucky/number")
//     */

//    public function numberAction()
//    {
//        $number = random_int(0, 100);
//
//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
//    }
//    public function numberAction()
//    {
//        $number = random_int(0, 100);
//
//        return $this->render('lucky/number.html.twig', [
//            'number' => $number,
//        ]);
//    }


    /**
     * @Route("/lucky/number/{max}")
     */
    public function numberAction($max)
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

}