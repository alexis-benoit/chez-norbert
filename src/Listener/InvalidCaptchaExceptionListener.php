<?php


namespace App\Listener;


use App\Services\InvalidCaptchaException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class InvalidCaptchaExceptionListener
{
    public function __construct(FlashBagInterface $bag)
    {
        $bag->add('danger', 'Captcha obligatoire.');
    }

    public function onKernelException (ExceptionEvent $event) {
        $exception = $event->getException();

        if ($exception instanceof InvalidCaptchaException) {
            $response = new RedirectResponse('/login');
            $event->setResponse($response);
        }
    }
}