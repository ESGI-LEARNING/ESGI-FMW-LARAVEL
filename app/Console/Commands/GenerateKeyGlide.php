<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateKeyGlide extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = ' app:generate-glide-key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génération key GLIDE_KEY in file .env.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $key = Str::random(40);

        $this->setEnv($key);
        $this->info('GLIDE_KEY generated and set in the .env file.');
    }

    private function setEnv(string $value): void
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $envFile = File::get($path);

            $newEnvValue   = 'GLIDE_KEY'.'='.$value;
            $existingValue = env('GLIDE_KEY');

            if ($existingValue) {
                $envFile = str_replace('GLIDE_KEY'.'='.$existingValue, $newEnvValue, $envFile);
            } else {
                $envFile .= "\n".$newEnvValue;
            }

            File::put($path, $envFile);
            $this->call('config:clear');
        }
    }
}
