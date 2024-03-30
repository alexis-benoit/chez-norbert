<?php


namespace App\Listener;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class WebSiteInformationExceptionListener
{
    public function onKernelException (ExceptionEvent $event) {
        $exception = $event->getThrowable();

        if ($exception instanceof EmptyWebSiteInformationException) {
            $response = new RedirectResponse('/admin/info/create');
            $event->setResponse($response);
        }
    }
}