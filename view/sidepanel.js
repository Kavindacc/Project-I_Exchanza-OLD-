document.getElementById('openPanel').addEventListener('click', function() {
    document.getElementById('sidePanel').style.right = '0';
});

document.getElementById('closePanel').addEventListener('click', function() {
    document.getElementById('sidePanel').style.right = '-250px';
});
  
function showForm() {
    document.getElementById('popupForm').style.display = 'block';
}

document.getElementById('closePopup').addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'none';
});

$(document).ready(function() {
    $('#category').change(function() {
        var category = $(this).val();
        if (category === 'women') {
            $('#subcategoryWrapper').removeClass('hidden');
        } else {
            $('#subcategoryWrapper').addClass('hidden');
            $('#sizeChartWrapper').addClass('hidden');
            $('#subcategory').val('');
        }
        updatePreview();
    });

    $('#subcategory').change(function() {
        var subcategory = $(this).val();
        if (subcategory === 'tops') {
            $('#sizeChartWrapper').removeClass('hidden');
        } else {
            $('#sizeChartWrapper').addClass('hidden');
            $('input[name="size"]').prop('checked', false);
        }
        updatePreview();
    });

    $('#itemName, #price, #description, #timesUsed').on('input', function() {
        updatePreview();
    });

    $('#color').change(function() {
        $('#previewName').css('color', $(this).val());
    });

    $('#coverImage').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('input[name="size"]').change(function() {
        updatePreview();
    });

    $('#resellForm').submit(function(event) {
        var form = this;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    function updatePreview() {
        $('#previewName').text($('#itemName').val());
        $('#previewPrice').text('Rs. ' + $('#price').val());
        $('#previewDescription').text($('#description').val());
        $('#previewCategory').text($('#category option:selected').text());
        $('#previewSubcategory').text($('#subcategory option:selected').text());
        $('#previewTimesUsed').text('Times Used: ' + $('#timesUsed').val());
        var selectedSize = $('input[name="size"]:checked').val();
        $('#previewSize').text(selectedSize ? 'Size: ' + selectedSize : '');
    }
});
