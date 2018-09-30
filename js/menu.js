var bodyLocked = false;

function lockBody() {
  document.body.style.overflow = 'hidden';
  bodyLocked = true;
}

function unlockBody() {
  document.body.style.overflow = 'initial';
  bodyLocked = false;
}

function toggleBodyLock() {
  if (bodyLocked) {
    unlockBody();
  } else {
    lockBody();
  }
}

var fullscreenMenuShown = false;

function getHeaderNavMobileEl() {
  return document.getElementById('header-nav-mobile');
}

function getHeaderNavClosedIcon() {
  return document.getElementById('header-nav-closed');
}

function getHeaderNavOpenedIcon() {
  return document.getElementById('header-nav-opened');
}

function toggleIcons() {
  var headerNavClosedIcon = getHeaderNavClosedIcon();
  var headerNavOpenedIcon = getHeaderNavOpenedIcon();
  if (fullscreenMenuShown) {
    headerNavClosedIcon.style.display = 'inline-block';
    headerNavOpenedIcon.style.display = 'none';
  } else {
    headerNavClosedIcon.style.display = 'none';
    headerNavOpenedIcon.style.display = 'inline-block';
  }
}

function showFullscreenMenu() {
  var headerNav = getHeaderNavMobileEl();
  headerNav.classList.add('header__nav--mobile-show');
  fullscreenMenuShown = true;
}

function hideFullscreenMenu() {
  var headerNav = getHeaderNavMobileEl();
  headerNav.classList.remove('header__nav--mobile-show');
  fullscreenMenuShown = false;
}

function toggleMenuShow() {
  toggleBodyLock();
  toggleIcons();
  if (fullscreenMenuShown) {
    hideFullscreenMenu();
  } else {
    showFullscreenMenu();
  }
}