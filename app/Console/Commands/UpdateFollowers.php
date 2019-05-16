<?php

namespace App\Console\Commands;

use App\Account;
use App\Fuelgram;
use Illuminate\Console\Command;

class UpdateFollowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:followers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'AutoUpdate Followers Instagram';

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
        $accounts = Account::all();

        foreach($accounts as $account) {
            $data = new Fuelgram();
            $data = $data->create_account($account->username, '123456');

            if($data AND isset($data->content->user)){
                $account->avatar = $data->content->avatar;
                $account->followed_count = $data->content->followed_count;
                $account->follower_count = $data->content->follower_count;
                $account->media_count = $data->content->media_count;
                $account->save();
            }
        }
    }
}
