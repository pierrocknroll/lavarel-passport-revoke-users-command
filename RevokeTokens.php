<?php

namespace Pierrocknroll\LavarelPassportRevokeUsersCommand;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RevokeTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:revoke {user* : List of users ids or emails}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revoke access and refresh tokens of given users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = $this->argument('user');
        $ids = []; // List of access tokens
        foreach ($users as $user)
        {
            $userModel = null;
            if (is_numeric($user))
                $userModel = User::find($user);
            elseif (filter_var($user, FILTER_VALIDATE_EMAIL))
                $userModel = User::where('email', $user)->first();

            if (!$userModel) {
                $this->warn('Unknown user ' . $user);
                continue;
            }

            $ids = array_merge($userModel->tokens()->pluck('id')->all(), $ids);
        }

        // Revoke all access tokens
        DB::table('oauth_access_tokens')
            ->whereIn('id', $ids)
            ->where('revoked', false)
            ->update(['revoked' => true]);

        // Revoke all refresh tokens
        DB::table('oauth_refresh_tokens')
            ->whereIn('access_token_id', $ids)
            ->where('revoked', false)
            ->update(['revoked' => true]);
    }
}
