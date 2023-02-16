let currentStep = 0
let theyKnow = false
let year = false
let make = false
let model = false
let trim = false
let measure = 'miles'

export function start() {
    showStep(0)
    $('.back').hide()
    $('.prev, .back').on('click', prevStep)
    $('.next').on('click', nextStep)

    $(window).on('keydown', function (e){
        console.log(e.originalEvent)
        if(e.originalEvent.keyCode === 13){
            if(currentStep > 3 && validateStep()) {
                nextStep()
            }
        }
    })

    $('.carMakeContainer, .carModelContainer, .carTrimContainer').hide();


    $('.step0_choice').on('click', function () {
        showStep(1)
    })

    $('#m1, #m2').on('click', function () {
        measure = $(this).val()
        updateMeasures()
    })

    $('.step1_choice').on('click', function () {
        let v = $(this).data('value')
        $('.back').show()
        $('.theyDontKnow, .theyKnow').hide()
        if (v === 1) {
            theyKnow = true
            showStep(4)
            $('.theyKnow').show()
        } else {
            theyKnow = false
            showStep(2)
            $('.theyDontKnow').show()
        }
    })

    loadCarYears()
    updateMeasures()

    $('.carYear').on('change', function () {
        year = $(this).val()
        loadCarMake()
        trim = false
        $('.carMakeContainer').show()
    })
    $('.carMake').on('change', function () {
        make = $(this).val()
        $('.carModelContainer').show()
        trim = false
        loadCarModels()
    })
    $('.carModel').on('change', function () {
        $('.carTrimContainer').show()
        model = $(this).val()
        loadCarTrim()
        trim = false
    })
    $('.carTrim').on('change', function () {
        trim = $(this).val()
        $('#carID').val(trim)
        loadCarMPG()
    })

    $('.proceed').on('click', function () {
        if (validateStep())
            nextStep()
    })

    $('.finish').on('click', function () {
        if (validateStep()) {
            save()
            showStep('end')
        }
    })
    $('.preview').on('click', function () {
        if ($(this).data('id') > 0)
            window.open('/testMail/' + $(this).data('id'))
    })

    $('#m5').on('keyup', function () {
        $('#m6, #m7').prop('disabled', $(this).val() !== '')
    })

    $('#m6, #m7').on('keyup', function () {
        $('#m5').prop('disabled', $(this).val() !== '')
    })

}

function save() {
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
        $('.preview').data('id', data.id)
    })
}

function validateStep() {
    let out = true
    clearInvalid()
    if (currentStep === 4) {
        if (theyKnow) {
            let o = $('#m12')
            if (o.val() === '') {
                out = false
                setInvalid(o)
            }
        } else {
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
    if (currentStep === 5) {
        let o = $('#m5')
        let x = $('#m6')
        let y = $('#m7')
        if (o.val() === '' && x.val() === '' && y.val() === '') {
            out = false
        } else if (x.val() === '' && y.val() !== '') {
            setInvalid(x)
            out = false
        } else if (x.val() !== '' && y.val() === '') {
            setInvalid(y)
            out = false
        }
    }
    if (currentStep === 6) {
        if (!trim) {
            out = false
            alert('Please select your vehicle')
        }
    }
    if (currentStep === 7) {
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
    return out
}

function setInvalid(obj) {
    let text = $('<div>').addClass('text-danger errorText').html('Please fill this before continuing')
    obj.addClass('border-danger')
        .parent().parent().append(text)
}

function clearInvalid() {
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
    if (theyKnow && currentStep === 4) {
        currentStep = 1

    } else
        currentStep -= 1
    showStep(currentStep)

}

function showStep(num) {
    hideSteps()
    currentStep = num
    let lastStep = $('.step').length - 2

    $('[data-step="' + num + '"]').show()
    if (num === 'end') {
        $('.back').hide()
        $('.proceed, .finish').hide()
    } else {
        $('.proceed').toggle(num > 1 && num !== lastStep)
        $('.finish').toggle(num === lastStep)
        $('.back').toggle(num > 1)
    }
}


function hideSteps() {
    $('.step').hide()
}


function loadMPG(id) {
    const jsonSource = 'https://www.fueleconomy.gov/ws/rest/vehicle/' + id;
    $.ajax({
        url: jsonSource,
        dataType: 'json'
    }).then(data => {
        $('#targetEconomy').val(data.comb08)
    });
}

function loadList(url, target) {
    const jsonSource = 'https://www.fueleconomy.gov/ws/rest/vehicle/menu/' + url;
    $(target).html('')
    $.ajax({
        url: jsonSource,
        dataType: 'json'
    }).then(data => {
        if (data.menuItem.text) {
            let opt = $('<option>').val(data.menuItem.value).html(data.menuItem.text)
            $(target).append(opt)
            return;
        }
        for (let x of data.menuItem) {
            let opt = $('<option>').val(x.value).html(x.text)
            $(target).append(opt)
        }
    });
}

function loadCarYears() {
    loadList('year', '.carYear')
}

function loadCarModels() {
    loadList('model?year=' + year + '&make=' + make, '.carModel')
}

function loadCarMake() {
    loadList('make?year=' + year, '.carMake')
}

function loadCarTrim() {
    loadList('options?year=' + year + '&make=' + make + '&model=' + model, '.carTrim')
}

function loadCarMPG() {
    loadMPG(trim)
}

function updateMeasures() {
    if (measure === 'miles') {
        $('.measurementLabel').html('Miles')
        $('.measurementLabel2').html('MPG')
        $('.measurementLabel3').html('Gal')
    } else {
        $('.measurementLabel').html('km')
        $('.measurementLabel2').html('L/100km')
        $('.measurementLabel3').html('L')
    }
}
