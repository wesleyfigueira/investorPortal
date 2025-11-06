// ====== DASHBOARD FRONT-END BEHAVIOR ======

// Smooth scroll for internal anchor links
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const targetId = link.getAttribute('href').substring(1);
    const targetSection = document.getElementById(targetId);

    if (targetSection) {
      window.scrollTo({
        top: targetSection.offsetTop - 60,
        behavior: 'smooth'
      });
    }
  });
});

// Section animation on scroll (fade-in effect)
const sections = document.querySelectorAll('section');

function revealSections() {
  const triggerBottom = window.innerHeight * 0.85;

  sections.forEach(section => {
    const boxTop = section.getBoundingClientRect().top;

    if (boxTop < triggerBottom) {
      section.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', revealSections);
revealSections();

// Toggle active anchor highlight
const anchors = document.querySelectorAll('.anchor-box');
anchors.forEach(anchor => {
  anchor.addEventListener('mouseenter', () => anchor.classList.add('active'));
  anchor.addEventListener('mouseleave', () => anchor.classList.remove('active'));
});

// ====== FORM SUCCESS OR ERROR FEEDBACK ======
const registerForm = document.querySelector('.register-form');

if (registerForm) {
  // Check if PHP rendered an error message
  const errorMessage = document.querySelector('.error-message');
  const successMessage = document.querySelector('.success-message');

  // Animate existing PHP messages
  const showMessage = (el) => {
    if (!el) return;
    el.style.opacity = "0";
    el.style.transform = "translateY(-10px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";

    // Show animation
    setTimeout(() => {
      el.style.opacity = "1";
      el.style.transform = "translateY(0)";
    }, 200);

    // Hide message automatically after 5s
    setTimeout(() => {
      el.style.opacity = "0";
      el.style.transform = "translateY(-10px)";
      setTimeout(() => el.remove(), 600);
    }, 5000);
  };

  // Show any server messages (PHP)
  showMessage(errorMessage);
  showMessage(successMessage);

  // Handle instant feedback before reload (optional animation)
  registerForm.addEventListener('submit', () => {
    const nameInput = registerForm.querySelector('input[name="name"]');
    const userName = nameInput?.value || "User";

    const tempMessage = document.createElement('div');
    tempMessage.classList.add('success-message');
    tempMessage.textContent = `${userName} was registered successfully!`;

    registerForm.insertAdjacentElement('afterend', tempMessage);

    tempMessage.style.opacity = "0";
    tempMessage.style.transform = "translateY(-10px)";
    tempMessage.style.transition = "opacity 0.5s ease, transform 0.5s ease";

    setTimeout(() => {
      tempMessage.style.opacity = "1";
      tempMessage.style.transform = "translateY(0)";
    }, 100);

    setTimeout(() => {
      tempMessage.style.opacity = "0";
      tempMessage.style.transform = "translateY(-10px)";
      setTimeout(() => tempMessage.remove(), 500);
    }, 4000);
  });
}
