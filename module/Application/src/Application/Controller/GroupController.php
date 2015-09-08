<?php
namespace Application\Controller;

use Common\Controller\MainController;
use Zend\View\Model\ViewModel;
use Application\Entity\WebsiteTbCalendar;
use Application\Entity\WebsiteTbPerson;
use Application\Entity\WebsiteTbPersonCalendar;
use Zend\Validator\NotEmpty;

class GroupController extends MainController
{
    public function listAction()
    {
        $groups = $this->em->getRepository('Application\Entity\WebsiteTbCalendar')->findBy(array('caliStatus'=>1));

        $array = array(
            'groups' => $groups
        );

        return new ViewModel($array);
    }

    public function createAction()
    {
        $request = $this->getRequest();
        if($request->isPost())
        {
            $calendar_obj = new WebsiteTbCalendar();
            $calendar_obj->setCalvName(trim($request->getPost('calvName')));
            $this->em->persist($calendar_obj);
            $this->em->flush();

            return $this->redirect()->toRoute('view-group', array('id'=>$calendar_obj->getCaliId()));
        }
        else
        {
            return $this->redirect()->toRoute('dashboard');
        }
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', false);

        $notEmpty_obj = new NotEmpty();
        if(!$notEmpty_obj->isValid($id))
        {
            $id = false;
        }

        if(!is_numeric($id) || $id<=0)
        {
            $id = false;
        }

        if(!$id)
        {
            return $this->redirect()->toRoute('dashboard');
        }

        $personCalendar = $this->em->getRepository('Application\Entity\WebsiteTbPersonCalendar')->findBy(array('cali'=>$id));

        foreach($personCalendar as $value)
        {
            $this->em->remove($value);
        }

        $events = $this->em->getRepository('Application\Entity\WebsiteTbEvents')->findBy(array('caliId'=>$id));

        foreach($events as $value)
        {
            $this->em->remove($value);
        }

        $calendar = $this->em->find('Application\Entity\WebsiteTbCalendar', $id);
        $this->em->remove($calendar);

        $this->em->flush();

        return $this->redirect()->toRoute('list-groups');
    }

    public function viewAction()
    {
        $id = $this->params()->fromRoute('id', false);

        $notEmpty_obj = new NotEmpty();
        if(!$notEmpty_obj->isValid($id))
        {
            $id = false;
        }

        if(!is_numeric($id) || $id<=0)
        {
            $id = false;
        }

        if(!$id)
        {
            return $this->redirect()->toRoute('dashboard');
        }

        $group = $this->em->find('Application\Entity\WebsiteTbCalendar', $id);

        $personByCalendar = $this->em->getRepository('Application\Entity\WebsiteTbPersonCalendar')->findBy(array('cali'=>$id));

        $array = array(
            'group' => $group,
            'persons' => $personByCalendar
        );

        return new ViewModel($array);
    }

    public function deletePersonAction()
    {
        $id = $this->params()->fromRoute('id', false);
        $group = $this->params()->fromRoute('group', false);

        $notEmpty_obj = new NotEmpty();
        if(!$notEmpty_obj->isValid($id))
        {
            $id = false;
        }
        if(!$notEmpty_obj->isValid($group))
        {
            $group = false;
        }

        if(!is_numeric($id) || $id<=0)
        {
            $id = false;
        }
        if(!is_numeric($group) || $group<=0)
        {
            $group = false;
        }

        if(!$id)
        {
            return $this->redirect()->toRoute('dashboard');
        }
        if(!$group)
        {
            return $this->redirect()->toRoute('dashboard');
        }

        $persons = $this->em->getRepository('Application\Entity\WebsiteTbPersonCalendar')->findBy(array('cali'=>$group, 'peri'=>$id));
        foreach($persons as $person)
        {
            $this->em->remove($person);
        }
        $this->em->flush();

        return $this->redirect()->toRoute('view-group', array('id'=>$group));
    }

    public function addPersonAction()
    {
        $request = $this->getRequest();
        if($request->isPost())
        {
            $person_obj = new WebsiteTbPerson();
            $person_obj->setPervName(trim($request->getPost('pervName')));
            $person_obj->setPervLastname(trim($request->getPost('pervLastname')));
            $this->em->persist($person_obj);

            $calendar_obj = $this->em->find('Application\Entity\WebsiteTbCalendar', $request->getPost('caliId'));

            $personGroup_obj = new WebsiteTbPersonCalendar();
            $personGroup_obj->setPeri($person_obj);
            $personGroup_obj->setCali($calendar_obj);
            $this->em->persist($personGroup_obj);

            $this->em->flush();

            return $this->redirect()->toRoute('view-group', array('id'=>$request->getPost('caliId')));
        }
        else
        {
            return $this->redirect()->toRoute('dashboard');
        }
    }
}

?>