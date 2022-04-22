<?php

namespace App\Handlers\Posts;

use App\Commands\Posts\CreatePostCommand;
use function dd;

class CreatePostHandler
{
    public function handle(CreatePostCommand $command){
        dd($command->title,$command->description);
    }
}
