<?php
namespace Event\Model;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class Event extends EntityRepository
{
    private $em;
    private $class;

    function __construct($em, $class)
    {
        $this->em = $em;
        $this->class = $class;
    }

    public function getEvents()
    {
        $dq = $this->em->createQueryBuilder();
        $query = $dq->select(array('a'))
                    ->from(get_class($this->class), 'a')
                    ->where('a.eveiStatus = 1');
        $results = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);

        $events = array();
        foreach($results as $result)
        {
            $events[] = array(
                'id' => $result['eveiId'],
                'calendar' => $result['evevCalendar'],
                'caliId' => $result['caliId'],
                'startTime' => $result['evevStartTime'],
                'endTime' => $result['evevEndTime'],
                'summary' => $result['evetSummary'],
                'place' => $result['evevPlace'],
                'allDay' => $result['eveiAllDay'] === 1 ? true : false
            );
        }

        return $events;
    }

    public function getNextId()
    {
        $dq = $this->em->createQueryBuilder();
        $query = $dq->select(array('max(b.eveiId)+1 as nextId'))
                    ->from(get_class($this->class), 'b');
        $results = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);
        $nextId = $results[0]['nextId'];

        return $nextId;
    }

    public function getEvent($id)
    {
        $dq = $this->em->createQueryBuilder();
        $query = $dq->select(array('a'))
                    ->from(get_class($this->class), 'a')
                    ->where('a.eveiId = :id')
                    ->setParameter('id', $id);
        $results = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);

        if (!empty($results))
        {
            $event = array_shift($results);

            list($event['startDate'], $event['startHour']) = explode("T", $event['evevStartTime']);
            list($event['endDate'], $event['endHour']) = explode("T", $event['evevEndTime']);
            $event['startHour'] = "T".$event['startHour'];
            $event['endHour'] = "T".$event['endHour'];
        }
        else
        {
            $event = array();
        }

        return $event;
    }

    public function saveEvent($event)
    {
        $event_obj = $this->class;
        $event_obj->setCaliId($event['calendar'])
                  ->setEvevStartTime($event['start'])
                  ->setEvevEndTime($event['end'])
                  ->setEvetSummary($event['summary'])
                  ->setEvevCalendar('Calendar'.$event['calendar']);
        $this->em->persist($event_obj);
        $this->em->flush();

        return $event_obj->getEveiId();
    }

    public function updateTime($event)
    {
        $event_obj = $this->em->find(get_class($this->class), $event['id']);
        $event_obj->setEvevStartTime($event['start'])
                  ->setEvevEndTime($event['end']);
        $this->em->persist($event_obj);
        $this->em->flush();

        return true;
    }

    public function update($event)
    {
        $event_obj = $this->em->find(get_class($this->class), $event['eveiId']);
        $event_obj->setEvetSummary($event['evetSummary'])
                  ->setEvevStartTime($event['evevStartDate'])
                  ->setEvevEndTime($event['evevEndDate'])
                  ->setEvevPlace($event['evevPlace'])
                  ->setCaliId($event['caliId'])
                  ->setEvevCalendar('Calendar'.$event['caliId']);
        $this->em->persist($event_obj);
        $this->em->flush();

        return $event;
    }

    public function delete($event)
    {
        $event_obj = $this->em->find(get_class($this->class), $event['eveiId']);
        $this->em->remove($event_obj);
        $this->em->flush();

        return true;
    }

}

?>