// Register a custom block type for the PC CONCEPTS blog index
wp.blocks.registerBlockType("ourblocktheme/blogindex", {
  // Define the title that will be displayed in the block selector
  title: "PC CONCEPTS Blog Index",

  // The edit function defines the block's appearance and behavior in the editor
  edit: function () {
    // Create a div element with a class of "our-placeholder-block" and a message saying "Blog Index Placeholder"
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Blog Index Placeholder");
  },

  // The save function defines how the block will be rendered on the front end
  save: function () {
    // Since this block doesn't have any content to display, return null to indicate that nothing should be rendered
    return null;
  },
});
