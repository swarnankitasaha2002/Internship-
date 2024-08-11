// script.js
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach((dropdown) => {
  const dropdownContent = dropdown.querySelector('.dropdown-content');
  const dropdownButton = dropdown.querySelector('.dropbtn');

  dropdownButton.addEventListener('click', () => {
    dropdownContent.classList.toggle('show');
  });

  window.addEventListener('click', (event) => {
    if (!dropdown.contains(event.target)) {
      dropdownContent.classList.remove('show');
    }
  });
});