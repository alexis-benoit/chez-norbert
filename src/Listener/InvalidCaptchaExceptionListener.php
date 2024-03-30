<?php


namespace App\Listener;


use App\Services\InvalidCaptchaException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class InvalidCaptchaExceptionListener
{
    /**
     * @var FlashBagInterface
     */
    private $bag;

    public function __construct(FlashBagInterface $bag)
    {
        $this->bag = $bag;
    }

    public function onKernelException (ExceptionEvent $event) {
        $exception = $event->getThrowable();

        if ($exception instanceof InvalidCaptchaException) {
            $this->bag->add('danger', 'Captcha obligatoire.');
            $response = new RedirectResponse('/login');
            $event->setResponse($response);
        }
    }
}