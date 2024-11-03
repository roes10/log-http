<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp;

use App\Http\Controllers\Controller;
use ReflectionClass;
use ReflectionException;
use ShoestenTag\LogHttp\Attributes\Intercept;
use ShoestenTag\LogHttp\Exceptions\InterceptorException;

final class Interceptor
{

    private function resolveAttributes(ReflectionClass $refClass, string $methodName): array
    {
        $methodAttributes = $refClass->hasMethod($methodName)
            ? $refClass->getMethod($methodName)->getAttributes(Intercept::class)
            : [];

        return $methodAttributes ?: $refClass->getAttributes(Intercept::class);
    }

    /**
     * @throws InterceptorException
     */
    public function handleRequest(Controller $controller, string $methodName, mixed $params): void
    {
        try {

            $refClass = new ReflectionClass($controller);
            $attributes = $this->resolveAttributes($refClass, $methodName);

            foreach ($attributes as $attribute) {
                $interceptInstance = $attribute->newInstance();

                if ($interceptInstance->request) {
                    $loggerContext = new LoggerContext();
                    $loggerContext->setLogStrategy(new LogRequestStrategy());
                    $loggerContext->log($params);
                }
            }
        } catch (ReflectionException $e) {
            throw new InterceptorException(
                "Failed to handle request logging: {$e->getMessage()}",
                previous: $e
            );
        }
    }

    /**
     * @throws InterceptorException
     */
    public function handleResponse(Controller $controller, string $methodName, mixed $response): void
    {
        try {
            $refClass = new ReflectionClass($controller);
            $attributes = $this->resolveAttributes($refClass, $methodName);

            foreach ($attributes as $attribute) {
                $interceptInstance = $attribute->newInstance();

                if ($interceptInstance->response) {
                    $loggerContext = new LoggerContext();
                    $loggerContext->setLogStrategy(new LogResponseStrategy());
                    $loggerContext->log($response);
                }
            }
        } catch (ReflectionException $e) {
            throw new InterceptorException(
                "Failed to handle response logging: {$e->getMessage()}",
                previous: $e
            );
        }
    }
}
