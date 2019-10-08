<?php


namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Regex;

class CalculatorController extends Controller
{
    /**
     * @Route("/kalkulator",name="calc")
     */

    public function formAction(Request $request){

        $value = "";
        $form = $this->createFormBuilder()
            ->add('Operation', TextType::class, [
                'label'=>false,
            'constraints'=>[
                new Regex([
                    'pattern' => '/^[0-9]+[0-9\/\*\-\+\.\%]+[0-9]+$/',
                    'message' => 'Niezrozumiała składnia.'
                ])
            ],
            'attr' => [
                'class'=>'operation',
                'id'=>'task-form',
                'style' => 'width: 500px; height: 100px; font-size:70px; border-style: outset; border-radius: 8px; border-width: 8px; color: black'
            ]
        ])
            ->add('save', SubmitType::class,[
                'label' => 'Oblicz!',
                'attr' => [
//                    'class' => 'btn btn-primary',
                    'id' => 'submitButton',
                    'value' => 'submit',
//                    'style' => 'width: 410px; height: 100px'
                ]
            ])
            ->getForm();

        return $this->render('calc.html.twig', [
            'form' => $form->createView(),
            'myValue' => $value
        ]);

    }
}

