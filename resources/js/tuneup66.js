let currentStep = false
let theyKnow = false
let year = false
let make = false
let model = false
let trim = false

export function start() {
    console.log('Starting!')
    currentStep = 0
    showStep(0)
    $('.theyDontKnow').hide()
    $('.theyKnow').hide()

    $('.prev').on('click', prevStep)
    $('.next').on('click', nextStep)

    $('.carMakeContainer, .carModelContainer, .carTrimContainer').hide();


    $('.step0_choice').on('click', function (){
        showStep(1)
    })

    $('.step1_choice').on('click', function (){
        let v = $(this).data('value')
        if(v === 1){
            theyKnow = true
            showStep(4)
            $('.theyKnow').show()
        }else{
            theyKnow = false
            showStep(2)
            $('.theyDontKnow').show()
        }
    })

    loadCarYears()

    $('.carYear').on('change', function (){
        year = $(this).val()
        loadCarMake()
        trim = false
        $('.carMakeContainer').show()
    })
    $('.carMake').on('change', function (){
        make = $(this).val()
        $('.carModelContainer').show()
        trim = false
        loadCarModels()
    })
    $('.carModel').on('change', function (){
        $('.carTrimContainer').show()
        model = $(this).val()
        loadCarTrim()
        trim = false
    })
    $('.carTrim').on('change', function (){
        trim = $(this).val()
        $('#carID').val(trim)
        console.log(trim)
        loadCarMPG()
    })

    $('.proceed').on('click', function (){
        if(validateStep())
            nextStep()
    })

    $('.finish').on('click', function (){
        if(validateStep()) {
            save()
            showStep('end')
        }
    })
    $('.preview').on('click', function (){
        if($(this).data('id') > 0)
        window.open('/testMail/'+$(this).data('id'))
    })

}

function save(){
    let x = $('input, select', '.mainContainer').serializeArray()

    console.log(x)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '/save',
        dataType: 'json',
        data: x
    }).then(data => {
        console.log(data)
        $('.preview').data('id', data.id)
    })
}

function validateStep(){
    let out = true
    clearInvalid()
    if(currentStep === 4){
        if(theyKnow) {
            let o = $('#m12')
            if (o.val() === '') {
                out = false
                setInvalid(o)
            }
        }else{
            let o = $('#m3')
            if (o.val() === '') {
                out = false
                setInvalid(o)
            }
            o = $('#m4')
            if (o.val() === '') {
                out = false
                setInvalid(o)
            }
        }
    }
    if(currentStep === 5) {
        let o = $('#m5')
        let x = $('#m6')
        let y = $('#m7')
        if (o.val() === '' && x.val() === '' && y.val() === '') {
            out = false
        }
        else if (x.val() === '' && y.val() !== '') {
            setInvalid(x)
            out = false
        }
        else if (x.val() !== '' && y.val() === '') {
            setInvalid(y)
            out = false
        }
    }
    if(currentStep === 6) {
        if (!trim) {
            out = false
            alert('Please select your vehicle')
        }
    }
    if(currentStep === 7) {
        let o = $('#m13')
        if (o.val() === '') {
            out = false
            setInvalid(o)
        }
        o = $('#m14')
        if (o.val() === '') {
            out = false
            setInvalid(o)
        }
        o = $('#m15')
        if (o.val() === '') {
            out = false
            setInvalid(o)
        }
    }
        // let obj = $('[data-step="'+currentStep+'"]')
    // $('input, select', obj).each(function (){
    //     if($(this).val() === ''){
    //         console.log('cant be empty', this)
    //         out = false
    //     }
    // })
    return out
}

function setInvalid(obj){
    let text = $('<div>').addClass('text-danger errorText').html('Please fill this before continuing')
    obj.addClass('border-danger')
        .parent().append(text)
}

function clearInvalid(){
    $('.errorText').remove()
    $('input').removeClass('border-danger')
}

function nextStep() {
    hideSteps()
    currentStep += 1
    showStep(currentStep)

}

function prevStep() {
    hideSteps()
    currentStep -= 1
    showStep(currentStep)

}

function showStep(num) {
    hideSteps()
    currentStep = num
    let lastStep = $('.step').length-1

    $('[data-step="' + num + '"]').show()
    if(num === 'end')
    {
        $('.proceed, .finish').hide()
    }else{
        $('.proceed').toggle(num > 1 && num !== lastStep)
        $('.finish').toggle(num === lastStep)
    }
    console.log('Setep', num)
}


function hideSteps() {
    $('.step').hide()
}


function loadMPG(id){
    const jsonSource = 'https://www.fueleconomy.gov/ws/rest/vehicle/'+id;
    $.ajax({
        url: jsonSource,
        dataType: 'json'
    }).then(data => {
        $('#targetEconomy').val(data.comb08)
        console.log(data, data.comb08)
    });
}

function loadList(url, target){
    const jsonSource = 'https://www.fueleconomy.gov/ws/rest/vehicle/menu/'+url;
    $(target).html('<option value="0">Make A Selection</option>')
    $.ajax({
        url: jsonSource,
        dataType: 'json'
    }).then(data => {
        for(let x of data.menuItem){
            let opt = $('<option>').val(x.value).html(x.text)
            $(target).append(opt)
        }
    });
}

function loadCarYears(){
    loadList( 'year','.carYear')
}

function loadCarModels(){
    loadList( 'model?year='+year+'&make='+make,'.carModel')
}

function loadCarMake(){
    loadList( 'make?year='+year,'.carMake')
}

function loadCarTrim(){
    loadList( 'options?year='+year+'&make='+make+'&model='+model,'.carTrim')
}

function loadCarMPG(){
    loadMPG( trim)
}
