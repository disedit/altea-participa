<?php

use App\Edition;
use App\Http\Middleware\InPerson;
use App\Http\Middleware\IpLimit;
use App\Http\Middleware\Language;
use App\Http\Middleware\VoteOpen;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Schema;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // The app never trimmed or nulled input before; keep it that way.
        $middleware->remove([
            TrimStrings::class,
            ConvertEmptyStringsToNull::class,
        ]);

        $middleware->appendToGroup('web', Language::class);

        // The API reads the encrypted "language" cookie, so it needs EncryptCookies.
        $middleware->group('api', [
            ThrottleRequests::class.':60,1',
            SubstituteBindings::class,
            EncryptCookies::class,
            Language::class,
        ]);

        $middleware->group('booth', [
            VoteOpen::class,
            InPerson::class,
            IpLimit::class,
        ]);

        $middleware->redirectUsersTo('/admin');
    })
    ->withSchedule(function (Schedule $schedule): void {
        if (! Schema::hasTable('editions')) {
            return;
        }

        // Calculate and cache the current edition's results when it closes
        $edition = Edition::current();

        if ($edition) {
            $endDate = strtotime($edition->end_date);
            $minute = (int) date('i', $endDate);
            $hour = date('G', $endDate);
            $day = date('j', $endDate);
            $month = date('n', $endDate);

            $schedule->command('results:cache')->cron("$minute $hour $day $month *");
        }
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
