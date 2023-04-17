document.querySelectorAll('.card img').forEach((img) => {
    img.addEventListener('click', (event) => {
      const modal = document.getElementById('modal');
      const modalImage = document.getElementById('modal-image');
      modal.style.display = 'block';
      modalImage.src = event.target.src;
    });
  });
  
  document.getElementById('close').addEventListener('click', () => {
    document.getElementById('modal').style.display = 'none';
  });
  
  window.addEventListener('click', (event) => {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  