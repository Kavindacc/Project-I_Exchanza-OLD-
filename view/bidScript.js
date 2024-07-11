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
        
        updateCountdown();

        function formatPrice(value) {
            if (!isNaN(value) && value !== '') {
                return parseFloat(value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                return '0.00';
            }
        }

        $('#itemName').on('input', function(){
            let name = $(this).val()+'';
            console.log(name)
            $('#previewName').text(name);
        });

        $('#price').on('input', function () {
            let formattedValue = formatPrice($(this).val().replace(/,/g, ''));
            $('#previewPrice').text('Rs. ' + formattedValue);
        });

        $('#description').on('input', function () {
            $('#previewDescription').text($(this).val());
        });
        

        $('#bidstarttime').on('input', function () {

            var startTime = $('#bidstarttime').val();
            var endTime = $('#bitendtime').val();
    
            if (startTime && endTime) {
                var startDate = new Date(startTime);
                updateCountdown(startDate);
            } else {
                $('#countdown').text('00:00:00:00');
            }
        });

        $('#bitendtime').on('input', function () {

            var startTime = $('#bidstarttime').val();
            var endTime = $('#bitendtime').val();
    
            if (startTime && endTime) {
                
                if( new Date(endTime).getTime() - new Date(startTime).getTime() < 0){
                    document.getElementById('bitendtime3').value = null;
                }

            } else {
                $('#countdown').text('00:00:00:00');
            }
        });

        
    }

    function updateCountdown() {

        var interval = setInterval(function() {

            var startDate = $('#bidstarttime').val();
            var endTime = $('#bitendtime').val();
    
            if (!startDate) {
                $('#countdown').text('00:00:00:00');
            } else {




                var now = new Date().getTime();
                var distance = new Date(startDate).getTime() - now;
                
                if (distance < 0) {
                    clearInterval(interval);
                    $('#countdown').text('Bidding started');
                    document.getElementById('bidstarttime').value = null;
                    return;
                }
                
                if(distance <= 3600 * 10 * 1000){
                    $('#countdown').text('Start date should be more than 10 hours from the current date!');
                    // $('#bidstarttime').value(null)
                    document.getElementById('bidstarttime').value = null;
                    return
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $('#countdown').text(`${(days+'').padStart(2 , 0)}:${(hours+'').padStart(2 , 0)}:${(minutes+'').padStart(2 , 0)}:${(seconds+'').padStart(2 , 0)}`);
            }
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

