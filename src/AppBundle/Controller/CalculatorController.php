<?php

namespace AppBundle\Controller;
use AppBundle\Service\Kalkulator\calcService;
use AppBundle\Service\Kalkulator\Parser\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends Controller
{
    /**
     * @Route("/calculator",name="calc")
     * @param Request $request
     * @return Response
     */
    public function formAction(Request $request){

        $wynik = null;
        $trescBledu = "";
        $poprzedniaOperacja = null;
        $operacja = $request->request->get('operacja');

        if($request->getMethod() === Request::METHOD_POST && strlen($operacja) >= 3){
            try{
                $parser = new Parser();
                list($liczba1, $operator, $liczba2) = $parser->parse($operacja);

                $kalkulator = new calcService();
                $dzialanie = $kalkulator->calcOperator($liczba1, $operator, $liczba2);

                if($dzialanie->isNumbersCorrect()){
                    $wynik = $dzialanie->calculate();
                    $poprzedniaOperacja = sprintf("%f %s %f = %f", $liczba1, $operator, $liczba2, $wynik);
                }else{
                    throw new \RuntimeException('Nieprawidłowa logika matematyczna!');
                }

            }catch (\Throwable $exception){
                $trescBledu = $exception->getMessage();
            }

        }

        return $this->render('calc.html.twig', [
            'wynik' => $wynik,
            'poprzedniaOperacja' => $poprzedniaOperacja,
            'trescBledu' => $trescBledu
        ]);
    }
}

