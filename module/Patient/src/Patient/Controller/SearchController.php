<?php
namespace Patient\Controller;

use Common\Controller\MainController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\Json\Json;

class SearchController extends MainController
{
    public function searchAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $searchField = $request->getPost('searchField', false);

            $query = $this->em->createQueryBuilder();
            $query->select(array('e', 'g'))
                  ->from('Application\Entity\WebsiteTbEvents', 'e')
                  ->join('e.cali', 'g')
                  ->where($query->expr()
                                ->like('e.evetSummary',
                                       $query->expr()->literal('%' . $searchField . '%')))
                  ->orderBy('e.eveiId', 'DESC');

            $results = $query->getQuery()->getArrayResult();

            $renderer = $this->getServiceLocator()->get('ViewRenderer');
            $viewModelObj = new ViewModel(array('results' => $results));
            $viewModelObj->setTemplate('patient/search/search');
            $viewModelObj->setTerminal(true);
            $html = $renderer->render($viewModelObj);

            echo Json::encode(
                array(
                    'success' => true,
                    'html' => $html
                )
            );

            $response = $this->getResponse();
            $response->setStatusCode(200);
            return $response;
        } else {
            die('No puede hacer eso');
        }
    }
}

?>