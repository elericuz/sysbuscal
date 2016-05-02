<?php
namespace Event\Controller;

use Common\Controller\MainController;
use Zend\View\Model\ViewModel;
use Event\Model\Event;
use Application\Entity\WebsiteTbEvents;
use Zend\Json\Json;

class IndexController extends MainController
{
    public function getallAction()
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
            $event['start'] = substr($event['start'], 0, 33);
            $event['end'] = substr($event['end'], 0, 33);

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

    public function updateAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $event = $request->getPost()->toArray();
            $event['startDate'] = substr($event['startDate'], 0, 33);
            $event['startHour'] = substr($event['startHour'], 0, 33);
            $event['endDate'] = substr($event['endDate'], 0, 33);
            $event['endHour'] = substr($event['endHour'], 0, 33);

            $startDate = new \DateTime($event['startDate']);
            $startHour = new \DateTime($event['startHour']);
            $endDate = new \DateTime($event['endDate']);
            $endHour = new \DateTime($event['endHour']);
            $event['evevStartDate'] = $startDate->format("Y-m-d") . "T" . $startHour->format("H:i");
            $event['evevEndDate'] = $endDate->format("Y-m-d") . "T" . $endHour->format("H:i");

            $events_obj = new Event($this->em, new WebsiteTbEvents());
            $json = array(
                'status' => true,
                'event' => $events_obj->update($event)
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
            $event['start'] = substr($event['start'], 0, 33);
            $event['end'] = substr($event['end'], 0, 33);

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

    public function getAction()
    {
        $eveiId = (int)$this->params()->fromRoute('event_id');

        $events_obj = new Event($this->em, new WebsiteTbEvents());

        $json = $events_obj->getEvent($eveiId);

        echo Json::encode($json);
        return false;
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $event = $request->getPost()->toArray();

            $events_obj = new Event($this->em, new WebsiteTbEvents());
            $json = array(
                'status' => $events_obj->delete($event)
            );

            echo Json::encode($json);
            return false;
        }
    }
}

?>