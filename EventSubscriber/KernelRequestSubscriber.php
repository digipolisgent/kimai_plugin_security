<?php

namespace KimaiPlugin\KimaiSecurityBundle\EventSubscriber;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class KernelRequestSubscriber implements EventSubscriberInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', 200]
        ];
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $response = $event->getResponse();

        $response->headers->set('Referrer-Policy', 'no-referrer, strict-origin-when-cross-origin');
        $response->headers->set('X-Frame-Options', 'DENY');
    }
}
