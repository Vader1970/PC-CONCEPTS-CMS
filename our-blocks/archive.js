// Register a new block type with the name "ourblocktheme/archive".
// This block will display an Archive Placeholder.
wp.blocks.registerBlockType("ourblocktheme/archive", {
  // Set the title that will be displayed in the block library.
  title: "PC CONCEPTS Archive",

  // Define the edit function for the block.
  // This function returns a JSX element that will be displayed in the block editor.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Archive Placeholder");
  },

  // Define the save function for the block.
  // This function returns null because this block does not need to output anything on the front end.
  save: function () {
    return null;
  },
});
