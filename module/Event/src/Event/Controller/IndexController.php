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

    public function createAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $event = $request->getPost()->toArray();

            $startDate = new \DateTime($event['start']);
            $event['start'] = substr($startDate->format('c'), 0, -9);
            $endDate = new \DateTime($event['end']);
            $event['end'] = substr($endDate->format('c'), 0, -9);

            $events_obj = new Event($this->em, new WebsiteTbEvents());
            $json = array(
                'nextId' => $events_obj->saveEvent($event)
            );

            echo Json::encode($json);
            return false;
        }
    }

    public function updatetimeAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $event = $request->getPost()->toArray();

            $startDate = new \DateTime($event['start']);
            $event['start'] = substr($startDate->format('c'), 0, -9);
            $endDate = new \DateTime($event['end']);
            $event['end'] = substr($endDate->format('c'), 0, -9);

            $events_obj = new Event($this->em, new WebsiteTbEvents());
            $json = array(
                'status' => $events_obj->updateTime($event)
            );

            echo Json::encode($json);
            return false;
        }

    }

    public function saveeventAction()
    {
        $events_obj = new Event($this->em, new WebsiteTbEvents());
    }
}

?>