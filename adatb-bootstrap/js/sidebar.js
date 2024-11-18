const sidebarOpener = document.querySelector('.openSidebar')
const sidebar = document.querySelector('.sidebar')
const body = document.querySelector('body')

function openSidebar() {
    sidebar.classList.toggle('close')
    body.classList.toggle('close')
}

//DARK MODE - LIGHT MODE

const themeToggleButton = document.getElementById('theme-toggle')
const themeToggleIcon = document.getElementById('themeToggleIcon')

// Check if there's a saved theme preference in localStorage
const currentTheme = localStorage.getItem('theme')

// Apply the saved theme if available
if (currentTheme) {
  document.body.classList.add(currentTheme)
}

if (document.body.classList.contains('dark-mode')) {
  themeToggleIcon.classList.replace("bxs-moon", "bx-sun")
}

// Toggle theme when the button is clicked
themeToggleButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode')

  // Save the user's preference to localStorage
  if (document.body.classList.contains('dark-mode')) {
    localStorage.setItem('theme', 'dark-mode')
    themeToggleIcon.classList.replace("bxs-moon", "bx-sun")
  } else {
    localStorage.setItem('theme', 'light-mode')
    themeToggleIcon.classList.replace("bx-sun", "bxs-moon")
  }
});

// TOAST FOR SWITCHING MODES