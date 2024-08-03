// Slider functionality
const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

// Background Popup Window
function addBidForm() {
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
    });

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});

// DOM ready
document.addEventListener('DOMContentLoaded', function() {
    function updatePreview() {
        updateCountdown();

        function formatPrice(value) {
            if (!isNaN(value) && value !== '') {
                return parseFloat(value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                return '0.00';
            }
        }

        document.getElementById('itemName').addEventListener('input', function() {
            let name = this.value;
            document.getElementById('previewName').innerText = name;
        });

        document.getElementById('price').addEventListener('input', function() {
            let formattedValue = formatPrice(this.value.replace(/,/g, ''));
            document.getElementById('previewPrice').innerText = 'Rs. ' + formattedValue;
        });

        document.getElementById('description').addEventListener('input', function() {
            document.getElementById('previewDescription').innerText = this.value;
        });

        document.getElementById('bidstarttime').addEventListener('input', function() {
            var startTime = this.value;
            var endTime = document.getElementById('bitendtime').value;

            if (startTime && endTime) {
                var startDate = new Date(startTime);
                updateCountdown(startDate);
            } else {
                document.getElementById('countdown').innerText = '00:00:00:00';
            }
        });

        document.getElementById('bitendtime').addEventListener('input', function() {
            var startTime = document.getElementById('bidstarttime').value;
            var endTime = this.value;

            if (startTime && endTime) {
                if (new Date(endTime).getTime() - new Date(startTime).getTime() < 0) {
                    this.value = null;
                }
            } else {
                document.getElementById('countdown').innerText = '00:00:00:00';
            }
        });
    }

    function updateCountdown() {
        var interval = setInterval(function() {
            var startDate = document.getElementById('bidstarttime').value;
            var endTime = document.getElementById('bitendtime').value;

            if (!startDate) {
                document.getElementById('countdown').innerText = '00:00:00:00';
            } else {
                var now = new Date().getTime();
                var distance = new Date(startDate).getTime() - now;

                if (distance < 0) {
                    clearInterval(interval);
                    document.getElementById('countdown').innerText = 'Bidding started';
                    document.getElementById('bidstarttime').value = null;
                    return;
                }

                if (distance <= 3600 * 10 * 1000) {
                    document.getElementById('countdown').innerText = 'Start date should be more than 10 hours from the current date!';
                    document.getElementById('bidstarttime').value = null;
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('countdown').innerText = `${(days + '').padStart(2, '0')}:${(hours + '').padStart(2, '0')}:${(minutes + '').padStart(2, '0')}:${(seconds + '').padStart(2, '0')}`;
            }
        }, 1000);
    }


    document.getElementById('itemName').addEventListener('input', updatePreview);
    document.getElementById('price').addEventListener('input', updatePreview);
    document.getElementById('description').addEventListener('input', updatePreview);
    document.getElementById('bidstarttime').addEventListener('input', updatePreview);
    document.getElementById('bitendtime').addEventListener('input', updatePreview);

    document.getElementById('coverImage').addEventListener('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });

    // Initial update to ensure preview is in sync when page loads
    updatePreview();
});



