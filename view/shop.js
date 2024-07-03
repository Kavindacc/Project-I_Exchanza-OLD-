document.addEventListener('DOMContentLoaded', () => {
    const items = [
      { imgSrc: 'https://via.placeholder.com/150', title: 'Original Penguin Cotton Shirt', size: 'Size M', price: 'Rs.10.50' },
      { imgSrc: 'https://via.placeholder.com/150', title: 'Hollister Cotton Shirt', size: 'Size M', price: 'Rs.10.50' },
      { imgSrc: 'https://via.placeholder.com/150', title: 'Carrera Shirt', size: 'Size M', price: 'Rs.18.75' },
      { imgSrc: 'https://via.placeholder.com/150', title: 'Gap Cotton Shirt', size: 'Size XL', price: 'Rs.21.25' },
      { imgSrc: 'https://via.placeholder.com/150', title: 'Luke Cotton Shirt', size: 'Size M', price: 'Rs.22.75' }
    ];

    const template = document.getElementById('itemTemplate');
    const container = document.getElementById('itemContainer');

    items.forEach(item => {
      const clone = template.content.cloneNode(true);
      const img = clone.querySelector('img');
      const title = clone.querySelector('.card-title');
      const size = clone.querySelector('.card-text:nth-child(2)');
      const price = clone.querySelector('.card-text:nth-child(3)');

      img.src = item.imgSrc;
      img.alt = item.title;
      title.textContent = item.title;
      size.textContent = item.size;
      price.textContent = item.price;

      container.appendChild(clone);
    });
  });

  function changeImage(element) {
    document.getElementById('mainImage').src = element.src;
}

document.querySelector('.product-image-container').addEventListener('mousemove', function (e) {
    const image = document.querySelector('.product-image');
    const container = e.currentTarget;
    const containerRect = container.getBoundingClientRect();
    const xPos = e.clientX - containerRect.left;
    const yPos = e.clientY - containerRect.top;
    const xPercent = (xPos / containerRect.width) * 100;
    const yPercent = (yPos / containerRect.height) * 100;
    image.style.transformOrigin = `${xPercent}% ${yPercent}%`;
});

document.getElementById('heartIcon').addEventListener('click', function () {
    const toast = document.getElementById('toast');
    const toastBody = document.getElementById('toastBody');
    const isFilled = this.classList.toggle('filled');

    toastBody.textContent = isFilled ? 'Added to wishlist' : 'Removed from wishlist';

    $('.toast').toast({ delay: 3000 });
    $('.toast').toast('show');
});