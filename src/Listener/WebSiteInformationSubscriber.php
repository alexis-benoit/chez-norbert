<?php


namespace App\Listener;

use App\Controller\Admin\AdminController;
use App\Entity\WebSiteInformation;
use App\Repository\WebSiteInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class WebSiteInformationSubscriber implements EventSubscriberInterface
{

    /**
     * @var WebSiteInformationRepository
     */
    private $repo;

    public function __construct(WebSiteInformationRepository $repository)
    {
        $this->repo = $repository;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        if ($controller instanceof AdminController) {
            if ($this->repo->getCount() == 0){
                //TODO: Faire une redirection plutot que de lever une exception ?
                throw new AccessDeniedHttpException('Web Site Informations needs to be completed');
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

}