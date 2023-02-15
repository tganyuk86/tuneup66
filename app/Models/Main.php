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
        "targetEconomy",
        "carID"
    ];

    public function addCalcs(){
        if($this->volumeUsed && $this->distance){
            if($this->measurement === 'liters') {
                $this->mileage = $this->volumeUsed / $this->distance * 100;
            }else{
                $this->mileage = $this->distance / $this->volumeUsed;
            }
        }
        $this->initialEconomy = $this->mileage;
        if($this->measurement === 'liters') {
            $this->targetEconomy = 235.215 / $this->targetEconomy;// * 1.609344 / 3.78541178;
            $this->savingsPercent = (($this->initialEconomy - $this->targetEconomy) / $this->targetEconomy );
        }else{
            $this->savingsPercent = ( ($this->targetEconomy - $this->initialEconomy ) /  $this->initialEconomy);

        }
        if($this->monthlyFuelSpending === "0"){
            if($this->measurement === 'liters') {
                $x = $this->mileage / 100 * $this->monthlyDistance;
            }else{
                $x =  $this->monthlyDistance / $this->mileage;
            }
            $this->monthlyFuelSpending = $x * $this->fuelPrice;
        }
        $this->savingsMonthly = $this->monthlyFuelSpending * $this->savingsPercent;
        $this->savingsYearly = $this->savingsMonthly * 12;
        $this->payback = $this->savingsMonthly > 0 ? 35/$this->savingsMonthly : 0;
        //price: $35
    }

    public function formatCols(){
        $msr = $this->measurement === 'miles' ? ' MPG' : 'L/100km';
        $msr2 = $this->measurement === 'miles' ? 'Miles' : 'km';
        $msr3 = $this->measurement === 'miles' ? 'Gal' : 'L';
        $this->monthlyDistance = $this->monthlyDistance . ' '. $msr2;
        $this->monthlyFuelSpending = '$'.number_format($this->monthlyFuelSpending);
        if($this->fuelPrice === 0)
            $this->fuelPrice = 'N/A';
        else
            $this->fuelPrice = '$'.number_format($this->fuelPrice,2).'/'.$msr3;
        $this->distance = number_format($this->distance,0).$msr2;
        $this->initialEconomy = number_format($this->initialEconomy,2).$msr;
        $this->targetEconomy = number_format($this->targetEconomy,2).$msr;
        $this->savingsPercent = number_format($this->savingsPercent*100,0).'%';
        $this->savingsMonthly = '$'.number_format($this->savingsMonthly,2);
        $this->savingsYearly = '$'.number_format($this->savingsYearly,2);
        $this->payback = number_format($this->payback,2);
        $this->measurement = $this->measurement === 'miles' ? 'Imperial/USA' : 'Metric';
    }

    public function cols(){
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
                'savingsPercent' => 'Projected Saving %',
                'savingsMonthly' => 'Projected Overall Savings Per Month',
                'savingsYearly' => 'Projected Overall Savings Per Year',
                'payback' => 'Months to Payback from TuneUp 66',

                "measurement" => 'Measurement:',
                "carYear" => 'Vehicle Year',
                "carMake" => 'Vehicle Make',
                "carModel" => 'Vehicle Model',
                "carTrim" => 'Vehicle Trim',
                'initialEconomy' => 'Vehicle Initial Fuel Economy:',

                "monthlyFuelSpending" => 'Monthly Fuel Spend',
                "monthlyDistance" => 'Monthly Distance (Optional)',
                "fuelPrice" => 'Current Fuel Price',

                'targetEconomy' => 'Target Fuel Economy',
            ],

        ];
    }

}
