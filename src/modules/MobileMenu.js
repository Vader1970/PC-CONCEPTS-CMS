// This class represents a mobile menu
class MobileMenu {
  constructor() {
    // Get the menu and open button elements from the DOM
    this.menu = document.querySelector(".site-header__menu");
    this.openButton = document.querySelector(".site-header__menu-trigger");

    // Attach event listeners to the open button
    this.events();
  }

  // Attach an event listener to the open button
  events() {
    this.openButton.addEventListener("click", () => this.openMenu());
  }

  // Toggle the active state of the menu and change the icon of the open button
  openMenu() {
    this.openButton.classList.toggle("fa-bars");
    this.openButton.classList.toggle("fa-window-close");
    this.menu.classList.toggle("site-header__menu--active");
  }
}

// Export the MobileMenu class as the default export of the module
export default MobileMenu;
