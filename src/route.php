<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class route extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Created a new class for routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routeclass = $this->argument('class');
        echo __DIR__;
        @mkdir(__DIR__ . "/../../Routes");
        if (!file_exists(__DIR__ . "/../../Routes/{$routeclass}.php")){
            file_put_contents(__DIR__ . "/../../Routes/{$routeclass}.php", "<?php
namespace App\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class $routeclass{
    public static function run(){
        // Create a Routes
    }
}");
            $Routes = file_get_contents(__DIR__ . "/../../../routes/web.php");
            file_put_contents(__DIR__ . "/../../../routes/web.php", $Routes . PHP_EOL . '\App\Routes\\' . $routeclass . '::run();');
        }
    }
}
