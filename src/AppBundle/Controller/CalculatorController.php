<?php

namespace AppBundle\Controller;
use AppBundle\Service\Kalkulator\KalkulatorService;
use AppBundle\Service\Kalkulator\Parser\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends Controller
{
    /**
     * @Route("/",name="calc")
     * @param Request $request
     * @return Response
     */
    public function formAction(Request $request){

        $wynik = null;
        $trescBledu = "";
        $czyWyzerowac = true;
        $poprzedniaOperacja = null;
        $operacja = $request->request->get('operacja');

        if($request->getMethod() === Request::METHOD_POST && strlen($operacja) >= 3){
            try{
                $parser = new Parser();
                list($liczba1, $operator, $liczba2) = $parser->parsuj($operacja);

                $kalkulator = new KalkulatorService();
                $dzialanie = $kalkulator->stworzDzialanie($liczba1, $operator, $liczba2);

                if($dzialanie->czyLiczbySaPoprawne()){
                    $wynik = $dzialanie->oblicz();
                    $czyWyzerowac = false;
                    $poprzedniaOperacja = sprintf("%f %s %f = %f", $liczba1, $operator, $liczba2, $wynik);
                }else{
                    throw new \RuntimeException('Któraś z prowadzonych liczb nie jest prawidłowa');
                }

            }catch (\Throwable $exception){
                $trescBledu = $exception->getMessage();
            }

        }

        return $this->render('calc.html.twig', [
            'wynik' => $wynik,
            'czyWyzerowac' => $czyWyzerowac,
            'poprzedniaOperacja' => $poprzedniaOperacja,
            'trescBledu' => $trescBledu
        ]);
    }
}

