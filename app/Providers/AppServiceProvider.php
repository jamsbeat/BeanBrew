<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Cashier;
use Laravel\Fortify\Fortify;
use App\Actions\Test\MigrateSessionCart;
use App\Factories\CartFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Money\Currencies\ISOCurrencies;
use Money\Money;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\Laravel\Fortify\FortifyServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Cashier::calculateTaxes();

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                \Log::info('User authenticated', ['user_id' => $user->id]);
                (new MigrateSessionCart())->migrate(
                    CartFactory::make(),
                    $user->cart ?: $user->cart()->firstOrCreate()
                );

                return $user;
            }
            \Log::warning('User authentication failed', ['email' => $request->email]);
        });

        Blade::stringable(function (Money $money){
            $currencies = new ISOCurrencies();
            $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
            $moneyFormatter = new \Money\Formatter\IntlMoneyFormatter($numberFormatter, $currencies);

            return $moneyFormatter->format($money);
        });
    }
}
