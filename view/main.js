ScrollReveal({ 
    distance: '50px',
    duration: 2000,
    delay: 300,
});

ScrollReveal().reveal('.side-left,.thirf-left', { origin: 'left' });
ScrollReveal().reveal('.side-right,.thirf-right', { origin: 'right' });
ScrollReveal().reveal('.tread', { origin: 'bottom' });

function showItemTable() {//iteam button disable
    document.getElementById('itemtable').style.display = 'block';
    document.getElementById('producttable').style.display = 'none';
    document.getElementById('item').disabled = true;
    document.getElementById('order').disabled = false;
    document.getElementById('information').disabled = false;
    document.getElementById('item').style.background = ' #0275d8';
    document.getElementById('item').style.color = 'white';
    document.getElementById('order').style.background = '';
    document.getElementById('order').style.color = '';
    document.getElementById('information').style.background = '';
    document.getElementById('information').style.color = '';  
    
    
}

function showOrderTable() {//order button disable
    document.getElementById('itemtable').style.display = 'none';
    document.getElementById('producttable').style.display = 'block';
    document.getElementById('order').disabled = true;
    document.getElementById('item').disabled = false;
    document.getElementById('information').disabled = false;
    document.getElementById('order').style.background = ' #0275d8';
    document.getElementById('order').style.color = 'white';
    document.getElementById('item').style.background = '';
    document.getElementById('item').style.color = '';
    document.getElementById('information').style.background = '';
    document.getElementById('information').style.color = '';
   
}

function showInformation(){//information button disable
    document.getElementById('information').disabled = true;
    document.getElementById('order').disabled = false;
    document.getElementById('item').disabled = false;
    document.getElementById('information').style.background = ' #0275d8';
    document.getElementById('information').style.color = 'white';
    document.getElementById('item').style.background = '';
    document.getElementById('item').style.color = '';
    document.getElementById('order').style.background = ''; 
    document.getElementById('order').style.color = '';
    
}