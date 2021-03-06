<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Usub\Core\UsubService;
use Usub\Core\UsubTokenRepository;
use Usub\Models\UsubToken;

class ClearUsubTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usub:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting expired tokens from database.';

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
     * @throws \Exception
     */
    public function handle()
    {
        $repo    = new UsubTokenRepository( new UsubToken() );
        $service = new UsubService( $repo );

        // Returns count of deleted rows
        $repo->deleteExpiredTokens( $service->getTokenExpirationDate() );
    }
}
