<?php
namespace Event\Controller;

use Common\Controller\MainController;
use Zend\View\Model\ViewModel;
use Event\Model\Event;
use Application\Entity\WebsiteTbEvents;
use Zend\Json\Json;

class IndexController extends MainController
{
    public function getAction()
    {
        $events_obj = new Event($this->em, new WebsiteTbEvents());
        $json = array(
            'items' => $events_obj->getEvents()
        );

        echo Json::encode($json);

        return false;
    }
}

?>