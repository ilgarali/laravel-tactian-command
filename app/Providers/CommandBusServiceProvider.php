<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\CommandBus as TacticianCommandBus;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use App\CommandBus\{ClassNameLocator, CommandBus, CommandBusInterface, Middleware\DBTransactionMiddleware};

class CommandBusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CommandBusInterface::class, function () {
            return new CommandBus(new TacticianCommandBus([
                new DBTransactionMiddleware(),
                new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    new ClassNameLocator(),
                    new HandleInflector()
                )
            ]));
        });
    }

}
