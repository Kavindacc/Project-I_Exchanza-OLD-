const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

//background Popup Window

function addBidForm(){
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var bidpopupform = document.getElementById('bidpopupform');
    bidpopupform.classList.toggle('active');
}




// Slider
productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
});

$(document).ready(function() {
    function updatePreview() {
        
        

        function formatPrice(value) {
            if (!isNaN(value) && value !== '') {
                return parseFloat(value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                return '0.00';
            }
        }

        $('#itemName').on('input', function(){
            $('#previewName').text($(this).val());
        });

        $('#price').on('input', function () {
            let formattedValue = formatPrice($(this).val().replace(/,/g, ''));
            $('#previewPrice').text('Rs. ' + formattedValue);
        });

        $('#description').on('input', function () {
            $('#previewDescription').text($(this).val());
        });
        
        // var startTime = $('#bidstarttime').val();
        // if (startTime) {
        //     var startDate = new Date(startTime);
        //     updateCountdown(startDate);
        // } else {
        //     $('#countdown').text('00:00:00:00');
        // }
    }

    function updateCountdown(startDate) {
        var interval = setInterval(function() {
            var now = new Date().getTime();
            var distance = startDate - now;

            if (distance < 0) {
                clearInterval(interval);
                $('#countdown').text('Bidding started');
                return;
            }

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $('#countdown').text(`${days}:${hours}:${minutes}:${seconds}`);
        }, 1000);
    }

    $('#itemName, #price, #description, #bidstarttime, #bidendtime').on('input change', function() {
        updatePreview();
    });

    $('#coverImage').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    // Initial update to ensure preview is in sync when page loads
    updatePreview();
});

