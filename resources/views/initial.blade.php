<x-guest-layout>

    <div class="step" data-step="1">
        <div class="vstack gap-4">
            <div>Welcome to the Tuneup66 Fuel Saving Calculator</div>
            <div>First we have to Determine what Fuel Economy you are already getting</div>
            <div>
                <div class="btn btn-info step1_choice text-white" data-value="0">I don’t know my current fuel economy and I need help calculating</div>
            </div>
            <div>
                <div class="btn btn-info step1_choice text-white" data-value="1">I know my current fuel Economy</div>
            </div>
        </div>
    </div>
    <div class="step" data-step="2">
        <div class="vstack gap-4">
            <div>Welcome to the Tuneup66 Fuel Saving Calculator</div>
            <div>We can calculate this together</div>
            <div>Step 1</div>
            <div>Fill up your car/truck/SUV until is VERY full and cannot take anymore in the tank.  Reset your TRIP odometers until it is 0 or write down the exact value of your odometer.</div>
        </div>
    </div>
    <div class="step" data-step="3">
        <div class="vstack gap-4">

            <div>Drive your car normally until it is at least 3/4 empty ...get the fuel down as low as you can.</div>
            <div>Step 2</div>
            <div>Fill up your car/truck/SUV until is VERY full and cannot take anymore in the tank.</div>

            <div>Take note of the reading on the pump (how many gallons or litres you filled up with)</div>

            <div>Note the number of Miles or km you have travelled by looking at the Trip Odometer.</div>
        </div>
    </div>
    <div class="step" data-step="4">
        <div class="vstack gap-4">
            <div class="hstack">
                <div class=""><input type="radio" name="measurement" id="m2" value="miles" checked="checked" class="form-check-inline"></div>
                <label for="m2">I use Miles, Gallon and Miles Per Gallon</label>
            </div>
            <div class="hstack">
                <div class=""><input type="radio" name="measurement" id="m1" value="liters" class="form-check-inline"></div>
                <label for="m1">I use KM, Litres and L/100KM</label>
            </div>

            <div class=theyKnow"">
                <label for="m12">I currently get:</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="mileage" id="m12" value=""></div>
            </div>


            <div class="theyDontKnow">
                <label for="m3">Enter the volume of Fuel you used (reading from the pump)</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="volumeUsed" id="m3" value=""></div>
            </div>
            <div class="theyDontKnow">
                <label for="m4">Enter the Distance from your Odometer</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="distance" id="m4" value=""></div>
            </div>
        </div>
    </div>
    <div class="step" data-step="5">
        <div class="vstack gap-4">

            <div class="">
                <label for="m5">What is your monthly Fuel (Gas) spending</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="monthlyFuelSpending" id="m5" value=""></div>
            </div>

            <div>OR</div>

            <div class="">
                <label for="m6">What is your monthly Distance Driven</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="monthlyDistance" id="m6" value=""></div>
            </div>
            <div class="">
                <label for="m7">What is your price for Fuel (Gas) $X.XX for example $3.75</label>
                <div class="ms-auto"><input type="number" class="form-control-lg form-control" name="fuelPrice" id="m7" value=""></div>
            </div>
        </div>
    </div>
    <div class="step" data-step="6">
        <div class="vstack gap-4">

            <div class="">
                <label>Choose Your Car Year</label>
                <div class="ms-auto">
                    <select name="carYear" class="form-select form-select-lg carYear">
                        <option value="0">Select Car Year</option>
                    </select>
                </div>
            </div>

            <div class="carMakeContainer">
                <label>Choose Your Car Make</label>
                <div class="ms-auto">
                    <select name="carMake" class="form-select form-select-lg carMake">
                        <option value="0">Select Car Make</option>
                    </select>
                </div>
            </div>
            <div class="carModelContainer">
                <label>Choose Your Car Model</label>
                <div class="ms-auto">
                    <select name="carModel" class="form-select form-select-lg carModel">
                        <option value="0">Select Car Model</option>
                    </select>
                </div>
            </div>
            <div class="carTrimContainer">
                <label>Choose Your Car Trim</label>
                <div class="ms-auto">
                    <select name="carTrim" class="form-select form-select-lg carTrim">
                        <option value="0">Select Car Trim</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="step" data-step="7">
        <div class="vstack gap-4">
            <div class="hstack gap-4">

                <div class="">
                    <label for="m5">First Name</label>
                    <div class="ms-auto"><input type="text" class="form-control-lg form-control" name="firstName" id="m13" value=""></div>
                </div>
                <div class="">
                    <label for="m5">Last Name</label>
                    <div class="ms-auto"><input type="text" class="form-control-lg form-control" name="lastName" id="m14" value=""></div>
                </div>
            </div>


            <div class="">
                <label for="m6">Please enter your email address:</label>
                <div class="ms-auto"><input type="email" class="form-control-lg form-control" name="email" id="m15" value=""></div>
            </div>
            <div>We will email you results and projected fuel savings</div>

        </div>
    </div>

    <div class="step" data-step="end">
        <div class="vstack gap-4">
            <div class="">
                Thank you for completing the fuel savings calculator.
            </div>
            <div>
                We will email you the results. You will not be disappointed!
            </div>
            <div>
                If you would like to purchase Engine Armour Tech now so that you can increase your vehicles performance and get started saving money, <a href="https://tuneup66.com/product/engine-armour-tech/" target="_blank">click here</a>.
            </div>

        </div>
    </div>

    <hr>
    <div class="btn btn-lg btn-success proceed">Next</div>
    <div class="btn btn-lg btn-success finish">Finish</div>
<input type="hidden" name="targetEconomy" id="targetEconomy">
<input type="hidden" name="carID" id="carID">
    <script type="module">
        $(function (){
            start()
        })
    </script>

</x-guest-layout>
