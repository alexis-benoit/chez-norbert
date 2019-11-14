<?php


namespace App\Listener;


use Exception;

class EmptyWebSiteInformationException extends Exception
{
    protected $message = 'Aucune information';
}