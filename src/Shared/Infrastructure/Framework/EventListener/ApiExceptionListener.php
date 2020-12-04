<?php

namespace App\Shared\Infrastructure\Framework\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Response;

class ApiExceptionListener implements EventSubscriberInterface
{
    private bool $showStackTrace;

    public function __construct(bool $showStackTrace)
    {
        $this->showStackTrace = $showStackTrace;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $jsonResponseArray = ['errors' => $exception->getMessage()];

        if ($this->showStackTrace) {
            $jsonResponseArray['stack_trace'] = $exception->getTrace();
        }

        $code = $exception->getCode() > 0 ? $exception->getCode() : Response::HTTP_BAD_REQUEST;

        $event->setResponse(
            new JsonResponse(
                $jsonResponseArray,
                $code
            )
        );
    }
}
