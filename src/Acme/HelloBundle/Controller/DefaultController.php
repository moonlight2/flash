<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    private $session;

    public function indexAction($name) {
        
        $jsonResp = new JsonResponse();
        $jsonResp->setData(array('name'=>'lk;lk;l'));
        
        return $jsonResp;

        $data = json_encode(array('type' => $name, 'params' => 'Rams'));
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $responce = new Response($data, 200, $headers);
        return $responce;

        $this->session = $this->getRequest()->getSession();
        /*
          $response = $this->forward('AcmeHelloBundle:Default:some', array(
          'name' => $name,
          ));

          return $response;

          return $this->redirect($this->generateUrl('homepage'));
         * 
         */
        return new Response('Hi there! ' . $this->session->get('Ilia'));
        return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name));
    }

    public function someAction($name) {


        $this->session->set('Ilia', $name);

        return new Response($this->session->get('Ilia'));
    }

}
