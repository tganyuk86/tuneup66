<x-guest-layout>
    <p>Dear {{$firstName}},</p>
    <p>
        Thank you for using the TuneUp 66 Fuel Savings Calculator.
    </p>
    <p>
        Your projected savings by using Engine Armour Tech, based on your automobiles make, model, and year are highlighted below!
    </p>
    <p>
        It’s easy to see how one container of Engine Armour Tech in your car provides true measurable savings that more than make up the cost of the treatment
    </p>
    <p>
        Click the Buy Now button below to purchase Engine Armour Tech for your car.  While you are at it, purchase a few bottles for your other vehicles as well.  The more you buy, the more you save!
    </p>
    <table class="" style="" width="50%">
        @foreach($displayRows as $key => $title)
        <tr class="" style="{{$loop->odd ? 'background-color: #ddd' : ''}}">
            <td style=" {{$key === 'savingsYearly' ? 'font-weight: 900' :''}}">{{$title}}</td>
            <td style=" {{$key === 'savingsYearly' ? 'font-weight: 900' :''}}">{{$$key??$mailData[$key]??0}}</td>
        </tr>
        @endforeach
    </table>



</x-guest-layout>
