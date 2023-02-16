<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body style="font-family: Arial; font-size: 14pt">
<div >
    <div >
        <div  >
            <div><img src="{{env('APP_URL')}}/logo.png"></div>
            <div><h1>Fuel Saving Calculator </h1></div>
        </div>
    </div>

    <div >
        <p>Dear {{$firstName}},</p>
        <p>
            Thank you for using the TuneUp 66 Fuel Savings Calculator.
        </p>
        <p>
            Your projected savings by using Engine Armour Tech, based on your automobiles make, model, and year are
            highlighted below!
        </p>
        <p>
            It’s easy to see how one container of Engine Armour Tech in your car provides true measurable savings
            that more than make up the cost of the treatment
        </p>
        <p>
            Click the Buy Now button below to purchase Engine Armour Tech for your car.  While you are at it,
            purchase a few bottles for your other vehicles as well.  The more you buy, the more you save!
        </p>
        <table  style="" width="50%">
            @foreach($displayRows as $key => $title)
                <tr  style="{{$loop->odd ? 'background-color: #ddd' : ''}}">
                    <td style="padding: 10px; {{$key === 'savingsYearly' ? 'font-weight: 900' :''}}">{{$title}}</td>
                    <td style="padding: 10px; {{$key === 'savingsYearly' ? 'font-weight: 900' :''}}">{{$$key??$mailData[$key]??0}}</td>
                </tr>
            @endforeach
        </table>
        <hr>
        <a href="https://tuneup66.com/product/engine-armour-tech/">
        <div><img src="{{env('APP_URL')}}/product.png" height="400px"></div>
        <div><img src="{{env('APP_URL')}}/buynow.png" height="100px"></div>
        </a>
    </div>
</div>
</body>
</html>

