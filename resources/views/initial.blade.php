<x-guest-layout>

    <div class="step" data-step="0">
        <div class="vstack gap-4">
            <div>Welcome to the TuneUp 66 Fuel Saving Calculator</div>
        <div class="py-0 my-0">The TuneUp 66 website provides all kinds of scientific data and case studies to support the effectiveness of Engine Armour Tech.</div>

        <div class="py-0 my-0">Don't just take our word for it!</div>

        <div class="py-0 my-0">We developed the Fuel Savings Calculator so that you can input your own vehicles specifications and provide you with a simple output that demonstrates the projected cost savings by month and by year.</div>

        <div class="py-0 my-0">This output alone, will validate the small expense in utilizing Engine Armour Tech for all of your vehicles.</div>

            <div class="py-0 my-0">What the fuel savings calculator cannot do, is to demonstrate the increase in performance and reduction in engine wear that you will enjoy as well.  If you haven't already, please read the testimonials on the site located at <a href="https://tuneup66.com/#testimonials">https://tuneup66.com/#testimonials</a>.</div>

        <div class="py-0 my-0">All you have to do is follow the prompts and answer the questions.  The entire experience will take 5 minutes.Let's Get Started!</div>

            <div class="text-center">
                <div class="btn btn-success step0_choice text-white ms-auto" >Click Here To Get Started</div>
            </div>
        </div>
    </div>
    <div class="step" data-step="1">
        <div class="vstack gap-4">
            <div>Welcome to the TuneUp 66 Fuel Saving Calculator</div>
            <div>First we have to Determine what Fuel Economy you are already getting</div>
            <div>
                <div class="btn btn-success step1_choice text-white" data-value="0">I don’t know my current fuel economy and I need help calculating</div>
            </div>
            <div>
                <div class="btn btn-success step1_choice text-white" data-value="1">I know my current fuel Economy</div>
            </div>
        </div>
    </div>
    <div class="step" data-step="2">
        <div class="vstack gap-4">
            <div>Welcome to the TuneUp 66 Fuel Saving Calculator</div>
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

            <div class="theyKnow">
                <label for="m12">I currently get:</label>
                <div class="input-group">
                    <input type="number" class="form-control-lg form-control" name="mileage" id="m12" value=""  placeholder="0" aria-label="0">
                    <span class="input-group-text measurementLabel2"></span>
                </div>
            </div>


            <div class="theyDontKnow">
                <label for="m3">Enter the volume of Fuel you used (reading from the pump)</label>
                <div class="input-group">
                    <input type="number" class="form-control-lg form-control text-end" name="volumeUsed" id="m4" value=""  placeholder="0" aria-label="0">
                    <span class="input-group-text measurementLabel3"></span>
                </div>
            </div>
            <div class="theyDontKnow">
                <label for="m4">Enter the Distance from your Odometer</label>
                <div class="input-group">
                    <input type="number" class="form-control-lg form-control text-end" name="distance" id="m4" value=""  placeholder="0" aria-label="0">
                    <span class="input-group-text measurementLabel"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="step" data-step="5">
        <div class="vstack gap-4">

            <div class="">
                <label for="m5">What is your monthly Fuel (Gas) spending</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control-lg form-control" name="monthlyFuelSpending" id="m5" value=""  placeholder="0.00" aria-label="0.00">
                </div>
            </div>

            <div class="text-center font-bold fs-3">OR</div>

            <div class="">
                <label for="m6">What is your monthly Distance Driven</label>
                <div class="input-group">
                    <input type="number" class="form-control-lg form-control" name="monthlyDistance" id="m6" value=""  placeholder="123" aria-label="123">
                    <span class="input-group-text measurementLabel"></span>
                </div>
            </div>
            <div class="">
                <label for="m7">What is your price for Fuel (Gas)</label>
                <div class="input-group">
                    <span class="input-group-text ">$</span>
                    <input type="number" class="form-control-lg form-control" name="fuelPrice" id="m7" value=""  placeholder="3.75" aria-label="3.75">
                </div>
            </div>
        </div>
    </div>
    <div class="step" data-step="6">
        <div class="row">

            <div class="col-2">
                <label>Choose Your Car Year</label>
                <div class="ms-auto">
                    <select name="carYear" class="form-select form-select-lg carYear" size="10">
                    </select>
                </div>
            </div>

            <div class="carMakeContainer col">
                <label>Choose Your Car Make</label>
                <div class="ms-auto">
                    <select name="carMake" size="10" class="form-select form-select-lg carMake">
                    </select>
                </div>
            </div>
            <div class="carModelContainer col">
                <label>Choose Your Car Model</label>
                <div class="ms-auto">
                    <select name="carModel" size="10" class="form-select form-select-lg carModel">
                    </select>
                </div>
            </div>
            <div class="carTrimContainer col">
                <label>Choose Your Car Trim</label>
                <div class="ms-auto">
                    <select name="carTrim" size="10" class="form-select form-select-lg carTrim">
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

    
    <div class="btn btn-lg btn-success back">Back</div>
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
