// import axios module
import axios from "axios";

// define Search class
class Search {
  // 1. describe and create/initiate our object
  constructor() {
    // add search HTML to the page
    this.addSearchHTML();

    // get DOM elements
    this.resultsDiv = document.querySelector("#search-overlay__results");
    this.openButton = document.querySelectorAll(".js-search-trigger");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.searchField = document.querySelector("#search-term");

    // set initial state
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;

    // add event listeners
    this.events();
  }

  // 2. events
  events() {
    // add click event listeners to all search buttons on the page
    this.openButton.forEach((el) => {
      el.addEventListener("click", (e) => {
        e.preventDefault();
        this.openOverlay();
      });
    });

    // add click event listener to the close button
    this.closeButton.addEventListener("click", () => this.closeOverlay());

    // add keydown event listener to the document
    document.addEventListener("keydown", (e) => this.keyPressDispatcher(e));

    // add keyup event listener to the search field
    this.searchField.addEventListener("keyup", () => this.typingLogic());
  }

  // 3. methods (function, action...)
  // check if the user is typing and start a timer
  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer);

      // if there is a value in the search field
      if (this.searchField.value) {
        // show a spinner
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>';
          this.isSpinnerVisible = true;
        }

        // start the timer to get results after 750ms
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        // clear the results div and hide the spinner
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }

    // update the previous value
    this.previousValue = this.searchField.value;
  }

  // get search results from the server and display them on the page
  async getResults() {
    try {
      // send a GET request to the server with the search term
      const response = await axios.get(
        pcconceptsData.root_url + "/wp-json/pc-concepts/v1/search?term=" + this.searchField.value
      );
      const results = response.data;

      // display search results in the appropriate sections on the page
      // The search results are added to this.resultsDiv, which is a DOM element
      this.resultsDiv.innerHTML = `
        <div class="row">
          <div class="one-third">
            <h2 class="search-overlay__section-title">General Information</h2>
            ${
              // If there are any general info results, a link list is created
              results.generalInfo.length
                ? '<ul class="link-list min-list">'
                : // If there are no general info results, a message is displayed
                  "<p>No general information matches that search.</p>"
            }

            ${results.generalInfo
              .map(
                (item) =>
                  `<li><a href="${item.permalink}">${item.title}</a> ${
                    // If the post is a "post" type, the author name is included
                    item.postType == "post" ? `by ${item.authorName}` : ""
                  }</li>`
              )
              .join("")}
              
            ${results.generalInfo.length ? "</ul>" : ""}
          </div>
          <div class="one-third">
            <h2 class="search-overlay__section-title">Programs</h2>
            ${
              // If there are any program results, a link list is created
              results.programs.length
                ? '<ul class="link-list min-list">'
                : // If there are no program results, a message with a link to all programs is displayed
                  `<p>No programs match that search. <a href="${pcconceptsData.root_url}/programs">View all programs</a></p>`
            }
              ${results.programs.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}
   
            ${results.programs.length ? "</ul>" : ""}

            <h2 class="search-overlay__section-title">Tutors</h2>
          
            ${results.tutors.length ? '<ul class="tutor-cards">' : `<p>No tutors match that search.</p>`}
           
              ${results.tutors
                .map(
                  (item) => `
                <li class="tutor-card__list-item">
                  <a class="tutor-card" href="${item.permalink}">
                    <img class="tutor-card__image" src="${item.image}">
                    <span class="tutor-card__name">${item.title}</span>
                  </a>
                </li>
              `
                )
                .join("")}
            
            ${results.tutors.length ? "</ul>" : ""}

          </div>
          <div class="one-third">
            <h2 class="search-overlay__section-title">Locations</h2>
            ${
              // If there are any contact results, a link list is created
              results.contact.length
                ? '<ul class="link-list min-list">'
                : `<p>No locations match that search. <a href="${pcconceptsData.root_url}/contact-us">View all locations</a></p>`
            }
              ${results.contact.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}
            ${results.contact.length ? "</ul>" : ""}

            <h2 class="search-overlay__section-title">Workshops</h2>
            ${
              results.workshop.length
                ? ""
                : `<p>No workshops match that search. <a href="${pcconceptsData.root_url}/workshops">View all workshops</a></p>`
            }
              ${results.workshop
                .map(
                  (item) => `
                <div class="event-summary">
                  <a class="event-summary__date t-center" href="${item.permalink}">
                    <span class="event-summary__month">${item.month}</span>
                    <span class="event-summary__day">${item.day}</span>  
                  </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
                    <p>${item.description} <a href="${item.permalink}" class="nu gray">Learn more</a></p>
                  </div>
                </div>
              `
                )
                .join("")}

                <h2 class="search-overlay__section-title">Services</h2>
                ${
                  results.service.length
                    ? ""
                    : `<p>No Services match that search. <a href="${pcconceptsData.root_url}/services">View all Services</a></p>`
                }
                  ${results.service
                    .map(
                      (item) => `
                   
                     
                      <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
                        <p>${item.description} <a href="${item.permalink}" class="nu gray">Learn more</a></p>
                      </div>
                    
                  `
                    )
                    .join("")}

          </div>
        </div>
      `;
      this.isSpinnerVisible = false;
    } catch (e) {
      console.log(e);
    }
  }

  keyPressDispatcher(e) {
    if (
      e.keyCode == 83 &&
      !this.isOverlayOpen &&
      document.activeElement.tagName != "INPUT" &&
      document.activeElement.tagName != "TEXTAREA"
    ) {
      this.openOverlay();
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active");
    document.body.classList.add("body-no-scroll");
    this.searchField.value = "";
    setTimeout(() => this.searchField.focus(), 301);
    console.log("our open method just ran!");
    this.isOverlayOpen = true;
    return false;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    document.body.classList.remove("body-no-scroll");
    console.log("our close method just ran!");
    this.isOverlayOpen = false;
  }

  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>

      </div>
    `
    );
  }
}

export default Search;
