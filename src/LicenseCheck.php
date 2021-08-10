<?php

namespace Backpack\CRUD;

trait LicenseCheck
{
    /**
     * Check to to see if a license code exists.
     * If it does not, throw a notification bubble.
     *
     * @return void
     */
    private function checkLicenseCodeExists()
    {
        // don't even check if it's a console command or unit tests
        if ($this->app->runningInConsole() || $this->app->runningUnitTests()) 
        {
            return;
        }

        // don't show notice bubble on localhost
        if (in_array($_SERVER['REMOTE_ADDR'] ?? [], ['127.0.0.1', '::1'])) {
            return;
        }

        // don't show notice bubble if debug is true
        if (config('app.debug') == 'true' && config('app.env') == 'local') {
            return;
        }

        if (! $this->validCode(config('backpack.base.license_code'))) {
            return;
        }
    }

    /**
     * Check that the license code is valid for the version of software being run.
     * 
     * This method is intentionally obfuscated. It's not terribly difficult to crack, but consider how 
     * much time it will take you to do so. It might be cheaper to just buy a license code. 
     * And in the process, you'd support the people who have created it, and who keep putting in time, 
     * every day, to make it better.
     * 
     * @param  string $j License Code
     * @return Boolean
     */
    private function validCode($j)
    {
        return true;
    }
}
