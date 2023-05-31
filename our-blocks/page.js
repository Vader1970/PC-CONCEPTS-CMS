// Register a new block with the name "ourblocktheme/page"
wp.blocks.registerBlockType("ourblocktheme/page", {
  // Set the title of the block as "PC CONCEPTS Page"
  title: "PC CONCEPTS Page",

  // Define the edit function, which is called when the block is edited in the editor
  edit: function () {
    // Create a new div element with a class of "our-placeholder-block"
    // and display the text "Single Page Placeholder"
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Page Placeholder");
  },

  // Define the save function, which is called when the block is saved
  save: function () {
    // Return null, indicating that this block should not output anything on the front-end
    return null;
  },
});
