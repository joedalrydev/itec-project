function displayModal() {
  //kinukuha yung mga elements sa html
  const modal = document.getElementById("addToListModal");
  const btn = document.getElementById("addToListBtn");
  const closeBtn = document.querySelector(".close");

  if (!modal || !btn || !closeBtn) return;

  //dini-display yung modal kapag pinindot yung button
  btn.onclick = function () {
    modal.style.display = "block";
  };

  //ico-close yung modal kapag pinindot yung close button
  closeBtn.onclick = function () {
    modal.style.display = "none";
  };

  //nawawala yung modal kapag nag click sa labas ng modal
  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  //nawawala yung modal kapag nai-submit na yung form
  const form = document.getElementById("addToListForm");
  if (form) {
    form.onsubmit = function (event) {
      modal.style.display = "none";
    };
  }
}

function toggleAvatarHover() {
  //kinukuha yung elements sa html
  const popup = document.getElementById("avatarHover");
  const avatar = document.getElementById("profilepic");

  //dini-display o kino-close yung popup kapag pinindot yung avatar
  avatar.onclick = function () {
    if (popup.style.display === "none") {
      popup.style.display = "flex";
      avatar.style.boxShadow = " 0 0 5px var(--color-blue)";
    } else {
      popup.style.display = "none";
      avatar.style.boxShadow = "none";
    }
  };
}

function displayMenu() {
  //kinukuha yung elements sa html
  const menuBtn = document.getElementById("menu");
  const menuSidebar = document.getElementById("menu-sidebar");
  const closeBtn = document.querySelector(".menu-header .logo");

  //dini-display o kino-close yung sidebar kapag pinindot yung menu button o close button
  menuBtn.onclick = function () {
    menuBtn.style.display = "none";
    menuSidebar.style.display = "block";
  };
  closeBtn.onclick = function () {
    menuSidebar.style.display = "none";
    menuBtn.style.display = "block";
  };

  //nawawala yung sidebar kapag nag click sa labas ng sidebar
  window.onclick = function (event) {
    if (event.target === menuSidebar) {
      menuSidebar.style.display = "none";
      menuBtn.style.display = "block";
    }
  };
}

//naka-store yung mga original colors ng website
const originalColors = {
  '--color-main-bg1': 'rgba(5, 24, 52, 1)',
  '--color-main-bg2': 'rgb(46, 21, 109)',
  '--color-blue': '#67ebff',
  '--color-gradient-start': '#0fb5ce',
  '--color-gradient-end': '#6d3ee4',
  '--color-bg1': '#281558',
  '--color-bg2': '#043a42',
  '--color-login-1': '#67ebff',
  '--color-login-2': '#1e90ff',
  '--color-purple-accent': '#af8df4',
  '--color-bg-gradient1': '#0a6a79',
  '--color-bg-gradient2': '#3c237c'
};
//naka-store yung mga colors na ipapalit kapag pinindot yung toggle button
const redColors = {
  '--color-main-bg1': '#661d1d',
  '--color-main-bg2': '#4e1818',
  '--color-blue': '#ff864a',
  '--color-gradient-start': '#ff3131',
  '--color-gradient-end': '#ff914d',
  '--color-bg1': '#6e1713',
  '--color-bg2': '#532d19',
  '--color-login-1': '#eb3328',
  '--color-login-2': '#ff864a',
  '--color-purple-accent': '#eb3328',
  '--color-bg-gradient1': '#8f2828',
  '--color-bg-gradient2': '#692402'
};
const greenColors = {
  '--color-main-bg1': '#1e490b',
  '--color-main-bg2': '#5aab70',
  '--color-blue': '#7ed957',
  '--color-gradient-start': '#0097b2',
  '--color-gradient-end': '#7ed957',
  '--color-bg1': 'rgb(39, 66, 27)',
  '--color-bg2': '#233b18',
  '--color-login-1': '#5aab70',
  '--color-login-2': '#7ed957',
  '--color-purple-accent': '#5aab70',
  '--color-bg-gradient1': '#204d0d',
  '--color-bg-gradient2': '#305a3b'
};

const colorSchemes = {
  original: originalColors,
  red: redColors,
  green: greenColors
};

//ina-apply yung colors sa website, alin man sa original or toggled colors
function applyColors(colors) {
  for (const [key, value] of Object.entries(colors)) {
    document.documentElement.style.setProperty(key, value);
  }
}

let currentScheme = localStorage.getItem('colorScheme') || 'original';
applyColors(colorSchemes[currentScheme]);

//nag-add ng event listener sa mga buttons para gumana sila
document.querySelectorAll('.color-toggle').forEach(function(btn) {
  btn.addEventListener('click', function() {
    const scheme = btn.getAttribute('data-scheme');
    if (colorSchemes[scheme]) {
      applyColors(colorSchemes[scheme]);
      localStorage.setItem('colorScheme', scheme);
      document.getElementById('logo').src = scheme === 'original' ? `./images/logo.png` : `./images/logo-${scheme}.png`;
      document.querySelectorAll('.logo').forEach(function(logo) {
        logo.src = scheme === 'original' ? `./images/logo.png` : `./images/logo-${scheme}.png`;
      });
    }
  });
});


function setupTrailerModal() {
    let trailerBtn = document.getElementById("watchTrailerBtn");
    let trailerModal = document.getElementById("trailerModal");
    let closeTrailerModal = document.getElementById("closeTrailerModal");
    let trailerIframe = document.getElementById("trailerIframe");

    if (trailerBtn && trailerModal && trailerIframe) {
        trailerBtn.addEventListener("click", function() {
            youtubeLink = trailerBtn.getAttribute("data-youtube");
            trailerModal.style.display = "flex";
            trailerIframe.src = youtubeLink;

            setTimeout(function() {
                if (trailerIframe.requestFullscreen) {
                    trailerIframe.requestFullscreen();
                } else if (trailerIframe.mozRequestFullScreen) {
                    trailerIframe.mozRequestFullScreen();
                } else if (trailerIframe.webkitRequestFullscreen) {
                    trailerIframe.webkitRequestFullscreen();
                } else if (trailerIframe.msRequestFullscreen) {
                    trailerIframe.msRequestFullscreen();
                }
            }, 500);
        });
    }

    if (closeTrailerModal && trailerModal && trailerIframe) {
        closeTrailerModal.addEventListener("click", function() {
            trailerModal.style.display = "none";
            trailerIframe.src = "";
        });
    }

    window.addEventListener("click", function(event) {
        if (event.target === trailerModal) {
            trailerModal.style.display = "none";
            trailerIframe.src = "";
        }
    });
}

//ni-rurun yung mga functions pagkatapos i-load yung website para gumana sila sa unang click
document.addEventListener("DOMContentLoaded", function() {
    toggleAvatarHover();
    displayMenu();
    displayModal();
    setupTrailerModal();
});
