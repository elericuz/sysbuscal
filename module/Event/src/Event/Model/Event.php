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
                'startTime' => $result['evevStartTime'],
                'endTime' => $result['evevEndTime'],
                'summary' => $result['evetSummary'],
                'place' => $result['evevPlace'],
                'allDay' => $result['eveiAllDay'] === 1 ? true : false
            );
        }

        return $events;
    }
}

?>