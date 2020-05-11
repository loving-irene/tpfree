<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tpfree:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'git上download下来之后安装composer和node依赖包';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $process=new Process(['ls','-A']);
        $process->run();

        if(!$process->isSuccessful()){
            throw new ProcessFailedException($process);
        }

        $this->info('composer finished.');

        $process=new Process(['touch','',]);
        $process->run();

        if(!$process->isSuccessful()){
            throw new ProcessFailedException($process);
        }

        $this->info('touch finished.');
    }
}
