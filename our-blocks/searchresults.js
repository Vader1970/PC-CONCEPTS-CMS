// Register a new block type called "ourblocktheme/searchresults"
wp.blocks.registerBlockType("ourblocktheme/searchresults", {
  // Set the title of the block
  title: "PC CONCEPTS Search Results",

  // Define the edit function that renders the block in the editor
  edit: function () {
    // Create a div element with a class of "our-placeholder-block" and display "Search Results Placeholder"
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Search Results Placeholder");
  },

  // Define the save function that returns null, as this block doesn't have a frontend display
  save: function () {
    return null;
  },
});
