<?php


namespace App\Services;


use ReCaptcha\ReCaptcha;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class CaptchaVerifier implements CaptchaVerifierInterface
{
    /**
     * @var ReCaptcha
     */
    private $recaptcha;

    public function __construct(ContainerBagInterface $containerBag)
    {
        $recaptchaSiteKey = $_ENV['GOOGLE_RECAPTCHA_SECRET'];
        $this->recaptcha = new ReCaptcha($recaptchaSiteKey);
    }

    /**
     * Returns true if the given captcha is valid otherwise false
     *
     * @param string|null $captcha
     * @return bool
     */
    public function verify(?string $captcha): bool
    {
        $response = $this->recaptcha->verify($captcha);
        return $response->isSuccess();
    }
}