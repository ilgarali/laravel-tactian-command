<?php

namespace App\Commands\Posts;

use App\CommandBus\Command;

class CreatePostCommand extends Command
{
    public string $title;
    public string $description;
}
