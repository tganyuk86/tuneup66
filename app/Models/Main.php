<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Main extends Authenticatable
{
    protected $table = 'main';
    protected $fillable = [
        "measurement",
        "mileage",
        "volumeUsed",
        "distance",
        "monthlyFuelSpending",
        "monthlyDistance",
        "fuelPrice",
        "carYear",
        "carMake",
        "carModel",
        "firstName",
        "lastName",
        "email",
    ];

    public function addCalcs(){
        $this->initialEconomy = '0';
        $this->targetEconomy = '';
        $this->savingsPercent = '';
        $this->savingsMonthly = '';
        $this->savingsYearly = '';
        $this->payback = '';
    }

    public static function cols(){
        return [
            "data" => [
                "firstName" => 'First Name',
                "lastName" => 'Last Name',
                "email" => 'Email',
                "mileage" => 'Mileage',
                "volumeUsed" => 'Volume Used',
                "distance" => 'Distance',
            ],
            "display" => [
                "measurement" => 'Measurement: Metric or Imperial/USA',
                "carMake" => 'Vehicle  Make',
                "carModel" => 'Vehicle  Model',
                "carYear" => 'Vehicle Year',
                'initialEconomy' => 'Vehicle Initial Fuel Economy:  MPG or L/100km',

                "monthlyFuelSpending" => 'Monthly Fuel Spend',
                "monthlyDistance" => 'Monthly Distance (Optional)',
                "fuelPrice" => 'Current Fuel Price',

                'targetEconomy' => 'Target Fuel Economy',
                'savingsPercent' => 'Projected Saving %',
                'savingsMonthly' => 'Projected Overall Savings Per Month',
                'savingsYearly' => 'Projected Overall Savings Per Year',
                'payback' => 'Months to Payback from TuneUp66',
            ],

        ];
    }

}
